<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

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

Route::get('/',[HomeController::class,'welcome'])->name('welcome');

route::get('/redirects',[HomeController::class,"index"])->name('halaman');

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),
'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/logout',[HomeController::class, 'logout'])->name('logout');

Route::get('/user',[UserController::class, 'index'])->name('user');
Route::get('/create',[UserController::class, 'create'])->name('user.create');
Route::post('/createuser',[UserController::class, 'database'])->name('user.database');
Route::get('/edituser/{id}',[UserController::class, 'edit'])->name('edit.user');
Route::put('/updateuser/{id}',[UserController::class, 'update'])->name('user.update');
Route::delete('/delete/{id}',[UserController::class, 'delete'])->name('user.delete');

Route::get('/produk',[ProductController::class, 'index'])->name('produk');
Route::get('/createproduct',[ProductController::class, 'create'])->name('product.create');
Route::post('/createproductproses',[ProductController::class, 'database'])->name('product.database');
Route::get('/editproduct/{id}',[ProductController::class, 'edit'])->name('edit.product');
Route::put('/updateproduct/{id}',[ProductController::class, 'update'])->name('product.update');
Route::delete('/deleteproduk/{id}',[ProductController::class, 'delete'])->name('product.delete');

Route::get('/order',[OrderController::class, 'index'])->name('order');

Route::get('/add-to-cart/{id}',[ProductController::class, 'addToCart'])->name('add_to_cart');
Route::get('/cart',[ProductController::class, 'cart'])->name('cart');
Route::delete('/remove-from-cart',[ProductController::class, 'remove'])->name('remove_from_cart');
Route::patch('update-cart', [ProductController::class, 'updated'])->name('update_cart');

Route::get('/orderadmin',[OrderController::class, 'order'])->name('order.admin');
