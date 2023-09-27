<?php

namespace App\Http\Middleware;

use App\Models\Organization\AccessLevel;
use App\Models\Organization\Module;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UpdateAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();
        if(!isset($user))
        {
            return redirect()
                ->route('login')
                ->with('alert.status', 'warning')
                ->with('alert.message', 'You must login first!');
        }

        $prefix = substr($request->route()->getPrefix(), 1);
        $module = Module::where('module_prefix', $prefix)->first();

        if(!isset($module))
        {
            return redirect()->back()
                ->with('alert.status', 'warning')
                ->with('alert.message', 'No Permission Module Found! Contact Your Dev To Create Module for Permission.');
        }

        $role_access_levels  = AccessLevel::where('module_id', $module->id)->where('role_id', $user->role_id)->first();
        $user_access_levels  = AccessLevel::where('module_id', $module->id)->where('user_id', $user->id)->first();

        if(!empty($user_access_levels))
        {
            // SPECIAL ACCESS FOR USERS
            if($user_access_levels->update != 1)
            {
                return redirect()->back()
                    ->with('alert.status', 'warning')
                    ->with('alert.message', 'You don\'t have permission for this operation!');
            }
        }
        else if(!empty($role_access_levels))
        {
            // IF NO USER ACCESS THEN CHECK ROLE ACCESS
            if($role_access_levels->update != 1)
            {
                return redirect()->back()
                    ->with('alert.status', 'warning')
                    ->with('alert.message', 'You don\'t have permission for this operation!');
            }
        }
        else
        {
            // ACCESS LEVEL OF ROLE WAS NOT CREATED YET
            return redirect()->back()
                ->with('alert.status', 'warning')
                ->with('alert.message', 'You don\'t have permission for this operation!');
        }


        return $next($request);
    }
}
