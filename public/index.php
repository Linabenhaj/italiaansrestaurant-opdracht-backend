<?php

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

<<<<<<< HEAD
=======
// Determine if the application is in maintenance mode...
>>>>>>> ad08dcc (Initial Laravel 12 project setup)
if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
    require $maintenance;
}

<<<<<<< HEAD
require __DIR__.'/../vendor/autoload.php';

=======
// Register the Composer autoloader...
require __DIR__.'/../vendor/autoload.php';

// Bootstrap Laravel and handle the request...
>>>>>>> ad08dcc (Initial Laravel 12 project setup)
/** @var Application $app */
$app = require_once __DIR__.'/../bootstrap/app.php';

$app->handleRequest(Request::capture());
