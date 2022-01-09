<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\ChangePasswordController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KeyboardCategoryController;
use App\Http\Controllers\KeyboardController;
use App\Http\Controllers\OrderController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'welcome'])->name('welcome');

Auth::routes();

// Admin
Route::group(['middleware' => ['admin']], function () {
    
    Route::get('/update/keyboard/{id}', [KeyboardController::class, 'update'])->name('update-page');
    Route::get('/add-keyboard', [KeyboardController::class, 'add'])->name('add-keyboard');
    Route::post('/store-keyboard', [KeyboardController::class, 'store'])->name('store-keyboard');
    Route::patch('/update/edit/{id}', [KeyboardController::class, 'edit'])->name('update-keyboard');
    Route::delete('/delete/keyboard/{id}', [KeyboardController::class, 'delete'])->name('delete-keyboard');
    Route::get('/manage-category', [KeyboardCategoryController::class, 'index'])->name('manage-category');
    Route::get('/update/category/{id}', [KeyboardCategoryController::class, 'update'])->name('update-category-page');

    Route::patch('/update/category-edit/{id}', [KeyboardCategoryController::class, 'edit'])->name('update-category');
    Route::delete('/delete/category/{id}', [KeyboardCategoryController::class, 'delete'])->name('delete-category');
});



Route::group(['middleware' => ['auth']], function () {
    // Cart

    Route::get('/carts', [CartController::class, 'index'])->name('cart');
    Route::post('/cart/{user_id}/{keyboard_id}', [CartController::class, 'store'])->name('store-cart');
    Route::patch('/update/cart/{cart_id}', [CartController::class, 'update'])->name('update-cart');

    // Checkout
    Route::get('/history', [OrderController::class, 'index'])->name('history');
    Route::post('/order', [OrderController::class, 'store']);
    Route::get('/order/detail/{id}', [OrderController::class, 'detail']);

    // Change Password
    Route::get('/change_password', [ChangePasswordController::class, 'index'])->name('change_password')->middleware('auth');
    Route::patch('/update_new_passwords', [ChangePasswordController::class, 'update'])->name('update_password');
});

Route::get('/keyboards/{id}',  [KeyboardController::class, 'index'])->name('keyboards');

//search
Route::get('/keyboards/search/{id}',  [KeyboardController::class, 'search'])->name('keyboards-search');

// keyboard detail

Route::get('/detail/keyboards/{id}', [KeyboardController::class, 'detail'])->name('keyboard-detail');





