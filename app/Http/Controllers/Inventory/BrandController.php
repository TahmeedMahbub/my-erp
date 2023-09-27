<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use App\Models\Inventory\Brand;
use App\Models\Organization\History;
use App\Models\Inventory\Item;
use App\Models\Inventory\ItemCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::all();
        return view('brand.index', compact('brands'));
    }

    public function create()
    {
        $brands = Brand::all();
        $categories = ItemCategory::all();
        return view('brand.create', compact('brands', 'categories'));
    }

    public function store(Request $request)
    {
        $brand = new Brand;
        $brand->name = $request->name;
        $brand->details = $request->details;
        $brand->category_id = $request->category;
        $brand->created_by = Auth::user()->id;
        $brand->created_at = Carbon::now()->toDateTimeString();
        $brand->updated_by = Auth::user()->id;
        $brand->updated_at = Carbon::now()->toDateTimeString();
        $brand->save();

        if ($request->hasFile('image')) {
            $file                       = $request->file('image');
            $file_extention             = $file->getClientOriginalExtension();
            $new_file_name              = "brand_" . $brand->id . "." . $file_extention;
            $success                    = $file->move('assets/images/brands', $new_file_name);

            if ($success) {
                $brand->image      = 'brands/' . $new_file_name;
                $brand->save();
            }
        }


        $history = new History;
        $history->module = "Brand";
        $history->module_id = $brand->id;
        $history->operation = "Create";
        $history->previous = null;
        $history->after = json_encode($brand);
        $history->user_id = Auth::user()->id;
        $history->ip_address = Session::get('user_ip');
        $history->save();

        return redirect()
        ->route('brand')
        ->with('alert.status', 'success')
        ->with('alert.message', 'Brand Created Successfully!');
    }

    public function edit($id)
    {
        $brand = Brand::find($id);
        $categories = ItemCategory::all();
        return view('brand.edit', compact('brand', 'categories'));
    }

    public function update(Request $request)
    {
        $brand = Brand::find($request->id);
        $old_brand = clone $brand;

        $brand->name = $request->name;
        $brand->details = $request->details;
        $brand->category_id = $request->category;
        $brand->created_by = Auth::user()->id;
        $brand->created_at = Carbon::now()->toDateTimeString();
        $brand->updated_by = Auth::user()->id;
        $brand->updated_at = Carbon::now()->toDateTimeString();

        if ($request->hasFile('image')) {
            $file                       = $request->file('image');
            $file_extention             = $file->getClientOriginalExtension();
            $new_file_name              = "brand_" . $brand->id . "." . $file_extention;
            $success                    = $file->move('assets/images/brands', $new_file_name);

            if ($success) {
                $brand->image      = 'brands/' . $new_file_name;
            }
        }

        $brand->save();

        $history = new History;
        $history->module = "Brand";
        $history->module_id = $brand->id;
        $history->operation = "Edit";
        $history->previous = json_encode($old_brand);
        $history->after = json_encode($brand);
        $history->user_id = Auth::user()->id;
        $history->ip_address = Session::get('user_ip');
        $history->save();

        return redirect()
        ->route('brand')
        ->with('alert.status', 'success')
        ->with('alert.message', 'Brand Edited Successfully!');
    }

    public function delete($id)
    {
        $item = Item::where('brand_id', $id)->first();
        if(!empty($item))
        {
            return redirect()
            ->route('brand')
            ->with('alert.status', 'danger')
            ->with('alert.message', 'Few Items Are Using This Brand. It Cannot Be Deleted!!!');
        }

        $brand = Brand::find($id);

        if($brand)
        {
            $history = new History;
            $history->module = "Brand";
            $history->module_id = $brand->id;
            $history->operation = "Delete";
            $history->previous = json_encode($brand);
            $history->after = null;
            $history->user_id = Auth::user()->id;
            $history->ip_address = Session::get('user_ip');
            $history->save();

            $brand->delete();

            return redirect()
            ->route('brand')
            ->with('alert.status', 'success')
            ->with('alert.message', 'Brand Deleted Successfully!');
        }
        else
        {
            return redirect()
            ->route('brand')
            ->with('alert.status', 'danger')
            ->with('alert.message', 'This Brand Cannot be Deleted!');
        }
    }
}
