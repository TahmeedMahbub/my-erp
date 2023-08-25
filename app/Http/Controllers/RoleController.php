<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view('role.index', compact('roles'));
    }

    public function create()
    {
        return view('role.create');
    }

    public function store(Request $request)
    {
        $role = new Role;
        $role->role_name = $request->role_name;
        $role->details = $request->role_details;
        $role->created_by = 1;
        $role->created_at = Carbon::now()->toDateTimeString();
        $role->updated_by = 1;
        $role->updated_at = Carbon::now()->toDateTimeString();
        $role->save();

        return redirect()
        ->route('roles')
        ->with('alert.status', 'success')
        ->with('alert.message', 'Role Created Successfully!');
    }

    public function edit($id)
    {
        $role = Role::find($id);
        return view('role.edit', compact('role'));
    }

    public function update(Request $request)
    {
        $role = Role::find($request->id);
        $role->role_name = $request->role_name;
        $role->details = $request->role_details;
        $role->updated_by = 1;
        $role->updated_at = Carbon::now()->toDateTimeString();
        $role->save();

        return redirect()
        ->route('roles')
        ->with('alert.status', 'success')
        ->with('alert.message', 'Role Edited Successfully!');
    }

    public function delete($id)
    {
        $role = Role::where('id', $id)->where('deletable', 1)->first();

        if($role)
        {
            $role->delete();

            return redirect()
            ->route('roles')
            ->with('alert.status', 'success')
            ->with('alert.message', 'Role Deleted Successfully!');
        }
        else
        {
            return redirect()
            ->route('roles')
            ->with('alert.status', 'danger')
            ->with('alert.message', 'This Role Cannot be Deleted!');
        }
    }
}
