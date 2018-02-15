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

// Login Routes
Auth::routes();

Route::middleware(['auth'])->group(function () {
    //User Routes
    Route::get('/add_user', 'Auth\RegisterController@showRegistrationForm')->name('add_user');
    Route::get('/user', 'User\UserListController@show')->name('user');
    // Default Home
    Route::get('/', 'HomeController@index')->name('home');
    // Categories Route
    Route::resource('categories', CategoriesController::class);
    Route::get('/add_categories', 'CategoriesController@addCategories')->name('add_categories');
    Route::post('/delete_categories/{categories}', 'CategoriesController@delete')->name('categories.delete');
});
