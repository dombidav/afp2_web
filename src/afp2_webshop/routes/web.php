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

Route::get('/', 'StaticController@showHome');
Route::get('/contact/', 'StaticController@showContact');
Route::get('/about/', 'StaticController@showAbout');
/*
 * GET - "Kérem" > könyv adatai
 * POST - "Adom" > új könyv
 * PUT - "Átírom" > módosítom
 * DELETE - "Törlöm"
 */

Route::get('/shop', 'BookController@index');
Route::get('/shop/{id}', 'BookController@show');

Route::get('/cart', 'CartController@index');
Route::get('/cart/{id}', 'CartController@show');
Route::get('/cart/add/{id}', 'CartController@add');
Route::get('/cart/add/{book_id}/{user_id}', 'CartController@add2');
Route::get('/cart/remove/{id}', 'CartController@remove');
Route::get('/cart/remove/{book_id}/{user_id}', 'CartController@remove2');
Route::get('/cart/edit/{book_id}/{quantity}', 'CartController@edit');
Route::get('/cart/edit/{book_id}/{quantity}/{user_id}', 'CartController@edit2');

Route::get('/author', 'AuthorController@index');
Route::get('/author/{id}', 'AuthorController@show');

Route::get('/publisher', 'publisherController@index');
Route::get('/publisher/{id}', 'publisherController@show');

Route::get('/genre', 'publisherController@index');
Route::get('/genre/{id}', 'publisherController@show');

Auth::routes();
Route::get('/profile', 'ProfileController@show');
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
