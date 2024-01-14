<?php

namespace App\Routes;

use App\Controllers\HomeController;
use App\Configs\Database;

Route::get('/', [HomeController::class, 'index']);


Route::get('/item/{id}', function ($id) {
    echo 'item' . $id;
});


Route::get('/connection-test', function () {
    $connection = Database::getConnection();
    $connection->query('SELECT 1');
    dd($connection);
});

