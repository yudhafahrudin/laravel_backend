<?php

/**
 * Laravel - A PHP Framework For Web Artisans
 *
 * @package  Laravel
 * @author   Taylor Otwell <taylor@laravel.com>
 */
define('LARAVEL_START', microtime(true));

/*
  |--------------------------------------------------------------------------
  | Register The Auto Loader
  |--------------------------------------------------------------------------
  |
 */

require __DIR__ . '/../application/admin/vendor/autoload.php';

/*
  |--------------------------------------------------------------------------
  | Turn On The Lights
  |--------------------------------------------------------------------------
  |
 */

$app = require_once __DIR__ . '/../application/admin/bootstrap/app.php';

/*
  |--------------------------------------------------------------------------
  | Run The Application
  |--------------------------------------------------------------------------
  |
 */
//
//$app->bind('path.public', function() {
//    return __DIR__;
//});

$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$response = $kernel->handle(
        $request = Illuminate\Http\Request::capture()
);

$response->send();

$kernel->terminate($request, $response);
