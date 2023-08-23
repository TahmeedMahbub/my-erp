<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        return view('authenticates.login');
    }

    public function signin(Request $request)
    {
        return view('authenticates.login'); // redirect dashboard, later
    }

    public function registration()
    {
        return view('authenticates.registration');
    }
}
