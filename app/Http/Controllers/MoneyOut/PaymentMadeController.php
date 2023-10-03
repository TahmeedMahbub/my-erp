<?php

namespace App\Http\Controllers\MoneyOut;

use App\Http\Controllers\Controller;
use App\Models\Account\Account;
use App\Models\Contact\Contact;
use App\Models\MoneyOut\PaymentMade;
use App\Models\MoneyOut\Purchase;
use App\Models\Organization\Branch;
use Carbon\Carbon;
use Illuminate\Http\Request;

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
        //
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

}
