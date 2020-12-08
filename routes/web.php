<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::post('login', 'AuthController@login')->name('login');
Route::get('logout', 'AuthController@logout')->name('logout');
Route::post('register', 'UserController@register')->name('register');

//Products
Route::get('products','ProductController@index')->name('product.index');
Route::get('products/create','ProductController@create')->name('product.create');
Route::post('products','ProductController@store')->name('product.store');

//Sell
Route::get('toSell','ToSellController@index')->name('toSell.index');
Route::get('sells','SellsController@index')->name('sells.index');
Route::post("finishSell", "ToSellController@finishSell")->name("finishSell");
Route::post("productOfSell", "ToSellController@addProductToSell")->name("addProductToSell");

//Users
Route::get("users", "UserController@index")->name('users.index');
Route::get("users/create", "UserController@create")->name('users.create');
Route::put("users/edit", "UserController@edit")->name('users.edit');
Route::delete("users/destroy", "UserController@destroy")->name('users.destroy');

//Clients
Route::get("clients", "ClientsController@index")->name('clients.index');
Route::get("clients/create", "ClientsController@create")->name('clients.create');












Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
