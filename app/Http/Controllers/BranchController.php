<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\History;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class BranchController extends Controller
{
    public function index()
    {
        $branches = Branch::all();
        return view('branch.index', compact('branches'));
    }

    public function create()
    {
        return view('branch.create');
    }

    public function store(Request $request)
    {
        $branch = new Branch();
        $branch->name = $request->branch_name;
        $branch->location = $request->branch_location;
        $branch->details = $request->branch_details;
        $branch->created_by = Auth::user()->id;
        $branch->created_at = Carbon::now()->toDateTimeString();
        $branch->updated_by = Auth::user()->id;
        $branch->updated_at = Carbon::now()->toDateTimeString();
        $branch->save();

        $history = new History();
        $history->module = "Branch";
        $history->module_id = $branch->id;
        $history->operation = "Create";
        $history->previous = null;
        $history->after = json_encode($branch);
        $history->user_id = Auth::user()->id;
        $history->ip_address = Session::get('user_ip');
        $history->save();

        return redirect()
        ->route('branch')
        ->with('alert.status', 'success')
        ->with('alert.message', 'Branch Created Successfully!');
    }

    public function edit($id)
    {
        $branch = Branch::find($id);
        return view('branch.edit', compact('branch'));
    }

    public function update(Request $request)
    {
        $branch = Branch::find($request->id);
        $old_data = clone $branch;
        $branch->name = $request->branch_name;
        $branch->location = $request->branch_location;
        $branch->details = $request->branch_details;
        $branch->updated_by = Auth::user()->id;
        $branch->updated_at = Carbon::now()->toDateTimeString();
        $branch->save();

        $history = new History;
        $history->module = "Branch";
        $history->module_id = $branch->id;
        $history->operation = "Edit";
        $history->previous = json_encode($old_data);
        $history->after = json_encode($branch);
        $history->user_id = Auth::user()->id;
        $history->ip_address = Session::get('user_ip');
        $history->save();

        return redirect()
        ->route('branch')
        ->with('alert.status', 'success')
        ->with('alert.message', 'Branch Edited Successfully!');
    }

    public function delete($id)
    {
        $branch = Branch::where('id', $id)->first();

        if($branch)
        {
            $history = new History;
            $history->module = "Branch";
            $history->module_id = $branch->id;
            $history->operation = "Delete";
            $history->previous = json_encode($branch);
            $history->after = null;
            $history->user_id = Auth::user()->id;
            $history->ip_address = Session::get('user_ip');
            $history->save();

            $branch->delete();

            return redirect()
            ->route('branch')
            ->with('alert.status', 'success')
            ->with('alert.message', 'Branch Deleted Successfully!');
        }
        else
        {
            return redirect()
            ->route('branch')
            ->with('alert.status', 'danger')
            ->with('alert.message', 'This Branch Cannot be Deleted!');
        }
    }
}
