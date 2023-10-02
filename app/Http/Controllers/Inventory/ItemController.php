<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Inventory\Brand;
use App\Models\Contact\ContactCategory;
use App\Models\Organization\History;
use App\Models\Inventory\Item;
use App\Models\Inventory\ItemCategory;
use App\Models\Inventory\Unit;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::all();
        return view('item.index', compact('items'));
    }

    public function view()
    {
        //
    }

    public function create()
    {
        $units  = Unit::all();
        $brands = Brand::all();
        $categories = ItemCategory::all();
        return view('item.create', compact('categories', 'units', 'brands'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'category' => 'required',
            'name' => 'required',
            'unit' => 'required',
            'code' => 'nullable|unique:items,code',
        ]);

        DB::beginTransaction();
        try
        {
            $item = new Item();
            $item->name = $request->name;
            $item->code = $request->code ?? null;
            $item->category_id = $request->category;
            $item->unit_id = $request->unit;
            $item->brand_id = $request->brand;
            $item->carton_size = $request->carton_size ?? 1;
            $item->low_stock = $request->low_stock ?? 0;
            $item->purchase_price = $request->purchase_price;
            $item->selling_price = $request->selling_price;
            $item->details = $request->details;
            $item->created_by = Auth::user()->id;
            $item->created_at = Carbon::now()->toDateTimeString();
            $item->updated_by = Auth::user()->id;
            $item->updated_at = Carbon::now()->toDateTimeString();
            $item->save();

            $helpers = new \App\Lib\Helpers;
            $code = $helpers->codeGenerator("Item", "Inventory", $item->id);
            $item->code = $code;
            $item->save();

            if ($request->hasFile('image')) {
                $file                       = $request->file('image');
                $file_extention             = $file->getClientOriginalExtension();
                $new_file_name              = "item_" . $item->id . "." . $file_extention;
                $success                    = $file->move('assets/images/items', $new_file_name);

                if ($success) {
                    $item->image      = 'items/' . $new_file_name;
                }
            }

            $item->save();

            $history = new History();
            $history->module = "Item";
            $history->module_id = $item->id;
            $history->operation = "Create";
            $history->previous = null;
            $history->after = json_encode($item);
            $history->user_id = Auth::user()->id;
            $history->ip_address = Session::get('user_ip');
            $history->save();
            DB::commit();

            return redirect()
            ->route('item')
            ->with('alert.status', 'success')
            ->with('alert.message', 'Item Created Successfully!');
        }
        catch(Exception $e)
        {
            DB::rollBack();
            return redirect()
            ->route('item')
            ->with('alert.status', 'danger')
            ->with('alert.message', 'Error in Item Creation!!!'.$e);
        }
    }

    public function edit($id)
    {
        $item = Item::find($id);
        $brands = Brand::all();
        $units = Unit::all();
        $categories = ItemCategory::all();
        return view('item.edit', compact('categories', 'units', 'brands', 'item'));
    }

    public function update(Request $request)
    {
        $this->validate($request,[
            'category' => 'required',
            'name' => 'required'
        ]);

        DB::beginTransaction();
        try
        {
            $item = Item::find($request->id);
            $old_item = clone $item;
            $item->name = $request->name;
            $item->category_id = $request->category;
            $item->unit_id = $request->unit;
            $item->brand_id = $request->brand;
            $item->carton_size = $request->carton_size ?? 1;
            $item->low_stock = $request->low_stock ?? 0;
            $item->purchase_price = $request->purchase_price;
            $item->selling_price = $request->selling_price;
            $item->details = $request->details;
            $item->updated_by = Auth::user()->id;
            $item->updated_at = Carbon::now()->toDateTimeString();

            if ($request->hasFile('image')) {
                $file                       = $request->file('image');
                $file_extention             = $file->getClientOriginalExtension();
                $new_file_name              = "item_" . $item->id . "." . $file_extention;
                $success                    = $file->move('assets/images/items', $new_file_name);

                if ($success) {
                    $item->image      = 'items/' . $new_file_name;
                }
            }

            $item->save();

            $history = new History();
            $history->module = "Item";
            $history->module_id = $item->id;
            $history->operation = "Edit";
            $history->previous = json_encode($old_item);
            $history->after = json_encode($item);
            $history->user_id = Auth::user()->id;
            $history->ip_address = Session::get('user_ip');
            $history->save();
            DB::commit();

            return redirect()
            ->route('item')
            ->with('alert.status', 'success')
            ->with('alert.message', 'Item Edited Successfully!');

        }
        catch(Exception $e)
        {
            DB::rollBack();
            return redirect()
            ->route('user')
            ->with('alert.status', 'danger')
            ->with('alert.message', 'Error in Contact Editing!!!');
        }
    }

    public function delete($id)
    {
        $item = Item::find($id);

        $history = new History();
        $history->module = "Item";
        $history->module_id = $item->id;
        $history->operation = "Delete";
        $history->after = null;
        $history->previous = json_encode($item);
        $history->user_id = Auth::user()->id;
        $history->ip_address = Session::get('user_ip');
        $history->save();

        $item->delete();

        return redirect()
        ->route('item')
        ->with('alert.status', 'success')
        ->with('alert.message', 'Item Deleted Successfully!');
    }

    public function categoryIndex()
    {
        $categories = ItemCategory::all();
        return view('item.category.index', compact('categories'));
    }

    public function categoryView()
    {
        //
    }


    public function categoryCreate()
    {
        $categories = ItemCategory::all();
        return view('item.category.create', compact('categories'));
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
        $history->module = "Item Category";
        $history->module_id = $category->id;
        $history->operation = "Create";
        $history->previous = null;
        $history->after = json_encode($category);
        $history->user_id = Auth::user()->id;
        $history->ip_address = Session::get('user_ip');
        $history->save();

        return redirect()
        ->route('item_category')
        ->with('alert.status', 'success')
        ->with('alert.message', 'Contact Category Created Successfully!');
    }

    public function categoryEdit($id)
    {
        $category = ItemCategory::find($id);
        $categories = ItemCategory::all();
        return view('item.category.edit', compact('categories', 'category'));
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
        $history->module = "Item Category";
        $history->module_id = $category->id;
        $history->operation = "Edit";
        $history->previous = json_encode($old_category);
        $history->after = json_encode($category);
        $history->user_id = Auth::user()->id;
        $history->ip_address = Session::get('user_ip');
        $history->save();

        return redirect()
        ->route('item_category')
        ->with('alert.status', 'success')
        ->with('alert.message', 'Contact Category Created Successfully!');
    }

    public function categoryDelete($id)
    {
        $category = ItemCategory::where('parent_category_id', $id)->first();
        if(!empty($category))
        {
            return redirect()
            ->route('item_category')
            ->with('alert.status', 'danger')
            ->with('alert.message', 'Item Category Is Used As a Parent Category. It Cannot Be Deleted!');
        }

        $item = Item::where('category_id', $id)->first();
        if(!empty($item))
        {
            return redirect()
            ->route('item_category')
            ->with('alert.status', 'danger')
            ->with('alert.message', 'Item Category Is Used as a Category of a Item. It Cannot Be Deleted!');
        }

        $category = ItemCategory::find($id);

        $history = new History();
        $history->module = "Item Category";
        $history->module_id = $category->id;
        $history->operation = "Delete";
        $history->previous = json_encode($category);
        $history->after = null;
        $history->user_id = Auth::user()->id;
        $history->ip_address = Session::get('user_ip');
        $history->save();

        $category->delete();

        return redirect()
        ->route('item_category')
        ->with('alert.status', 'success')
        ->with('alert.message', 'Item Category Deleted Successfully!');
    }

}
