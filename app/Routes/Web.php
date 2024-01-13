<?php

namespace App\Routes;

use App\Controllers\HomeController;
use App\Configs\Database;

Route::get('/', [HomeController::class, 'index']);


Route::get('/item/{id}', function ($id) {
    echo 'item' . $id;
});


Route::get('/conection-test', function () {
    $conection = Database::getConnection();
    $conection->query('SELECT 1');
    dd($conection);
});

