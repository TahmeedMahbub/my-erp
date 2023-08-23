<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/sidebar', function () {
    return view('imports.sidebar');
});

Route::get('/', function () {
    return view('index');
});

Route::get('/login', function () {
    return view('authenticates.login');
});

// Route::get('/login', 'LoginController@login')->name('login');

// Route::get('/try', function () {
//     return view('try');
// });
