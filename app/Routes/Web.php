<?php

namespace App\Routes;

use App\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index']);

Route::get('/test', function () {
    echo 'Hello World';
});

