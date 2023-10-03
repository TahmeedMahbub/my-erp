<?php

namespace App\Http\Controllers\MoneyOut;

use App\Http\Controllers\Controller;
use App\Models\Account\Account;
use App\Models\Account\JournalEntry;
use App\Models\Contact\Contact;
use App\Models\MoneyOut\PaymentMade;
use App\Models\MoneyOut\PaymentMadeEntry;
use App\Models\MoneyOut\Purchase;
use App\Models\Organization\Branch;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PaymentMadeController extends Controller
{
    public function index()
    {
        $branches           = Branch::all();
        $vendors            = Contact::where('category_id', 2)->get();
        $payment_accounts   = Account::whereIn('account_type_id', [4, 5])->get();
        return view('payment.create', compact('branches', 'vendors', 'payment_accounts'));
    }

    public function view($id)
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        $vendor = Contact::find($request->vendor);
        $vendor->credit = $vendor->credit + $request->excess_amount;
        $vendor->save();

        $payment_made = new PaymentMade;
        $payment_made->amount = $request->amount;
        $payment_made->excess_amount = $request->excess_amount;
        $payment_made->vendor_id = $request->vendor;
        $payment_made->date = $request->date;
        $payment_made->branch_id = $request->branch;
        $payment_made->paid_through_id = $request->payment_account;
        $payment_made->cheque_no = $request->cheque_no;
        $payment_made->cheque_date = $request->cheque_date;
        $payment_made->purchase_id = null;
        $payment_made->comment = $request->note;
        $payment_made->created_by = Auth::user()->id;
        $payment_made->updated_by = Auth::user()->id;
        $payment_made->created_at = Carbon::now()->toDateTimeString();
        $payment_made->updated_at = Carbon::now()->toDateTimeString();
        $payment_made->save();
        $payment_made->code = str_pad($payment_made->id, 6, '0', STR_PAD_LEFT);
        $payment_made->save();

        foreach($request->purchase_ids as $key => $purchase_id)
        {
            if($request->paid_amounts[$key] > 0)
            {
                $payment_made_entry = new PaymentMadeEntry;
                $payment_made_entry->payment_made_id = $payment_made->id;
                $payment_made_entry->purchase_id = $request->purchase_ids[$key];
                $payment_made_entry->amount = $request->paid_amounts[$key];
                $payment_made_entry->created_by = Auth::user()->id;
                $payment_made_entry->updated_by = Auth::user()->id;
                $payment_made_entry->created_at = Carbon::now()->toDateTimeString();
                $payment_made_entry->updated_at = Carbon::now()->toDateTimeString();
                $payment_made_entry->save();

                $purchase = Purchase::find($request->purchase_ids[$key]);
                $purchase->paid_amount += $request->paid_amounts[$key];
                $purchase->save();

                $this->createPaymentJE($payment_made_entry->id);
            }
        }
        DB::commit();
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request)
    {
        //
    }

    public function delete($id)
    {
        //
    }

    public function remainingPayments($vendor_id)
    {
        $remaining_payments = Purchase::where('vendor_id', $vendor_id)->whereColumn('paid_amount', '<', 'total_amount')->get();

        foreach ($remaining_payments as $payment) {
            if($payment->date) $payment->date = Carbon::parse($payment->date)->format('d-M-Y');
        }
        return response()->json(['count' => count($remaining_payments), 'remaining_payments' => $remaining_payments]);
    }

    public function createPaymentJE($payment_made_entry_id)
    {
        $payment_made_entry = PaymentMadeEntry::find($payment_made_entry_id);

        $journal_entry = new JournalEntry;
        $journal_entry->journal_type = "payment_made";
        $journal_entry->transaction_type = "cr";
        $journal_entry->amount = $payment_made_entry->amount;
        $journal_entry->account_id = $payment_made_entry->payment_made_id;
        $journal_entry->date = Carbon::now()->format('Y-m-d');
        $journal_entry->contact_id = $payment_made_entry->purchase->vendor_id;
        $journal_entry->model_name = "payment";
        $journal_entry->model_id = $payment_made_entry->payment_made_id;
        $journal_entry->note = $payment_made_entry->purchase->note ?? null;
        $journal_entry->created_at = Carbon::now();
        $journal_entry->updated_at = Carbon::now();
        $journal_entry->created_by = Auth::user()->id;
        $journal_entry->updated_by = Auth::user()->id;
        $journal_entry->save();

        $journal_entry = new JournalEntry;
        $journal_entry->journal_type = "payment_made";
        $journal_entry->transaction_type = "dr";
        $journal_entry->amount = $payment_made_entry->amount;
        $journal_entry->account_id = 11;
        $journal_entry->date = Carbon::now()->format('Y-m-d');
        $journal_entry->contact_id = $payment_made_entry->purchase->vendor_id;
        $journal_entry->model_name = "payment";
        $journal_entry->model_id = $payment_made_entry->payment_made_id;
        $journal_entry->note = $payment_made_entry->purchase->note ?? null;
        $journal_entry->created_at = Carbon::now();
        $journal_entry->updated_at = Carbon::now();
        $journal_entry->created_by = Auth::user()->id;
        $journal_entry->updated_by = Auth::user()->id;
        $journal_entry->save();
    }

}
