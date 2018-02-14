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

Auth::routes();
Route::get('/add_user', 'Auth\RegisterController@showRegistrationForm')->name('add_user');
Route::get('/user', 'User\UserListController@show')->name('user');

Route::get('/', 'HomeController@index')->name('home');
