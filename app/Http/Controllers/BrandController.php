<?php

namespace App\Http\Controllers;

use App\Models\History;
use App\Models\Item;
use App\Models\Unit;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class BrandController extends Controller
{
    public function index()
    {
        $units = Unit::all();
        return view('unit.index', compact('units'));
    }

    public function create()
    {
        $units = Unit::all();
        return view('unit.create', compact('units'));
    }

    public function store(Request $request)
    {
        $unit = new Unit;
        $unit->name = $request->name;
        $unit->details = $request->details;
        $unit->base_unit = $request->base_unit;
        $unit->created_by = Auth::user()->id;
        $unit->created_at = Carbon::now()->toDateTimeString();
        $unit->updated_by = Auth::user()->id;
        $unit->updated_at = Carbon::now()->toDateTimeString();
        $unit->save();

        $history = new History;
        $history->module = "Unit";
        $history->module_id = $unit->id;
        $history->operation = "Create";
        $history->previous = null;
        $history->after = json_encode($unit);
        $history->user_id = Auth::user()->id;
        $history->ip_address = Session::get('user_ip');
        $history->save();

        return redirect()
        ->route('unit')
        ->with('alert.status', 'success')
        ->with('alert.message', 'Unit Created Successfully!');
    }

    public function edit($id)
    {
        $unit = Unit::find($id);
        $units = Unit::all();
        return view('unit.edit', compact('unit', 'units'));
    }

    public function update(Request $request)
    {
        $unit = Unit::find($request->id);
        $old_role = clone $unit;

        $unit->name = $request->name;
        $unit->base_unit = $request->base_unit;
        $unit->details = $request->details;
        $unit->updated_by = Auth::user()->id;
        $unit->updated_at = Carbon::now()->toDateTimeString();
        $unit->save();

        $history = new History;
        $history->module = "Unit";
        $history->module_id = $unit->id;
        $history->operation = "Edit";
        $history->previous = json_encode($old_role);
        $history->after = json_encode($unit);
        $history->user_id = Auth::user()->id;
        $history->ip_address = Session::get('user_ip');
        $history->save();

        return redirect()
        ->route('unit')
        ->with('alert.status', 'success')
        ->with('alert.message', 'Unit Edited Successfully!');
    }

    public function delete($id)
    {
        $item = Item::where('unit_id', $id)->first();
        if(!empty($item))
        {
            return redirect()
            ->route('unit')
            ->with('alert.status', 'danger')
            ->with('alert.message', 'Few Items Are Using This Unit. It Cannot Be Deleted!!!');
        }

        $unit = Unit::where('id', $id)->first();

        if($unit)
        {
            $history = new History;
            $history->module = "Unit";
            $history->module_id = $unit->id;
            $history->operation = "Delete";
            $history->previous = json_encode($unit);
            $history->after = null;
            $history->user_id = Auth::user()->id;
            $history->ip_address = Session::get('user_ip');
            $history->save();

            $unit->delete();

            return redirect()
            ->route('unit')
            ->with('alert.status', 'success')
            ->with('alert.message', 'Unit Deleted Successfully!');
        }
        else
        {
            return redirect()
            ->route('unit')
            ->with('alert.status', 'danger')
            ->with('alert.message', 'This Unit Cannot be Deleted!');
        }
    }

    public function userByUnit($unit_id)
    {
        $users = User::where('role_id', $unit_id)->where('id', '>', 0)->get();
        return response()->json(['role_id' => $unit_id, 'users' => $users]);
    }
}
