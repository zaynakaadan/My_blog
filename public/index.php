<?php

use Router\Router;

require '../vendor/autoload.php';

define('VIEWS', dirname(__DIR__) . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR);
define('SCRIPTS' , dirname($_SERVER['SCRIPT_NAME']) . DIRECTORY_SEPARATOR);
define('DB_NAME', 'projet5');
define('DB_HOST', '127.0.0.1');
define('DB_USER', 'root');
define('DB_PWD', '');

$router = new Router($_SERVER['REQUEST_URI']);
$router->show();

$router->get( '/', 'App\Controllers\BlogController@welcome');
$router->get( '/posts', 'App\Controllers\BlogController@index');
$router->get( '/posts/:id', 'App\Controllers\BlogController@show');

$router->run();