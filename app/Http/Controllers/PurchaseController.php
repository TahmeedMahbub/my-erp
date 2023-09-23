<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Contact;
use App\Models\Item;
use Illuminate\Http\Request;

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
