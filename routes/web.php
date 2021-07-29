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



Auth::routes();

Route::get('/', function () {
    return redirect('/home');
});
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/favorites', 'ShopController@favorites')->name('shops.favorites');

Route::get('/like/{shop_id}', 'LikeController@like')->name('like.save');
Route::get('/dislike/{shop_id}', 'LikeController@dislike')->name('like.delete');

Route::get('/exclude/{shop_id}', 'ExcludedController@excludeShop')->name('exclude.save');
