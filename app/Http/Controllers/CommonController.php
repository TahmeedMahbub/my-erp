<?php

namespace App\Http\Controllers;

use App\Models\Contact\User;
use Illuminate\Http\Request;

class CommonController extends Controller
{
    public function usernameCheck($username)
    {
        $user = User::where('username', $username)->first();

        if(empty($user))
        {
            return response()->json(['status' => 'available', 'message' => $username.' is available.']);
        }
        else
        {
            return response()->json(['status' => 'occupied', 'message' => $username.' is occupied by '.$user->name]);
        }

    }
}
