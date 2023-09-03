<?php

use App\Http\Controllers\CommonController;
use App\Http\Controllers\RoleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/username-check/{username?}', [CommonController::class, 'usernameCheck'])->name('username_check');

Route::get('/user-by-role/{role_id?}', [RoleController::class, 'userByRole'])->name('user_by_role')->middleware('auth');
