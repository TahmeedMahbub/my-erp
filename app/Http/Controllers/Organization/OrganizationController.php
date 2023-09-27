<?php

namespace App\Http\Controllers\Organization;

use App\Http\Controllers\Controller;
use App\Models\AccessLevel;
use App\Models\History;
use App\Models\Module;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class OrganizationController extends Controller
{
    public function history()
    {
        $histories = History::orderByDesc('id')
        ->where('user_id', '>', 0)
        ->paginate(5);

        return view('home.history', compact('histories'));
    }

    public function accessLevel()
    {
        $role_id = !empty($_GET["role_id"]) ? $_GET["role_id"] : 0;
        $roles = Role::all();
        $modules = Module::all();
        $access_levels = AccessLevel::where('role_id', $role_id)->get();
        return view('organization.access_level', compact('roles', 'modules', 'role_id', 'access_levels'));
    }

    public function accessLevelUpdate(Request $request)
    {
        $access_unset = [
            'create' => 0,
            'read'   => 0,
            'update' => 0,
            'delete' => 0,
        ];
        AccessLevel::where('role_id', $request->role_id)->update($access_unset);
        $history_flag = false;

        if(!empty($request->access))
        {
            foreach($request->access as $module_id => $access)
            {
                $access_level = AccessLevel::where('role_id', $request->role_id)->where('module_id', $module_id)->first();
                if(empty($access_level))
                {
                    $access_level = new AccessLevel;
                    $access_level->module_id = $module_id;
                    $access_level->role_id = $request->role_id;
                    $access_level->user_id = null;
                    $access_level->create = 0;
                    $access_level->read = 0;
                    $access_level->update = 0;
                    $access_level->delete = 0;
                    $access_level->save();

                    $history_flag = true;
                }

                foreach($access as $level => $on)
                {
                    $access_level[$level] = 1;
                    $access_level->save();
                }
            }

            if($history_flag)
            {
                $history = new History;
                $history->module = "Access Level";
                $history->module_id = $access_level->id;
                $history->operation = "Create";
                $history->previous = json_encode(['Comment' => "Role Access Level Created"]);
                $history->after = json_encode(['Comment' => "Role ID: ".$request->role_id]);
                $history->user_id = Auth::user()->id;
                $history->ip_address = Session::get('user_ip');
                $history->save();
            }
            else
            {
                $history = new History;
                $history->module = "Access Level";
                $history->module_id = $access_level->id;
                $history->operation = "Edit";
                $history->previous = json_encode(['Comment' => "Role Access Level Changed"]);
                $history->after = json_encode(['Comment' => "Role ID: ".$request->role_id]);
                $history->user_id = Auth::user()->id;
                $history->ip_address = Session::get('user_ip');
                $history->save();
            }
        }

        return redirect()
        ->route('access_level', ['role_id' => $request->role_id])
        ->with('alert.status', 'success')
        ->with('alert.message', 'Role Access Level Updated Successfully!');
    }

    public function accessLevelUser()
    {
        $users = User::where('id', '>', 0)->get();
        $user_id = !empty($_GET["user_id"]) ? $_GET["user_id"] : 0;
        $roles = Role::all();
        $modules = Module::all();
        $access_levels = AccessLevel::where('user_id', $user_id)->get();
        return view('organization.access_level_user', compact('roles', 'modules', 'user_id', 'access_levels', 'users'));
    }

    public function accessLevelUserUpdate(Request $request)
    {
        $access_unset = [
            'create' => 0,
            'read'   => 0,
            'update' => 0,
            'delete' => 0,
        ];
        AccessLevel::where('user_id', $request->user_id)->update($access_unset);
        $history_flag = false;

        if(!empty($request->access))
        {
            foreach($request->access as $module_id => $access)
            {
                $access_level = AccessLevel::where('user_id', $request->user_id)->where('module_id', $module_id)->first();
                if(empty($access_level))
                {
                    $access_level = new AccessLevel;
                    $access_level->module_id = $module_id;
                    $access_level->user_id = $request->user_id;
                    $access_level->role_id = null;
                    $access_level->create = 0;
                    $access_level->read = 0;
                    $access_level->update = 0;
                    $access_level->delete = 0;
                    $access_level->save();

                    $history_flag = true;
                }

                foreach($access as $level => $on)
                {
                    $access_level[$level] = 1;
                    $access_level->save();
                }
            }

            if($history_flag)
            {
                $history = new History;
                $history->module = "Access Level";
                $history->module_id = $access_level->id;
                $history->operation = "Create";
                $history->previous = json_encode(['Comment' => "User Access Level Created"]);
                $history->after = json_encode(['Comment' => "User ID: ".$request->user_id]);
                $history->user_id = Auth::user()->id;
                $history->ip_address = Session::get('user_ip');
                $history->save();
            }
            else
            {
                $history = new History;
                $history->module = "Access Level";
                $history->module_id = $access_level->id;
                $history->operation = "Edit";
                $history->previous = json_encode(['Comment' => "User Access Level Changed"]);
                $history->after = json_encode(['Comment' => "User ID: ".$request->user_id]);
                $history->user_id = Auth::user()->id;
                $history->ip_address = Session::get('user_ip');
                $history->save();
            }
        }

        return redirect()
        ->route('access_level_user', ['user_id' => $request->user_id])
        ->with('alert.status', 'success')
        ->with('alert.message', 'User Access Level Updated Successfully!');
    }

    public function accessLevelUserRevert($user_id)
    {
        $history = new History;
        $history->module = "Access Level";
        $history->module_id = AccessLevel::where('user_id', $user_id)->first()->id;
        $history->operation = "Delete";
        $history->previous = json_encode(['Comment' => "User Access Level Reverted"]);
        $history->after = json_encode(['Comment' => "User ID: ".$user_id]);
        $history->user_id = Auth::user()->id;
        $history->ip_address = Session::get('user_ip');
        $history->save();

        AccessLevel::where('user_id', $user_id)->delete();

        return redirect()
            ->route('access_level_user', ['user_id' => $user_id])
            ->with('alert.status', 'success')
            ->with('alert.message', 'User Access Level Reverted According to Role Successfully!');
    }
}
