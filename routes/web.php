<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', [App\Http\Controllers\KeyboardController::class, 'welcome'])->name('welcome');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['middleware' => ['admin']], function () {
    Route::get('/admin/home', [AdminController::class, 'index'])->name('admin.view');
});

Route::group(['middleware' => ['auth']], function () {
    Route::get('/user/home', [UserController::class, 'index']);
});

//keyboard
Route::get('/add-keyboard', [App\Http\Controllers\KeyboardController::class, 'add'])->name('add-keyboard');
Route::get('/keyboards/{id}',  [App\Http\Controllers\KeyboardController::class, 'index'])->name('keyboards');

Route::get('/update/keyboard/{id}', [App\Http\Controllers\KeyboardController::class, 'update'])->name('update-page');

Route::post('/store-keyboard', [App\Http\Controllers\KeyboardController::class, 'store'])->name('store-keyboard');
Route::patch('/update/edit/{id}', [App\Http\Controllers\KeyboardController::class, 'edit'])->name('update-keyboard');
Route::delete('/delete/keyboard/{id}', [App\Http\Controllers\KeyboardController::class, 'delete'])->name('delete-keyboard');

//category
Route::get('/manage-category', [App\Http\Controllers\KeyboardCategoryController::class, 'index'])->name('manage-category');
Route::get('/update/category/{id}', [App\Http\Controllers\KeyboardCategoryController::class, 'update'])->name('update-category-page');

Route::patch('/update/category-edit/{id}', [App\Http\Controllers\KeyboardCategoryController::class, 'edit'])->name('update-category');
Route::delete('/delete/category/{id}', [App\Http\Controllers\KeyboardCategoryController::class, 'delete'])->name('delete-category');

// keyboard detail

Route::get('/detail/keyboards/{id}', [App\Http\Controllers\KeyboardController::class, 'detail'])->name('keyboard-detail');


// Cart

Route::get('/carts', [App\Http\Controllers\CartController::class, 'index'])->name('cart');
Route::post('/cart/{user_id}/{keyboard_id}', [App\Http\Controllers\CartController::class, 'store'])->name('store-cart');


// Checkout
Route::get('/history', [App\Http\Controllers\OrderController::class, 'index']);
Route::post('/order', [App\Http\Controllers\OrderController::class, 'store']);



