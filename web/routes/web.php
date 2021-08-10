<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Middleware\Admin;

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

Route::match(['post', 'get'], '/admin/{id?}', 'AdminController@index')->middleware(Admin::class);
Route::match(['post', 'get'], '/admin/{id?}/{subid}', 'AdminController@subIndex')->middleware(Admin::class);

Route::match(['post', 'get'], '/', 'ShopController@index');
Route::match(['post', 'get'], '/{id}', 'ShopController@subindex');
Route::match(['post', 'get'], '/{id}/{subid}', 'ShopController@subsubindex');
