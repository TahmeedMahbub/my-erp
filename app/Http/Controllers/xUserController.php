<?php

namespace App\Http\Controllers;

use App\Models\Organization\Branch;
use App\Models\Contact\User;
use Illuminate\Http\Request;
use App\Models\Organization\History;
use App\Models\Contact\Role;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    // SEND ROLES AND BRANCHES
    // CHECK PASSWORD

    public function index()
    {
        $users = User::where('id', '>', 0)->where('verified', 'yes')->get();
        return view('user.index', compact('users'));
    }

    public function create()
    {
        $branches = Branch::all();
        $roles = Role::all();
        $users = User::where('id', '>', 0)->get();
        return view('user.create', compact('branches', 'roles', 'users'));
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try
        {
            $user = new User();
            $user->name = $request->name;
            $user->phone = (int)$request->phone;
            $user->email = $request->email;
            $user->password = $request->password;
            $user->verified = "yes";
            $user->branch_id = $request->branch_id;
            $user->role_id = $request->role_id;
            $user->manager_role_id = $request->m_role_id;
            $user->manager_id = $request->manager_id;
            $user->date_of_birth = $request->dob;
            $user->address = $request->address;
            $user->username = $request->username;
            $user->phone_1 = $request->phone_1;
            $user->company = $request->company;
            $user->joining_date = $request->joining_date;
            $user->created_by = Auth::user()->id;
            $user->created_at = Carbon::now()->toDateTimeString();
            $user->updated_by = Auth::user()->id;
            $user->updated_at = Carbon::now()->toDateTimeString();

            if ($request->hasFile('image')) {
                $file                       = $request->file('image');
                $file_extention             = $file->getClientOriginalExtension();
                $new_file_name              = "user_" . $user->username . "." . $file_extention;
                $success                    = $file->move('assets/images/users', $new_file_name);

                if ($success) {
                    $user->image      = 'users/' . $new_file_name;
                }
            }

            if ($request->hasFile('nid_image')) {
                $file                       = $request->file('nid_image');
                $file_extention             = $file->getClientOriginalExtension();
                $new_file_name              = "nid_" . $user->username . "." . $file_extention;
                $success                    = $file->move('assets/images/user_nid', $new_file_name);

                if ($success) {
                    $user->nid_image      = 'user_nid/' . $new_file_name;
                }
            }

            $user->save();

            $history = new History();
            $history->module = "User";
            $history->module_id = $user->id;
            $history->operation = "Create";
            $history->previous = null;
            $history->after = json_encode($user);
            $history->user_id = Auth::user()->id;
            $history->ip_address = Session::get('user_ip');
            $history->save();
            DB::commit();

            return redirect()
            ->route('user')
            ->with('alert.status', 'success')
            ->with('alert.message', 'User Created Successfully!');
        }
        catch(Exception $e)
        {
            DB::rollBack();
            return redirect()
            ->route('user')
            ->with('alert.status', 'danger')
            ->with('alert.message', 'Error in User Creation!!!');
        }
    }

    public function edit($id)
    {
        $branches = Branch::all();
        $roles = Role::all();
        $user = User::find($id);
        $users = User::where('id', '>', 0)->get();
        return view('user.edit', compact('user', 'branches', 'roles', 'users'));
    }

    public function update(Request $request)
    {
        DB::beginTransaction();
        try
        {
            $user = User::find($request->id);
            $old_user = clone $user;

            $user->name = $request->name;
            $user->phone = (int)$request->phone;
            $user->email = $request->email;
            $user->verified = "yes";
            $user->branch_id = $request->branch_id;
            $user->role_id = $request->role_id;
            $user->manager_role_id = $request->m_role_id;
            $user->manager_id = $request->manager_id;
            $user->date_of_birth = $request->dob;
            $user->address = $request->address;
            $user->username = $request->username;
            $user->phone_1 = $request->phone_1;
            $user->company = $request->company;
            $user->joining_date = $request->joining_date;
            $user->updated_by = Auth::user()->id;
            $user->updated_at = Carbon::now()->toDateTimeString();

            if ($request->hasFile('image')) {
                $file                       = $request->file('image');
                $file_extention             = $file->getClientOriginalExtension();
                $new_file_name              = "user_" . $user->username . "." . $file_extention;
                $success                    = $file->move('assets/images/users', $new_file_name);

                if ($success) {
                    $user->image      = 'users/' . $new_file_name;
                }
            }

            if ($request->hasFile('nid_image')) {
                $file                       = $request->file('nid_image');
                $file_extention             = $file->getClientOriginalExtension();
                $new_file_name              = "nid_" . $user->username . "." . $file_extention;
                $success                    = $file->move('assets/images/user_nid', $new_file_name);

                if ($success) {
                    $user->nid_image      = 'user_nid/' . $new_file_name;
                }
            }

            $user->save();

            $history = new History();
            $history->module = "User";
            $history->module_id = $user->id;
            $history->operation = "Edit";
            $history->previous = json_encode($old_user);
            $history->after = json_encode($user);
            $history->user_id = Auth::user()->id;
            $history->ip_address = Session::get('user_ip');
            $history->save();
            DB::commit();

            return redirect()
            ->route('user')
            ->with('alert.status', 'success')
            ->with('alert.message', 'User Edit Successfully!');
        }
        catch(Exception $e)
        {
            DB::rollBack();
            return redirect()
            ->route('user')
            ->with('alert.status', 'danger')
            ->with('alert.message', 'Error to Edit User!!! '.$e);
        }
    }

    public function delete($id)
    {
        $user = User::where('id', $id)->first();

        if($user)
        {
            $history = new History;
            $history->module = "User";
            $history->module_id = $user->id;
            $history->operation = "Delete";
            $history->previous = json_encode($user);
            $history->after = null;
            $history->user_id = Auth::user()->id;
            $history->ip_address = Session::get('user_ip');
            $history->save();

            $user->delete();

            return redirect()
            ->route('user')
            ->with('alert.status', 'success')
            ->with('alert.message', 'User Deleted Successfully!');
        }
        else
        {
            return redirect()
            ->route('user')
            ->with('alert.status', 'danger')
            ->with('alert.message', 'This User Cannot be Deleted!');
        }
    }

    public function passwordEdit($id)
    {
        $user = User::find($id);
        return view('user.password', compact('user'));
    }

    public function passwordUpdate(Request $request)
    {
        $user = User::find($request->id);
        if(!Hash::check($request->prev_pass, $user->password))
        {
            return back()
            ->with('alert.status', 'danger')
            ->with('alert.message', 'Entered Wrong Password!');
        }

        if($request->new_pass != $request->confirm_pass)
        {
            return back()
            ->with('alert.status', 'danger')
            ->with('alert.message', 'New Password and Confirm Password Not Matched!');
        }

        $user->password = $request->new_pass;
        $user->save();

        $history = new History;
        $history->module = "User";
        $history->module_id = $user->id;
        $history->operation = "Edit";
        $history->previous = json_encode(['password' => 'Changed Previous']);
        $history->after = json_encode(['password' => 'Added New Password']);
        $history->user_id = Auth::user()->id;
        $history->ip_address = Session::get('user_ip');
        $history->save();

        return redirect()
        ->route('user')
        ->with('alert.status', 'success')
        ->with('alert.message', 'Password Changed Successfully!');
    }
}
