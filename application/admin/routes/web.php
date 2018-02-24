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

    // Default Home
    Route::get('/', 'HomeController@index')->name('home');
    //User Routes
    Route::get('/user/profile/{username}', 'User\UserController@showProfileUser')->name('user.profile');
    Route::get('/user/add', 'Auth\RegisterController@showRegistrationForm')->name('add_user');
    Route::get('/user', 'User\UserListController@show')->name('show.user');
    Route::get('/user/trash/all', 'User\UserTrashController@show')->name('show.trash.user');
    Route::get('/user/show/{id}', 'User\UserController@showDetailUser')->name('show.user.detail');
    Route::get('/user/edit/{id}', 'User\UserController@showEdit')->name('show.edit.user');
    Route::post('/user/{id}/delete', 'User\UserController@delete')->name('delete.user');
    Route::get('/user/{id}/restore', 'User\UserTrashController@restore')->name('restore.user');
    Route::put('/user/{id}/edit', 'User\UserController@edit')->name('edit.user');
    Route::delete('/user/{id}/destroy', 'User\UserTrashController@destroy')->name('destroy.user');
    // Categories Routes
    Route::resource('categories', CategoriesController::class);
    Route::get('/add_categories', 'CategoriesController@addCategories')->name('add_categories');
    Route::post('/delete_categories/{categories}', 'CategoriesController@delete')->name('categories.delete');
    // Products Routes
    Route::resource('products', ProductsController::class);
    //Logs Routes
    Route::get('/logs/created', 'LogsController@logCreated')->name('logs.created');
    Route::get('/logs/restored', 'LogsController@logRestored')->name('logs.restored');
    Route::get('/logs/updated', 'LogsController@logUpdated')->name('logs.updated');
    Route::get('/logs/deleted', 'LogsController@logDeleted')->name('logs.deleted');
    Route::get('/logs/created/show/{id}', 'LogsController@showDetailLogsCreated')->name('logs.detail.created');
    Route::get('/logs/restored/show/{id}', 'LogsController@showDetailLogsRestored')->name('logs.detail.restored');
    Route::get('/logs/updated/show/{id}/{type}/', 'LogsController@showDetailLogs')->name('logs.detail.updated');
    Route::get('/logs/deleted/show/{id}', 'LogsController@showDetailLogsDeleted')->name('logs.detail.deleted');

    //Direct image route
    Route::get('images/profile/{username}/{date}/{id}/{type}/{file}', function($username, $date, $id, $type, $file) {
        // Check if file exists in app/storage/file folder
        $file_path = 'storage/user/images/profile/' . $username . '/' . $date . '/' . $id . '/' . $type . '/' . $file;
        // Return response(url($file_path), 200)->header('Content-Type', 'text/plain');
        return Image::make($file_path)->response();
    });
});

//Breadcrumbs side
Breadcrumbs::register('home', function ($breadcrumbs) {
    $breadcrumbs->push('home', route('home'));
});

Breadcrumbs::register('user', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('user', route('show.user'));
});

Breadcrumbs::register('user.profile', function ($breadcrumbs, $user) {
    $breadcrumbs->parent('user');
    $breadcrumbs->push($user->username, route('user.profile', $user->username));
});
