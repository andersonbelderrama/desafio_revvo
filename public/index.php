<?php

require_once __DIR__ . '/../vendor/autoload.php';

require_once __DIR__ . '/../app/Routes/Web.php';

use App\Routes\Route;

Route::dispatch($_SERVER['REQUEST_URI']);