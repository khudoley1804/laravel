<?php

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
Route::middleware('auth')->resource('news','NewsController');

Route::middleware('active')->resource('user','UserController');

Route::middleware('visits')->resource('user','UserController');

Auth::routes();

Route::get('/user', 'UserController@index')->name('user');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home/add-visits', 'HomeController@addVisits')->name('home.add-visits');
