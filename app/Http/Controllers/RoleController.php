<?php

namespace App\Http\Controllers;

use App\Models\History;
use App\Models\Role;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Session\Session as SessionSession;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view('role.index', compact('roles'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('role.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $role = new Role;
        $role->role_name = $request->role_name;
        $role->details = $request->role_details;
        $role->manager_role = $request->manager_role;
        $role->created_by = Auth::user()->id;
        $role->created_at = Carbon::now()->toDateTimeString();
        $role->updated_by = Auth::user()->id;
        $role->updated_at = Carbon::now()->toDateTimeString();
        $role->save();

        $history = new History;
        $history->module = "Role";
        $history->module_id = $role->id;
        $history->operation = "Create";
        $history->previous = null;
        $history->after = json_encode($role);
        $history->user_id = Auth::user()->id;
        $history->ip_address = Session::get('user_ip');
        $history->save();

        return redirect()
        ->route('roles')
        ->with('alert.status', 'success')
        ->with('alert.message', 'Role Created Successfully!');
    }

    public function edit($id)
    {
        $role = Role::find($id);
        $roles = Role::all();
        return view('role.edit', compact('role', 'roles'));
    }

    public function update(Request $request)
    {
        $role = Role::find($request->id);
        $old_role = clone $role;

        $role->role_name = $request->role_name;
        $role->manager_role = $request->manager_role;
        $role->details = $request->role_details;
        $role->updated_by = Auth::user()->id;
        $role->updated_at = Carbon::now()->toDateTimeString();
        $role->save();

        $history = new History;
        $history->module = "Role";
        $history->module_id = $role->id;
        $history->operation = "Edit";
        $history->previous = json_encode($old_role);
        $history->after = json_encode($role);
        $history->user_id = Auth::user()->id;
        $history->ip_address = Session::get('user_ip');
        $history->save();

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
            $history = new History;
            $history->module = "Role";
            $history->module_id = $role->id;
            $history->operation = "Delete";
            $history->previous = json_encode($role);
            $history->after = null;
            $history->user_id = Auth::user()->id;
            $history->ip_address = Session::get('user_ip');
            $history->save();

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
