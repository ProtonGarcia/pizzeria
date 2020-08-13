<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


*/

#usuarios
Route::resource('usuarios', 'User\UserController', ['except' => ['create', 'edit']]);

#clientes
Route::resource('clientes', 'Client\ClientController', ['only' => ['index', 'show']]);
Route::resource('clientestop', 'Client\ClientTopController', ['only' => ['index']]);
Route::resource('clientes.orders', 'Client\ClientOrderController', ['only' => ['index']]);
Route::resource('clientes.products', 'Client\ClientProductController', ['only' => ['index']]);

#restaurantes
Route::resource('restaurantes', 'Restaurant\RestaurantController', ['only' => ['index', 'show']]);

#productos
Route::resource('products', 'Product\ProductController', ['only' => ['index', 'show']]);
Route::resource('productstop', 'Product\ProductTopController', ['only' => ['index']]);
Route::resource('products.clientes.orders', 'Product\ProductClientOrderController', ['only' => ['store']]);

#ordenes
Route::resource('orders', 'Order\OrderController', ['only' => ['index', 'show']]);
