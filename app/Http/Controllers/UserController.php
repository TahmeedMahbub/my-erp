<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\History;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('id', '>', 0)->where('verified', 'yes')->get();
        return view('user.index', compact('users'));
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        $user = new User();
        $user->name = $request->branch_name;
        $user->location = $request->branch_location;
        $user->details = $request->branch_details;
        $user->created_by = Auth::user()->id;
        $user->created_at = Carbon::now()->toDateTimeString();
        $user->updated_by = Auth::user()->id;
        $user->updated_at = Carbon::now()->toDateTimeString();
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

        return redirect()
        ->route('user')
        ->with('alert.status', 'success')
        ->with('alert.message', 'User Created Successfully!');
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('user.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = User::find($request->id);
        $old_data = clone $user;
        $user->name = $request->branch_name;
        $user->location = $request->branch_location;
        $user->details = $request->branch_details;
        $user->created_by = Auth::user()->id;
        $user->created_at = Carbon::now()->toDateTimeString();
        $user->updated_by = Auth::user()->id;
        $user->updated_at = Carbon::now()->toDateTimeString();
        $user->save();

        $history = new History;
        $history->module = "User";
        $history->module_id = $user->id;
        $history->operation = "Edit";
        $history->previous = json_encode($old_data);
        $history->after = json_encode($user);
        $history->user_id = Auth::user()->id;
        $history->ip_address = Session::get('user_ip');
        $history->save();

        return redirect()
        ->route('user')
        ->with('alert.status', 'success')
        ->with('alert.message', 'User Edited Successfully!');
    }

    public function delete($id)
    {
        $user = User::where('id', $id)->where('deletable', 1)->first();

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
}
