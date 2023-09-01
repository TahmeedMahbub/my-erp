<?php

namespace App\Http\Controllers;

use App\Models\History;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        return view('index');
    }
}
