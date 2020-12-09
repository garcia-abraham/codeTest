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
    return view('auth/login');
});

Auth::routes();

Route::post('login', 'AuthController@login')->name('login');
Route::get('logout', 'AuthController@logout')->name('logout');
Route::post('register', 'UserController@register')->name('register');

Route::middleware("auth")
    ->group(function () {
        //Products
Route::get('products','ProductController@index')->name('product.index');
Route::get('products/create','ProductController@create')->name('product.create');
Route::delete('products/{id}','ProductController@destroy')->name('product.destroy');
Route::get('products/{id}','ProductController@edit')->name('product.edit');
Route::put('products/{id}','ProductController@update')->name('product.update');
Route::post('products','ProductController@store')->name('product.store');

//ToSell
Route::get('toSell','ToSellController@index')->name('toSell.index');
Route::post("finishSell", "ToSellController@finishSell")->name("finishSell");
Route::post("productOfSell", "ToSellController@addProductToSell")->name("addProductToSell");
Route::delete("quitProduct", "ToSellController@quitProduct")->name("quitProduct");

//Sell
Route::get('sells','SellsController@index')->name('sells.index');
Route::get('sells/{id}','SellsController@ticket')->name('sells.ticket');
Route::get('Showsells/{id}','SellsController@show')->name('sells.show');
Route::delete('sells/{id}','SellsController@destroy')->name('sells.destroy');

//Users
Route::get("users", "UserController@index")->name('users.index');
Route::get("users/create", "UserController@create")->name('users.create');
Route::get("users/{id}", "UserController@edit")->name('users.edit');
Route::delete('users/{id}','UserController@destroy')->name('users.destroy');
Route::put('user/{id}','UserController@update')->name('user.update');
Route::post('users','UserController@store')->name('user.store');



//Clients
Route::get("clients", "ClientsController@index")->name('clients.index');
Route::get("clients/create", "ClientsController@create")->name('clients.create');
Route::post("clients", "ClientsController@store")->name('clients.store');
Route::get('clients/{id}','ClientsController@edit')->name('clients.edit');
Route::delete('clients/{id}','ClientsController@destroy')->name('clients.destroy');
Route::put('clients/{id}','ClientsController@update')->name('clients.update');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    });

