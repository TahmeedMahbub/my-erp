<?php

namespace App\Http\Controllers;

use App\Models\History;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function history()
    {
        $histories = History::all();
        return view('home.history', compact('histories'));
    }
}
