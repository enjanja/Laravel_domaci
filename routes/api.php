<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get('user', 'UserController@user');//vraca sve usere
// Route::get('user/{id}', 'UserController@userByID');//vraca usera sa id-em
// Route::post('user','UserController@saveUser');//ovde se cuvaju u postmanu, al meni ne radi
// // Route::put('user/{user}','UserController@updateUser');//u postmanu se vrse izmene preko put naredbe
// Route::put('user/{id}','UserController@updateUser');
// // Route::delete('user/{user}','UserController@deleteUser');//u postmanu proverimo dal brise iz baze
// Route::delete('user/{id}','UserController@deleteUser');


// Route::get('list/{id?}',[ProductController::class,'list']);
// Route::get('searchProd/{name}',[ProductController::class,'searchProd']);

//dodaje proizvode u cart-a
Route::post('add_to_cart', [ProductController::class,'addToCart']);//post - RADI

//brise proizvode iz cart-a
Route::delete('remove_from_cart/{id}', [ProductController::class,'removeFromCart']);//delete - RADI

//dodaje proizvode u myOrders
Route::post('order_place', [ProductController::class,'orderPlace']);//post - RADI

//dodaje usera u users tabelu
Route::post('add',[UserController::class,'add']);//post - RADI

//
Route::put('update/{id}',[UserController::class,'update']);

//brise usera
Route::delete('delete/{id}',[UserController::class,'delete']);//delete - RADI