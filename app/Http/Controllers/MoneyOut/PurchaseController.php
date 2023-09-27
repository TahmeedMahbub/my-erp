<?php

namespace App\Http\Controllers\MoneyOut;

use App\Http\Controllers\Controller;
use App\Models\Organization\Branch;
use App\Models\Contact\Contact;
use App\Models\Inventory\Item;
use App\Models\Inventory\ItemLot;
use App\Models\MoneyOut\Purchase;
use App\Models\MoneyOut\PurchaseEntry;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PurchaseController extends Controller
{
    public function index()
    {
        $branches = Branch::all();
        $delivery_persons = Contact::whereIn('category_id', [3, 4])->get();
        $vendors = Contact::where('category_id', 2)->get();
        $items = Item::all();
        return view('purchase.create', compact('branches', 'delivery_persons', 'vendors', 'items'));
    }

    public function view()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        dd($request->all());
        DB::beginTransaction();
        try{
            $purchase = new Purchase;
            $purchase->vendor_id = $request->vendor;
            $purchase->delivery_preson_id = $request->delivery;
            $purchase->branch_id = $request->branch;
            $purchase->total_amount = $request->total_amount ?? 0;
            $purchase->paid_amount = $request->payment_amount ?? 0;
            $purchase->paid_through_id = $request->payment_account;
            $purchase->cheque_no = $request->cheque;
            $purchase->cheque_date = $request->cheque_date;
            $purchase->payment_comment = $request->payment_comment;
            $purchase->discount = $request->main_discount ?? 0;
            $purchase->discount_type = $request->main_discount_type;
            $purchase->vat = $request->main_vat ?? 0;
            $purchase->vat_type = $request->main_vat_type;
            $purchase->shipping_charge = $request->main_shipping ?? 0;
            $purchase->note = $request->note;
            $purchase->created_by = Auth::user()->id;
            $purchase->created_at = Carbon::now()->toDateTimeString();
            $purchase->updated_by = Auth::user()->id;
            $purchase->updated_at = Carbon::now()->toDateTimeString();

            $purchase->save();
            $purchase->code = str_pad($purchase->id, 6, '0', STR_PAD_LEFT);

            if ($request->hasFile('files')) {
                foreach($request->file('files') as $key => $file)
                {
                    $fileName = rand(100,999).'_'.$purchase->code.'_'.$file->getClientOriginalName();
                    $file->move(public_path('assets/files/purchases'), $fileName);
                    $files[] = 'purchases/' . $fileName;
                }
                $purchase->files = json_encode($files);
            }
            $purchase->save();

            if(!empty($request->items))
            {
                foreach($request->items as $key => $item)
                {
                    $purchase_entry = new PurchaseEntry;
                    $purchase_entry->purchase_id = $purchase->id;
                    $purchase_entry->item_id = $request->items[$key];
                    $purchase_entry->expiry_date = $request->expiry_date[$key];
                    $purchase_entry->base_qty = $request->base_qty[$key];
                    $purchase_entry->carton_qty = $request->carton_qty[$key];
                    $purchase_entry->price = $request->rates[$key];
                    $purchase_entry->price_unit = $request->units[$key];
                    $purchase_entry->discount = $request->discounts[$key];
                    $purchase_entry->discount_type = $request->discount_types[$key];
                    $purchase_entry->created_by = Auth::user()->id;
                    $purchase_entry->updated_by = Auth::user()->id;
                    $purchase_entry->created_at = Carbon::now()->toDateTimeString();
                    $purchase_entry->updated_at = Carbon::now()->toDateTimeString();
                    $purchase_entry->save();

                    $lot = ItemLot::where('item_id', $request->items[$key])->max('lot_no');
                    $lot_no = !empty($lot) ? $lot+1 : 1;

                    $item_lot = new ItemLot;
                    $item_lot->item_id = $request->items[$key];
                    $item_lot->lot_no = $lot_no;
                    $item_lot->branch_id = $request->branch;
                    $item_lot->expiry_date = $request->expiry_date[$key] ?? null;
                    $item_lot->total_stock = $request->base_qty[$key];
                    $item_lot->purchased_stock = $request->base_qty[$key];
                    $item_lot->sold_stock = 0;
                    $item_lot->transferred_in_stock = 0;
                    $item_lot->transferred_out_stock = 0;
                    $item_lot->created_at = Carbon::now();
                    $item_lot->updated_at = Carbon::now();
                    $item_lot->save();
                }
            }
            else
            {
                DB::rollBack();
                return redirect()
                ->route('purchase')
                ->with('alert.status', 'danger')
                ->with('alert.message', 'Error!!! Purchase At Least One Item.');
            }

            // HANDLE HISTORY, LOT, THEN JOURNAL ENTRY
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
            ->route('purchase')
            ->with('alert.status', 'danger')
            ->with('alert.message', 'Error in Item Creation!!!'.$e);
        }

    }

    public function edit()
    {
        //
    }

    public function update(Request $request)
    {
        //
    }

    public function delete()
    {
        //
    }

}
