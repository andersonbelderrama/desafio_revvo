<?php

require_once __DIR__ . '/../vendor/autoload.php';

require_once __DIR__ . '/../app/Routes/Web.php';

use Dotenv\Dotenv;
use App\Routes\Route;

$dotenv = Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();

Route::run($_SERVER['REQUEST_URI']);


