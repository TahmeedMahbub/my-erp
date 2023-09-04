<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Contact;
use App\Models\ContactCategory;
use App\Models\History;
use App\Models\Role;
use App\Models\User;
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
        $branches = Branch::all();
        $roles = Role::all();
        $users = User::where('id', '>', 0)->get();
        $categories = ContactCategory::all();
        return view('contact.create', compact('categories', 'branches', 'roles', 'users'));
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

    public function categoryEdit($id)
    {
        $category = ContactCategory::find($id);
        $categories = ContactCategory::all();
        return view('contact.category.edit', compact('categories', 'category'));
    }

    public function categoryUpdate(Request $request)
    {
        $category = ContactCategory::find($request->id);
        $old_category = clone $category;

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
        $history->operation = "Edit";
        $history->previous = json_encode($old_category);
        $history->after = json_encode($category);
        $history->user_id = Auth::user()->id;
        $history->ip_address = Session::get('user_ip');
        $history->save();

        return redirect()
        ->route('contact_category')
        ->with('alert.status', 'success')
        ->with('alert.message', 'Contact Category Created Successfully!');
    }

    public function categoryDelete($id)
    {
        $category = ContactCategory::where('parent_category_id', $id)->first();
        // $contact = Contact::where('category_id', $id)->first();
        if(!empty($category))// || !empty($contact)
        {
            return redirect()
            ->route('contact_category')
            ->with('alert.status', 'danger')
            ->with('alert.message', 'Contact Category Is Used Somewhere Else. It Cannot Be Deleted!');
        }
        else
        {
            $category = ContactCategory::find($id);

            $history = new History();
            $history->module = "Contact Category";
            $history->module_id = $category->id;
            $history->operation = "Delete";
            $history->previous = json_encode($category);
            $history->after = null;
            $history->user_id = Auth::user()->id;
            $history->ip_address = Session::get('user_ip');
            $history->save();

            $category->delete();

            return redirect()
            ->route('contact_category')
            ->with('alert.status', 'success')
            ->with('alert.message', 'Contact Category Deleted Successfully!');
        }
    }
}
