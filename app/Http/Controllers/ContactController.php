<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\ContactCategory;
use App\Models\History;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::all();
        return view('contact.index', compact('contacts'));
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
        //
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

    public function categoryIndex()
    {
        $categories = ContactCategory::all();
        return view('contact.category.index', compact('categories'));
    }

    public function categoryView()
    {
        //
    }

    public function categoryCreate()
    {
        $categories = ContactCategory::all();
        return view('contact.category.create', compact('categories'));
    }

    public function categoryStore(Request $request)
    {
        $category = new ContactCategory();
        $category->name = $request->category_name;
        $category->parent_category_id = $request->parent_category;
        $category->details = $request->category_details;
        $category->created_by = Auth::user()->id;
        $category->updated_by = Auth::user()->id;
        $category->created_at = Carbon::now()->toDateTimeString();
        $category->updated_at = Carbon::now()->toDateTimeString();
        $category->save();

        $history = new History();
        $history->module = "Contact Category";
        $history->module_id = $category->id;
        $history->operation = "Create";
        $history->previous = null;
        $history->after = json_encode($category);
        $history->user_id = Auth::user()->id;
        $history->ip_address = Session::get('user_ip');
        $history->save();

        return redirect()
        ->route('contact_category')
        ->with('alert.status', 'success')
        ->with('alert.message', 'Contact Category Created Successfully!');
    }

    public function categoryEdit()
    {
        //
    }

    public function categoryUpdate(Request $request)
    {
        //
    }

    public function categoryDelete()
    {
        //
    }
}
