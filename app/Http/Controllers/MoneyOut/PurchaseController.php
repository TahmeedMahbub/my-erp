<?php

namespace App\Http\Controllers\MoneyOut;

use App\Http\Controllers\Controller;
use App\Models\Account\Account;
use App\Models\Account\JournalEntry;
use App\Models\Organization\Branch;
use App\Models\Contact\Contact;
use App\Models\Inventory\Item;
use App\Models\Inventory\ItemLot;
use App\Models\MoneyOut\Purchase;
use App\Models\MoneyOut\PurchaseEntry;
use App\Models\Organization\History;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class PurchaseController extends Controller
{
    public function index()
    {
        $purchases = Purchase::orderBy('id', 'desc')->get();
        return view('purchase.index', compact('purchases'));
    }

    public function view()
    {
        //
    }

    public function create()
    {
        // HANDLE OLD VALUES
        $branches           = Branch::all();
        $delivery_persons   = Contact::whereIn('category_id', [3, 4])->get();
        $vendors            = Contact::where('category_id', 2)->get();
        $items              = Item::all();
        $payment_accounts   = Account::whereIn('account_type_id', [4, 5])->get();
        return view('purchase.create', compact('branches', 'delivery_persons', 'vendors', 'items', 'payment_accounts'));
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try{
            $purchase                       = new Purchase;
            $purchase->vendor_id            = $request->vendor;
            $purchase->delivery_person_id   = $request->delivery;
            $purchase->branch_id            = $request->branch;
            $purchase->total_amount         = $request->total_amount ?? 0;
            $purchase->paid_amount          = $request->payment_amount ?? 0;
            $purchase->paid_through_id      = $purchase->paid_amount != 0 ? $request->payment_account : null;
            $purchase->cheque_no            = $request->cheque;
            $purchase->cheque_date          = $request->cheque_date;
            $purchase->payment_comment      = $request->payment_comment;
            $purchase->discount             = $request->main_discount ?? 0;
            $purchase->discount_type        = $request->main_discount_type;
            $purchase->vat                  = $request->main_vat ?? 0;
            $purchase->vat_type             = $request->main_vat_type;
            $purchase->shipping_charge      = $request->main_shipping ?? 0;
            $purchase->date                 = $request->purchase_date ?? date('Y-m-d');
            $purchase->note                 = $request->note;
            $purchase->je_discount          = $request->discount;
            $purchase->je_vat               = $request->vat;
            $purchase->je_paid_amount       = $request->paid_amount;
            $purchase->je_subtotal          = $request->subtotal;
            $purchase->created_by           = Auth::user()->id;
            $purchase->created_at           = Carbon::now()->toDateTimeString();
            $purchase->updated_by           = Auth::user()->id;
            $purchase->updated_at           = Carbon::now()->toDateTimeString();

            $purchase->save();
            $purchase->code                 = str_pad($purchase->id, 6, '0', STR_PAD_LEFT);

            if ($request->hasFile('files')) {
                foreach($request->file('files') as $key => $file)
                {
                    $fileName               = rand(100,999).'_'.$purchase->code.'_'.$file->getClientOriginalName();
                    $file->move(public_path('assets/files/purchases'), $fileName);
                    $files[]                = 'purchases/' . $fileName;
                }
                $purchase->files            = json_encode($files);
            }
            $purchase->save();

            if(!empty($request->items))
            {
                $entries = [];
                foreach($request->items as $key => $item)
                {
                    $purchase_entry                 = new PurchaseEntry;
                    $purchase_entry->purchase_id    = $purchase->id;
                    $purchase_entry->item_id        = $request->items[$key];
                    $purchase_entry->expiry_date    = $request->expiry_date[$key];
                    $purchase_entry->base_qty       = $request->base_qty[$key];
                    $purchase_entry->carton_qty     = $request->carton_qty[$key];
                    $purchase_entry->price          = $request->rates[$key];
                    $purchase_entry->price_unit     = $request->units[$key];
                    $purchase_entry->discount       = $request->discounts[$key];
                    $purchase_entry->discount_type  = $request->discount_types[$key];
                    $purchase_entry->created_by     = Auth::user()->id;
                    $purchase_entry->updated_by     = Auth::user()->id;
                    $purchase_entry->created_at     = Carbon::now()->toDateTimeString();
                    $purchase_entry->updated_at     = Carbon::now()->toDateTimeString();
                    $purchase_entry->save();
                    $entries[]                      = $purchase_entry;

                    $lot = ItemLot::where('item_id', $request->items[$key])->max('lot_no');
                    $lot_no = !empty($lot) ? $lot+1 : 1;

                    $item_lot                           = new ItemLot;
                    $item_lot->item_id                  = $request->items[$key];
                    $item_lot->lot_no                   = $lot_no;
                    $item_lot->branch_id                = $request->branch;
                    $item_lot->expiry_date              = $request->expiry_date[$key] ?? null;
                    $item_lot->total_stock              = $request->base_qty[$key];
                    $item_lot->purchased_stock          = $request->base_qty[$key];
                    $item_lot->sold_stock               = 0;
                    $item_lot->transferred_in_stock     = 0;
                    $item_lot->transferred_out_stock    = 0;
                    $item_lot->created_at               = Carbon::now();
                    $item_lot->updated_at               = Carbon::now();
                    $item_lot->save();
                }
            }
            else
            {
                DB::rollBack();
                return redirect()
                ->back()
                ->withInput()
                ->with('alert.status', 'danger')
                ->with('alert.message', 'Error!!! Purchase At Least One Item.');
            }

            $this->billCreateJE($purchase->id);

            $purchase->entries  = $entries;

            $history            = new History;
            $history->module    = "Purchase";
            $history->module_id = $purchase->id;
            $history->operation = "Create";
            $history->previous  = null;
            $history->after     = json_encode($purchase);
            $history->user_id   = Auth::user()->id;
            $history->ip_address= Session::get('user_ip');
            $history->save();

            // HANDLE JOURNAL
            DB::commit();
            return redirect()
            ->route('purchase')
            ->with('alert.status', 'success')
            ->with('alert.message', 'Item(s) Has Been Purchased!');
        }
        catch(Exception $e)
        {
            DB::rollBack();
            return redirect()
            ->back()
            ->withInput()
            ->with('alert.status', 'danger')
            ->with('alert.message', 'Error in Purchase Creation!!!');
        }

    }

    public function edit($id)
    {
        // HANDLE OLD VALUES
        $purchase           = Purchase::find($id);
        $purchase_entries   = PurchaseEntry::where('purchase_id', $purchase->id)->get();
        $branches           = Branch::all();
        $delivery_persons   = Contact::whereIn('category_id', [3, 4])->get();
        $vendors            = Contact::where('category_id', 2)->get();
        $items              = Item::all();
        $payment_accounts   = Account::whereIn('account_type_id', [4, 5])->get();
        return view('purchase.edit', compact('branches', 'delivery_persons', 'vendors', 'items', 'payment_accounts', 'purchase', 'purchase_entries'));
    }

    public function update(Request $request)
    {
        //
    }

    public function delete()
    {
        //
    }

    public function billCreateJE($purchase_id)
    {
        $purchase = Purchase::find($purchase_id);

        if(!empty($purchase->je_subtotal) && $purchase->je_subtotal > 0)
        {
            $journal_entry = new JournalEntry;
            $journal_entry->journal_type = "purchase";
            $journal_entry->transaction_type = "dr";
            $journal_entry->amount = $purchase->je_subtotal;
            $journal_entry->account_id = 26;
            $journal_entry->date = Carbon::now()->format('Y-m-d');
            $journal_entry->contact_id = $purchase->vendor_id;
            // $journal_entry->journal_id = $request->abc; // HANDLE THIS
            $journal_entry->model_name = "purchase";
            $journal_entry->model_id = $purchase->id;
            $journal_entry->note = $purchase->note ?? null;
            $journal_entry->created_at = Carbon::now();
            $journal_entry->updated_at = Carbon::now();
            $journal_entry->created_by = Auth::user()->id;
            $journal_entry->updated_by = Auth::user()->id;
            $journal_entry->save();
        }

        if(!empty($purchase->je_discount) && $purchase->je_discount > 0)
        {
            $journal_entry = new JournalEntry;
            $journal_entry->journal_type = "purchase";
            $journal_entry->transaction_type = "cr";
            $journal_entry->amount = $purchase->je_discount;
            $journal_entry->account_id = 21;
            $journal_entry->date = Carbon::now()->format('Y-m-d');
            $journal_entry->contact_id = $purchase->vendor_id;
            // $journal_entry->journal_id = $request->abc; // HANDLE THIS
            $journal_entry->model_name = "purchase";
            $journal_entry->model_id = $purchase->id;
            $journal_entry->note = $purchase->note ?? null;
            $journal_entry->created_at = Carbon::now();
            $journal_entry->updated_at = Carbon::now();
            $journal_entry->created_by = Auth::user()->id;
            $journal_entry->updated_by = Auth::user()->id;
            $journal_entry->save();
        }

        if(!empty($purchase->je_vat) && $purchase->je_vat > 0)
        {
            $journal_entry = new JournalEntry;
            $journal_entry->journal_type = "purchase";
            $journal_entry->transaction_type = "dr";
            $journal_entry->amount = $purchase->je_vat;
            $journal_entry->account_id = 9;
            $journal_entry->date = Carbon::now()->format('Y-m-d');
            $journal_entry->contact_id = $purchase->vendor_id;
            // $journal_entry->journal_id = $request->abc; // HANDLE THIS
            $journal_entry->model_name = "purchase";
            $journal_entry->model_id = $purchase->id;
            $journal_entry->note = $purchase->note ?? null;
            $journal_entry->created_at = Carbon::now();
            $journal_entry->updated_at = Carbon::now();
            $journal_entry->created_by = Auth::user()->id;
            $journal_entry->updated_by = Auth::user()->id;
            $journal_entry->save();
        }

        if(!empty($purchase->shipping_charge) && $purchase->shipping_charge > 0)
        {
            $journal_entry = new JournalEntry;
            $journal_entry->journal_type = "purchase";
            $journal_entry->transaction_type = "dr";
            $journal_entry->amount = $purchase->shipping_charge;
            $journal_entry->account_id = 30;
            $journal_entry->date = Carbon::now()->format('Y-m-d');
            $journal_entry->contact_id = $purchase->delivery_person_id ?? $purchase->vendor_id;
            // $journal_entry->journal_id = $request->abc; // HANDLE THIS
            $journal_entry->model_name = "purchase";
            $journal_entry->model_id = $purchase->id;
            $journal_entry->note = $purchase->note ?? null;
            $journal_entry->created_at = Carbon::now();
            $journal_entry->updated_at = Carbon::now();
            $journal_entry->created_by = Auth::user()->id;
            $journal_entry->updated_by = Auth::user()->id;
            $journal_entry->save();
        }

        if(!empty($purchase->total_amount) && $purchase->total_amount > 0)
        {
            $journal_entry = new JournalEntry;
            $journal_entry->journal_type = "purchase";
            $journal_entry->transaction_type = "cr";
            $journal_entry->amount = $purchase->total_amount;
            $journal_entry->account_id = 11;
            $journal_entry->date = Carbon::now()->format('Y-m-d');
            $journal_entry->contact_id = $purchase->vendor_id;
            // $journal_entry->journal_id = $request->abc; // HANDLE THIS
            $journal_entry->model_name = "purchase";
            $journal_entry->model_id = $purchase->id;
            $journal_entry->note = $purchase->note ?? null;
            $journal_entry->created_at = Carbon::now();
            $journal_entry->updated_at = Carbon::now();
            $journal_entry->created_by = Auth::user()->id;
            $journal_entry->updated_by = Auth::user()->id;
            $journal_entry->save();
        }

        if(!empty($purchase->je_paid_amount) && $purchase->je_paid_amount > 0)
        {
            $journal_entry = new JournalEntry;
            $journal_entry->journal_type = "payment_made";
            $journal_entry->transaction_type = "cr";
            $journal_entry->amount = $purchase->je_paid_amount;
            $journal_entry->account_id = $purchase->paid_through_id;
            $journal_entry->date = Carbon::now()->format('Y-m-d');
            $journal_entry->contact_id = $purchase->vendor_id;
            // $journal_entry->journal_id = $request->abc; // HANDLE THIS
            $journal_entry->model_name = "payment";
            $journal_entry->model_id = $purchase->id; // HANDLE THIS, FROM PAYMENT
            $journal_entry->note = $purchase->note ?? null;
            $journal_entry->created_at = Carbon::now();
            $journal_entry->updated_at = Carbon::now();
            $journal_entry->created_by = Auth::user()->id;
            $journal_entry->updated_by = Auth::user()->id;
            $journal_entry->save();

            $journal_entry = new JournalEntry;
            $journal_entry->journal_type = "payment_made";
            $journal_entry->transaction_type = "dr";
            $journal_entry->amount = $purchase->je_paid_amount;
            $journal_entry->account_id = 11;
            $journal_entry->date = Carbon::now()->format('Y-m-d');
            $journal_entry->contact_id = $purchase->vendor_id;
            // $journal_entry->journal_id = $request->abc; // HANDLE THIS
            $journal_entry->model_name = "payment";
            $journal_entry->model_id = $purchase->id; // HANDLE THIS, FROM PAYMENT
            $journal_entry->note = $purchase->note ?? null;
            $journal_entry->created_at = Carbon::now();
            $journal_entry->updated_at = Carbon::now();
            $journal_entry->created_by = Auth::user()->id;
            $journal_entry->updated_by = Auth::user()->id;
            $journal_entry->save();
        }
    }

}
