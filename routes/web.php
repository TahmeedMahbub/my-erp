<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RoleController;

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

// Route::get('/login', function () {
//     return view('authenticates.login');
// });

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/signin', [AuthController::class, 'signin'])->name('signin');

Route::get('/forget-password', [AuthController::class, 'forgetPassword'])->name('forget_password');

Route::get('/registration', [AuthController::class, 'registration'])->name('registration');
Route::post('/signup', [AuthController::class, 'signup'])->name('signup');

// ADD MIDDLEWARES
Route::get('/roles', [RoleController::class, 'roles'])->name('roles');

// Route::get('/try', function () {
//     return view('try');
// });
