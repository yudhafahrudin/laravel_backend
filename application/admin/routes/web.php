<?php


// Login Routes
Auth::routes();

Route::middleware(['auth'])->group(function () {

    // Default Home
    Route::get('/', 'HomeController@index')->name('home');

    //User Routes
    Route::prefix('users')->group(function () {
        Route::namespace('User')->group(function () {
            Route::get('/', 'UserListController@show')->name('show.user');
            Route::get('/trash/all', 'UserTrashController@show')->name('show.trash.user');
            Route::get('/show/{id}', 'UserController@showDetailUser')->name('show.user.detail');
            Route::get('/edit/{id}', 'UserController@showEdit')->name('show.edit.user');
            Route::post('/{id}/delete', 'UserController@delete')->name('delete.user');
            Route::get('/{id}/restore', 'UserTrashController@restore')->name('restore.user');
            Route::put('/{id}/edit', 'UserController@edit')->name('edit.user');
            Route::delete('/{id}/destroy', 'UserTrashController@destroy')->name('destroy.user');
            Route::get('/profile/{username}', 'UserController@showProfileUser')->name('user.profile');
        });
        Route::get('/add', 'Auth\RegisterController@showRegistrationForm')->name('add_user');
    });

    // Categories Routes
    Route::resource('categories', CategoriesController::class);
    Route::get('/add_categories', 'CategoriesController@addCategories')->name('add_categories');
    Route::post('/delete_categories/{categories}', 'CategoriesController@delete')->name('categories.delete');


    //Logs Routes
    Route::prefix('logs')->group(function () {
        Route::get('/created', 'LogsController@logCreated')->name('logs.created');
        Route::get('/restored', 'LogsController@logRestored')->name('logs.restored');
        Route::get('/updated', 'LogsController@logUpdated')->name('logs.updated');
        Route::get('/deleted', 'LogsController@logDeleted')->name('logs.deleted');
        Route::get('/created/show/{id}', 'LogsController@showDetailLogsCreated')->name('logs.detail.created');
        Route::get('/restored/show/{id}', 'LogsController@showDetailLogsRestored')->name('logs.detail.restored');
        Route::get('/updated/show/{id}/{type}/', 'LogsController@showDetailLogs')->name('logs.detail.updated');
        Route::get('/deleted/show/{id}', 'LogsController@showDetailLogsDeleted')->name('logs.detail.deleted');
    });
    //Testing
    Route::get('/test/mkdir', 'AdvancedCoding\colectionController@mkdir');

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
Breadcrumbs::register('user.add', function ($breadcrumbs) {
    $breadcrumbs->parent('user');
    $breadcrumbs->push('user add', route('add_user'));
});

Breadcrumbs::register('user.profile', function ($breadcrumbs, $user) {
    $breadcrumbs->parent('user');
    $breadcrumbs->push($user->username, route('user.profile', $user->username));
});
