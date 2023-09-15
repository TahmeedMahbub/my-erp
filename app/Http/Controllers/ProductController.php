<?php

namespace App\Http\Controllers;

use App\Models\ContactCategory;
use App\Models\History;
use App\Models\Item;
use App\Models\ItemCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    public function index()
    {
        //
    }

    public function view()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store()
    {
        //
    }

    public function edit()
    {
        //
    }

    public function update()
    {
        //
    }

    public function delete()
    {
        //
    }

    public function categoryIndex()
    {
        $categories = ItemCategory::all();
        return view('product.category.index', compact('categories'));
    }

    public function categoryView()
    {
        //
    }


    public function categoryCreate()
    {
        $categories = ItemCategory::all();
        return view('product.category.create', compact('categories'));
    }

    public function categoryStore(Request $request)
    {
        $category = new ItemCategory();
        $category->name = $request->category_name;
        $category->parent_category_id = $request->parent_category;
        $category->details = $request->category_details;
        $category->created_by = Auth::user()->id;
        $category->updated_by = Auth::user()->id;
        $category->created_at = Carbon::now()->toDateTimeString();
        $category->updated_at = Carbon::now()->toDateTimeString();
        $category->save();

        $history = new History();
        $history->module = "Product Category";
        $history->module_id = $category->id;
        $history->operation = "Create";
        $history->previous = null;
        $history->after = json_encode($category);
        $history->user_id = Auth::user()->id;
        $history->ip_address = Session::get('user_ip');
        $history->save();

        return redirect()
        ->route('product_category')
        ->with('alert.status', 'success')
        ->with('alert.message', 'Contact Category Created Successfully!');
    }

    public function categoryEdit($id)
    {
        $category = ItemCategory::find($id);
        $categories = ItemCategory::all();
        return view('product.category.edit', compact('categories', 'category'));
    }

    public function categoryUpdate(Request $request)
    {
        $category = ItemCategory::find($request->id);
        $old_category = clone $category;

        $category->name = $request->category_name;
        $category->parent_category_id = $request->parent_category;
        $category->details = $request->category_details;
        $category->updated_by = Auth::user()->id;
        $category->updated_at = Carbon::now()->toDateTimeString();
        $category->save();

        $history = new History();
        $history->module = "Product Category";
        $history->module_id = $category->id;
        $history->operation = "Edit";
        $history->previous = json_encode($old_category);
        $history->after = json_encode($category);
        $history->user_id = Auth::user()->id;
        $history->ip_address = Session::get('user_ip');
        $history->save();

        return redirect()
        ->route('product_category')
        ->with('alert.status', 'success')
        ->with('alert.message', 'Contact Category Created Successfully!');
    }

    public function categoryDelete($id)
    {
        $category = ItemCategory::where('parent_category_id', $id)->first();
        if(!empty($category))
        {
            return redirect()
            ->route('product_category')
            ->with('alert.status', 'danger')
            ->with('alert.message', 'Product Category Is Used As a Parent Category. It Cannot Be Deleted!');
        }

        $contact = Item::where('category_id', $id)->first();
        if(!empty($contact))
        {
            return redirect()
            ->route('product_category')
            ->with('alert.status', 'danger')
            ->with('alert.message', 'Product Category Is Used as a Category of a Item. It Cannot Be Deleted!');
        }

        $category = ItemCategory::find($id);

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
        ->route('product_category')
        ->with('alert.status', 'success')
        ->with('alert.message', 'Contact Category Deleted Successfully!');
    }

}
