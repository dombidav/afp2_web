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
    //return json_encode(["hello", "asd"]);
});

/*
 * GET - "Kérem" > könyv adatai
 * POST - "Adom" > új könyv
 * PUT - "Átírom" > módosítom
 * DELETE - "Törlöm"
 */

Route::get('/shop', function (){
    return view('shop_page', ['asdasd' => App\Book::all()]);
});

Route::get('/shop/{id}', function ($id){
    return view('item_page', ['param' => '<script> alert("hello");</script>']);
});

Route::get('/cart', 'CartController@show');

Route::get('/cart/add/{id}', 'CartController@add');

Route::get('/cart/delete/{id}', 'CartController@delete');

//Route::get('/cart/edit/{id}', 'CartController@delete');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
