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
Route::get('/', 'SiteController@index')->name('site.index')->middleware('auth');

Route::get('/cabinet', 'CabinetController@index')->name('cabinet.index')->middleware('auth');

Route::put('/cabinet/save-user/{user}', 'CabinetController@saveUser')->name('cabinet.saveUser')->middleware('auth');

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

