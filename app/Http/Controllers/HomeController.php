<?php

namespace App\Http\Controllers;

use App\Models\History;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function history()
    {
        $histories = History::orderByDesc('id')
        ->where('user_id', '>', 0)
        ->paginate(5);

        return view('home.history', compact('histories'));
    }
}
