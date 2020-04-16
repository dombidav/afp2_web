<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', 'StaticController@showHome')->name('main');
Route::get('/contact', 'StaticController@showContact')->name('contact');
Route::get('/about', 'StaticController@showAbout')->name('about');

Route::get('/shop', 'BookController@index')->name('shop');
Route::post('/shop', 'BookController@search')->name('shop.search');
Route::get('/shop/{id}', 'BookController@show')->name('shop.get');

Route::get('/cart', 'CartController@index')->name('cart');
Route::get('/cart/{id}', 'CartController@show')->name('cart-id');
Route::get('/cart/add/{id}', 'CartController@add')->name('cart.add');
Route::get('/cart/add/{book_id}/{user_id}', 'CartController@add2')->name('cart.add-user');
Route::get('/cart/remove/{id}', 'CartController@remove')->name('cart.remove');
Route::get('/cart/remove/{book_id}/{user_id}', 'CartController@remove2')->name('cart.remove-user');
Route::get('/cart/edit/{book_id}/{quantity}', 'CartController@edit')->name('cart.edit');
Route::get('/cart/edit/{book_id}/{quantity}/{user_id}', 'CartController@edit2')->name('cart.edit-user');

Route::get('order', 'OrderController@index')->name('orders');

Route::get('/author', 'AuthorController@index')->name('author');
Route::get('/author/{id}', 'AuthorController@show')->name('author.get');

Route::get('/publisher', 'publisherController@index')->name('publisher');
Route::get('/publisher/{id}', 'publisherController@show')->name('publisher.get');

Route::get('/genre', 'publisherController@index')->name('genre');
Route::get('/genre/{id}', 'publisherController@show')->name('genre.get');

Auth::routes();
Route::get('/profile', 'ProfileController@show')->name('profile');
Route::get('/signout', '\App\Http\Controllers\Auth\LoginController@logout')->name('signout');

