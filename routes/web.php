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

Route::post('/login', [UserController::class,'login']);

Route::get('/', [ProductController::class,'index']);

Route::get('detail/{id}', [ProductController::class,'detail']);
//detail{id} - na osnovu id-a proizvoda otvaramo tu stranicu

Route::get('search', [ProductController::class,'search']);

Route::get('cartList', [ProductController::class,'cartList']);

Route::get('ordernow', [ProductController::class,'orderNow']);

Route::get('myorders', [ProductController::class,'myOrders']);

Route::view('/register', 'add');
Route::view('/edit', 'edit');
Route::view('/profile', 'profile');

// Route::put('update/{id}',[UserController::class,'update']);
// Route::put('edit',[UserController::class,'edit']);
// Route::post('/register', [UserController::class,'register']);

