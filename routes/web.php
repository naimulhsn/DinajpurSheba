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
Route::resource('products','ProductController');
Route::resource('profile','ProfileController')->only([
    'show', 'edit', 'update'
]);
Route::resource('orders','OrdersController');
Route::get('/order/{product}/{quantity}', 'OrdersController@order')->name('order')->middleware('auth');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
