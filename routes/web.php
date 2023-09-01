<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\CommonController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;

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

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/signin', [AuthController::class, 'signin'])->name('signin');
Route::get('/forget-password', [AuthController::class, 'forgetPassword'])->name('forget_password');
Route::get('/registration', [AuthController::class, 'registration'])->name('registration');
Route::post('/signup', [AuthController::class, 'signup'])->name('signup');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');
Route::get('/', function () { return view('index'); })->name('home')->middleware('auth');

Route::group(['prefix' => 'access-level', 'middleware' => 'auth'], function () {
    Route::get('/', [OrganizationController::class, 'accessLevel'])->name('access_level')->middleware('auth');
    Route::post('/update', [OrganizationController::class, 'accessLevelUpdate'])->name('access_level_update')->middleware('auth');
    Route::get('/user', [OrganizationController::class, 'accessLevelUser'])->name('access_level_user')->middleware('auth');
    Route::post('/user-update', [OrganizationController::class, 'accessLevelUserUpdate'])->name('access_level_user_update')->middleware('auth');
});

Route::get('/history', [OrganizationController::class, 'history'])->name('history')->middleware('auth');

Route::group(['prefix' => 'role', 'middleware' => 'auth'], function () {
    Route::get('/', [RoleController::class, 'index'])->name('roles');
    Route::get('/view/{id}', [RoleController::class, 'view'])->name('roles_view');
    Route::get('/create', [RoleController::class, 'create'])->name('roles_create');
    Route::post('/store', [RoleController::class, 'store'])->name('roles_store');
    Route::get('/edit/{id}', [RoleController::class, 'edit'])->name('roles_edit');
    Route::post('/update', [RoleController::class, 'update'])->name('roles_update');
    Route::get('/delete/{id}', [RoleController::class, 'delete'])->name('roles_delete');
});

Route::group(['prefix' => 'branch', 'middleware' => 'auth'], function () {
    Route::get('/', [BranchController::class, 'index'])->name('branch');
    Route::get('/view/{id}', [BranchController::class, 'view'])->name('branch_view');
    Route::get('/create', [BranchController::class, 'create'])->name('branch_create');
    Route::post('/store', [BranchController::class, 'store'])->name('branch_store');
    Route::get('/edit/{id}', [BranchController::class, 'edit'])->name('branch_edit');
    Route::post('/update', [BranchController::class, 'update'])->name('branch_update');
    Route::get('/delete/{id}', [BranchController::class, 'delete'])->name('branch_delete');
});

Route::group(['prefix' => 'user', 'middleware' => 'auth'], function () {
    Route::get('/', [UserController::class, 'index'])->name('user');
    Route::get('/view/{id}', [UserController::class, 'view'])->name('user_view');
    Route::get('/create', [UserController::class, 'create'])->name('user_create');
    Route::post('/store', [UserController::class, 'store'])->name('user_store');
    Route::get('/edit/{id}', [UserController::class, 'edit'])->name('user_edit');
    Route::post('/update', [UserController::class, 'update'])->name('user_update');
    Route::get('/delete/{id}', [UserController::class, 'delete'])->name('user_delete');

    Route::get('/password-edit/{id}', [UserController::class, 'passwordEdit'])->name('user_password_edit');
    Route::post('/password-update', [UserController::class, 'passwordUpdate'])->name('user_password_update');
});
