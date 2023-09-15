<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\CommonController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\ProductController;
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
Route::get('/', [HomeController::class, 'home'])->name('home')->middleware('auth');

Route::group(['prefix' => 'access-level', 'middleware' => 'auth'], function () {
    Route::get('/', [OrganizationController::class, 'accessLevel'])->name('access_level')->middleware('updateAccess');
    Route::post('/update', [OrganizationController::class, 'accessLevelUpdate'])->name('access_level_update')->middleware('updateAccess');
    Route::get('/user', [OrganizationController::class, 'accessLevelUser'])->name('access_level_user')->middleware('updateAccess');
    Route::post('/user-update', [OrganizationController::class, 'accessLevelUserUpdate'])->name('access_level_user_update')->middleware('updateAccess');
    Route::get('/user-revert/{user_id}', [OrganizationController::class, 'accessLevelUserRevert'])->name('access_level_user_revert')->middleware('updateAccess');
});

Route::group(['prefix' => 'history', 'middleware' => 'auth'], function () {
    Route::get('/', [OrganizationController::class, 'history'])->name('history')->middleware('readAccess');
});

Route::group(['prefix' => 'role', 'middleware' => 'auth'], function () {
    Route::get('/', [RoleController::class, 'index'])->name('roles')->middleware('readAccess');
    Route::get('/view/{id}', [RoleController::class, 'view'])->name('roles_view')->middleware('readAccess');
    Route::get('/create', [RoleController::class, 'create'])->name('roles_create')->middleware('createAccess');
    Route::post('/store', [RoleController::class, 'store'])->name('roles_store')->middleware('createAccess');
    Route::get('/edit/{id}', [RoleController::class, 'edit'])->name('roles_edit')->middleware('updateAccess');
    Route::post('/update', [RoleController::class, 'update'])->name('roles_update')->middleware('updateAccess');
    Route::get('/delete/{id}', [RoleController::class, 'delete'])->name('roles_delete')->middleware('deleteAccess');
});

Route::group(['prefix' => 'branch', 'middleware' => 'auth'], function () {
    Route::get('/', [BranchController::class, 'index'])->name('branch')->middleware('readAccess');
    Route::get('/view/{id}', [BranchController::class, 'view'])->name('branch_view')->middleware('readAccess');
    Route::get('/create', [BranchController::class, 'create'])->name('branch_create')->middleware('createAccess');
    Route::post('/store', [BranchController::class, 'store'])->name('branch_store')->middleware('createAccess');
    Route::get('/edit/{id}', [BranchController::class, 'edit'])->name('branch_edit')->middleware('updateAccess');
    Route::post('/update', [BranchController::class, 'update'])->name('branch_update')->middleware('updateAccess');
    Route::get('/delete/{id}', [BranchController::class, 'delete'])->name('branch_delete')->middleware('deleteAccess');
});

Route::group(['prefix' => 'user', 'middleware' => 'auth'], function () {
    Route::get('/', [UserController::class, 'index'])->name('user')->middleware('readAccess');
    Route::get('/view/{id}', [UserController::class, 'view'])->name('user_view')->middleware('readAccess');
    Route::get('/create', [UserController::class, 'create'])->name('user_create')->middleware('createAccess');
    Route::post('/store', [UserController::class, 'store'])->name('user_store')->middleware('createAccess');
    Route::get('/edit/{id}', [UserController::class, 'edit'])->name('user_edit')->middleware('updateAccess');
    Route::post('/update', [UserController::class, 'update'])->name('user_update')->middleware('updateAccess');
    Route::get('/delete/{id}', [UserController::class, 'delete'])->name('user_delete')->middleware('deleteAccess');

    Route::get('/password-edit/{id}', [UserController::class, 'passwordEdit'])->name('user_password_edit')->middleware('updateAccess');
    Route::post('/password-update', [UserController::class, 'passwordUpdate'])->name('user_password_update')->middleware('updateAccess');
});

Route::group(['prefix' => 'contact', 'middleware' => 'auth'], function () {
    Route::get('/', [ContactController::class, 'index'])->name('contact')->middleware('readAccess');
    Route::get('/view/{id}', [ContactController::class, 'view'])->name('contact_view')->middleware('readAccess');
    Route::get('/create', [ContactController::class, 'create'])->name('contact_create')->middleware('createAccess');
    Route::post('/store', [ContactController::class, 'store'])->name('contact_store')->middleware('createAccess');
    Route::get('/edit/{id}', [ContactController::class, 'edit'])->name('contact_edit')->middleware('updateAccess');
    Route::post('/update', [ContactController::class, 'update'])->name('contact_update')->middleware('updateAccess');
    Route::get('/delete/{id}', [ContactController::class, 'delete'])->name('contact_delete')->middleware('deleteAccess');

    Route::get('/category/', [ContactController::class, 'categoryIndex'])->name('contact_category')->middleware('readAccess');
    Route::get('/category/view/{id}', [ContactController::class, 'categoryView'])->name('contact_category_view')->middleware('readAccess');
    Route::get('/category/create', [ContactController::class, 'categoryCreate'])->name('contact_category_create')->middleware('createAccess');
    Route::post('/category/store', [ContactController::class, 'categoryStore'])->name('contact_category_store')->middleware('createAccess');
    Route::get('/category/edit/{id}', [ContactController::class, 'categoryEdit'])->name('contact_category_edit')->middleware('updateAccess');
    Route::post('/category/update', [ContactController::class, 'categoryUpdate'])->name('contact_category_update')->middleware('updateAccess');
    Route::get('/category/delete/{id}', [ContactController::class, 'categoryDelete'])->name('contact_category_delete')->middleware('deleteAccess');
});

Route::group(['prefix' => 'product', 'middleware' => 'auth'], function () {
    Route::get('/', [ProductController::class, 'index'])->name('product')->middleware('readAccess');
    Route::get('/view/{id}', [ProductController::class, 'view'])->name('product_view')->middleware('readAccess');
    Route::get('/create', [ProductController::class, 'create'])->name('product_create')->middleware('createAccess');
    Route::post('/store', [ProductController::class, 'store'])->name('product_store')->middleware('createAccess');
    Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('product_edit')->middleware('updateAccess');
    Route::post('/update', [ProductController::class, 'update'])->name('product_update')->middleware('updateAccess');
    Route::get('/delete/{id}', [ProductController::class, 'delete'])->name('product_delete')->middleware('deleteAccess');

    Route::get('/category/', [ProductController::class, 'categoryIndex'])->name('product_category')->middleware('readAccess');
    Route::get('/category/view/{id}', [ProductController::class, 'categoryView'])->name('product_category_view')->middleware('readAccess');
    Route::get('/category/create', [ProductController::class, 'categoryCreate'])->name('product_category_create')->middleware('createAccess');
    Route::post('/category/store', [ProductController::class, 'categoryStore'])->name('product_category_store')->middleware('createAccess');
    Route::get('/category/edit/{id}', [ProductController::class, 'categoryEdit'])->name('product_category_edit')->middleware('updateAccess');
    Route::post('/category/update', [ProductController::class, 'categoryUpdate'])->name('product_category_update')->middleware('updateAccess');
    Route::get('/category/delete/{id}', [ProductController::class, 'categoryDelete'])->name('product_category_delete')->middleware('deleteAccess');
});
