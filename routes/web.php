<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
// Import
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductStaffController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::middleware(['auth', 'user-access:user'])->group(function () {

    Route::get('/home', [HomeController::class, 'index'])->name('home');
});

/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:staff'])->group(function () {

    Route::get('/staff/home', [HomeController::class, 'staffHome'])->name('staff.home');
    // Route::resource('/staff/products-management', ProductController::class);


    Route::resource('/staff/products-management', ProductStaffController::class);
    // Route::get('/staff/products-management', [ProductController::class, 'GetStaffProduct'])->name('staff.GetProducts');

    // Route::get('/staff/products-management', [ProductController::class, 'GetStaffProduct'])->name('staff.GetProducts');

    // Route::get('/staff/products', [ProductController::class, 'index'])->name('staff.products');
});

/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:admin'])->group(function () {

    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');

    Route::resource('/admin/products', ProductController::class);
    Route::resource('/admin/users', UserController::class);
});
