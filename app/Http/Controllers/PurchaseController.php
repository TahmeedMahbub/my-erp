<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Contact;
use App\Models\Item;
use App\Models\Purchase;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        dd($request->all());

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
