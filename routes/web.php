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

// routes/web.php

Route::get('/cp', 'App\Http\Controllers\ProductController@create')->name('products.create');
Route::post('/', 'App\Http\Controllers\ProductController@store')->name('products.store');

Route::get('/products', 'App\Http\Controllers\ProductController@index')->name('products.index');




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/eml', 'App\Http\Controllers\EmailController@sendEmailForm')->name('send-email');
Route::post('/eml', 'App\Http\Controllers\EmailController@sendEmail'); // Add this line for the POST method

Route::post('/add-to-cart', 'App\Http\Controllers\CartController@addToCart')->middleware('web');

Route::get('/cart', 'App\Http\Controllers\CartController@viewCart');


Route::post('/update-cart', 'App\Http\Controllers\CartController@updateCart');


