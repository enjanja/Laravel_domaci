<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;

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

Route::get('/login', function () {
    return view('login');
});
Route::get('/logout', function () {
    Session::forget('user');
    return redirect('login');
});

Route::get('/profile', function () {
    return view('profile');
});


Route::post('/login', [UserController::class,'login']);
Route::get('/', [ProductController::class,'index']);
Route::get('detail/{id}', [ProductController::class,'detail']);//ruta za prikaz detalja proizvoda
//detail{id} - na osnovu id-a proizvoda otvaramo tu stranicu
Route::get('search', [ProductController::class,'search']);
// Route::post('add_to_cart', [ProductController::class,'addToCart']);
Route::get('cartList', [ProductController::class,'cartList']);
// Route::get('remove_from_cart/{id}', [ProductController::class,'removeFromCart']);
Route::get('ordernow', [ProductController::class,'orderNow']);
// Route::post('order_place', [ProductController::class,'orderPlace']);
Route::get('myorders', [ProductController::class,'myOrders']);
Route::view('/register', 'add');
Route::view('/edit', 'edit');
Route::view('/profile', 'profile');
// Route::put('edit',[UserController::class,'edit']);
// Route::post('/register', [UserController::class,'register']);

