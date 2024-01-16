<?php

namespace App\Routes;

use App\Controllers\HomeController;
use App\Controllers\CourseController;
use App\Configs\Database;

Route::get('/', [HomeController::class, 'index']);

Route::get('/cursos', [CourseController::class, 'index']);
Route::get('/curso/{id}', [CourseController::class, 'show']);
Route::get('/curso/criar', [CourseController::class, 'create']);
Route::post('/curso/store', [CourseController::class, 'store']);
Route::get('/curso/{id}/editar', [CourseController::class, 'edit']);
Route::put('/curso/{id}/update', [CourseController::class, 'update']);
Route::delete('/curso/{id}/delete', [CourseController::class, 'delete']);


Route::get('/connection-test', function () {
    $connection = Database::getConnection();
    $connection->query('SELECT 1');
    dd($connection);
});

