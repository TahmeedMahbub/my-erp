<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Organization\BranchController;
use App\Http\Controllers\Inventory\BrandController;
use App\Http\Controllers\CommonController;
use App\Http\Controllers\Contact\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Inventory\ItemController;
use App\Http\Controllers\Organization\OrganizationController;
use App\Http\Controllers\MoneyOut\PurchaseController;
use App\Http\Controllers\Contact\RoleController;
use App\Http\Controllers\Inventory\UnitController;
use App\Http\Controllers\Contact\UserController;
use App\Http\Controllers\MoneyOut\PaymentMadeController;

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

Route::group(['prefix' => 'unit', 'middleware' => 'auth'], function () {
    Route::get('/', [UnitController::class, 'index'])->name('unit')->middleware('readAccess');
    Route::get('/view/{id}', [UnitController::class, 'view'])->name('unit_view')->middleware('readAccess');
    Route::get('/create', [UnitController::class, 'create'])->name('unit_create')->middleware('createAccess');
    Route::post('/store', [UnitController::class, 'store'])->name('unit_store')->middleware('createAccess');
    Route::get('/edit/{id}', [UnitController::class, 'edit'])->name('unit_edit')->middleware('updateAccess');
    Route::post('/update', [UnitController::class, 'update'])->name('unit_update')->middleware('updateAccess');
    Route::get('/delete/{id}', [UnitController::class, 'delete'])->name('unit_delete')->middleware('deleteAccess');
});

Route::group(['prefix' => 'brand', 'middleware' => 'auth'], function () {
    Route::get('/', [BrandController::class, 'index'])->name('brand')->middleware('readAccess');
    Route::get('/view/{id}', [BrandController::class, 'view'])->name('brand_view')->middleware('readAccess');
    Route::get('/create', [BrandController::class, 'create'])->name('brand_create')->middleware('createAccess');
    Route::post('/store', [BrandController::class, 'store'])->name('brand_store')->middleware('createAccess');
    Route::get('/edit/{id}', [BrandController::class, 'edit'])->name('brand_edit')->middleware('updateAccess');
    Route::post('/update', [BrandController::class, 'update'])->name('brand_update')->middleware('updateAccess');
    Route::get('/delete/{id}', [BrandController::class, 'delete'])->name('brand_delete')->middleware('deleteAccess');
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

Route::group(['prefix' => 'item', 'middleware' => 'auth'], function () {
    Route::get('/', [ItemController::class, 'index'])->name('item')->middleware('readAccess');
    Route::get('/view/{id}', [ItemController::class, 'view'])->name('item_view')->middleware('readAccess');
    Route::get('/create', [ItemController::class, 'create'])->name('item_create')->middleware('createAccess');
    Route::post('/store', [ItemController::class, 'store'])->name('item_store')->middleware('createAccess');
    Route::get('/edit/{id}', [ItemController::class, 'edit'])->name('item_edit')->middleware('updateAccess');
    Route::post('/update', [ItemController::class, 'update'])->name('item_update')->middleware('updateAccess');
    Route::get('/delete/{id}', [ItemController::class, 'delete'])->name('item_delete')->middleware('deleteAccess');

    Route::get('/category/', [ItemController::class, 'categoryIndex'])->name('item_category')->middleware('readAccess');
    Route::get('/category/view/{id}', [ItemController::class, 'categoryView'])->name('item_category_view')->middleware('readAccess');
    Route::get('/category/create', [ItemController::class, 'categoryCreate'])->name('item_category_create')->middleware('createAccess');
    Route::post('/category/store', [ItemController::class, 'categoryStore'])->name('item_category_store')->middleware('createAccess');
    Route::get('/category/edit/{id}', [ItemController::class, 'categoryEdit'])->name('item_category_edit')->middleware('updateAccess');
    Route::post('/category/update', [ItemController::class, 'categoryUpdate'])->name('item_category_update')->middleware('updateAccess');
    Route::get('/category/delete/{id}', [ItemController::class, 'categoryDelete'])->name('item_category_delete')->middleware('deleteAccess');
});

Route::group(['prefix' => 'purchase', 'middleware' => 'auth'], function () {
    Route::get('/', [PurchaseController::class, 'index'])->name('purchase')->middleware('readAccess');
    Route::get('/view/{id}', [PurchaseController::class, 'view'])->name('purchase_view')->middleware('readAccess');
    Route::get('/create', [PurchaseController::class, 'create'])->name('purchase_create')->middleware('createAccess');
    Route::post('/store', [PurchaseController::class, 'store'])->name('purchase_store')->middleware('createAccess');
    Route::get('/edit/{id}', [PurchaseController::class, 'edit'])->name('purchase_edit')->middleware('updateAccess');
    Route::post('/update', [PurchaseController::class, 'update'])->name('purchase_update')->middleware('updateAccess');
    Route::get('/delete/{id}', [PurchaseController::class, 'delete'])->name('purchase_delete')->middleware('deleteAccess');
});

Route::group(['prefix' => 'payment-made', 'middleware' => 'auth'], function () {
    Route::get('/', [PaymentMadeController::class, 'index'])->name('payment')->middleware('readAccess');
    Route::get('/view/{id}', [PaymentMadeController::class, 'view'])->name('payment_view')->middleware('readAccess');
    Route::get('/create', [PaymentMadeController::class, 'create'])->name('payment_create')->middleware('createAccess');
    Route::post('/store', [PaymentMadeController::class, 'store'])->name('payment_store')->middleware('createAccess');
    Route::get('/edit/{id}', [PaymentMadeController::class, 'edit'])->name('payment_edit')->middleware('updateAccess');
    Route::post('/update', [PaymentMadeController::class, 'update'])->name('payment_update')->middleware('updateAccess');
    Route::get('/delete/{id}', [PaymentMadeController::class, 'delete'])->name('payment_delete')->middleware('deleteAccess');

    Route::get('/remaining-payments/{vendor_id}', [PaymentMadeController::class, 'remainingPayments'])->name('remaining_payments')->middleware('readAccess');
});
