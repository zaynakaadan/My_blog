<?php

use Router\Router;
use App\Exceptions\NotFoundException;

require '../vendor/autoload.php';

// read .env
//$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv = Dotenv\Dotenv::createUnsafeImmutable(__DIR__);
$dotenv->load();

define('VIEWS', dirname(__DIR__) . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR);
define('SCRIPTS', dirname($_SERVER ['SCRIPT_NAME']) . DIRECTORY_SEPARATOR);
define('DB_NAME', getenv("DB_NAME"));
define('DB_HOST', '127.0.0.1');
define('DB_USER', getenv("DB_USER"));
define('DB_PWD', getenv("DB_PWD"));

$router = new Router($_SERVER ['REDIRECT_URL']);
$router->show();

$router->get( '/', 'App\Controllers\BlogController@home');
$router->get( '/posts', 'App\Controllers\BlogController@posts');
$router->get( '/posts/:id', 'App\Controllers\BlogController@showPost');
//$router->get( '/contact', 'App\Controllers\ContactController@contact');
$router->post( '/contact', 'App\Controllers\ContactController@contactPost');


$router->post( '/posts/:id', 'App\Controllers\CommentController@createcomment');
$router->get( '/tags/:id', 'App\Controllers\BlogController@tag');
$router->get( '/comments/:id', 'App\Controllers\BlogController@comment');

$router->get('/register', 'App\Controllers\UserController@register');
$router->post('/register', 'App\Controllers\UserController@registerPost');
$router->get('/login', 'App\Controllers\UserController@login');
$router->post('/login', 'App\Controllers\UserController@loginPost');
$router->get('/logout', 'App\Controllers\UserController@logout');

$router->get( '/admin/posts', 'App\Controllers\Admin\PostController@admin_posts', 'admin');
$router->get( '/admin/posts/create', 'App\Controllers\Admin\PostController@create');
$router->post( '/admin/posts/create', 'App\Controllers\Admin\PostController@createPost');
$router->post( '/admin/posts/delete/:id', 'App\Controllers\Admin\PostController@destroy');
$router->get( '/admin/posts/edit/:id', 'App\Controllers\Admin\PostController@edit');
$router->post( '/admin/posts/edit/:id', 'App\Controllers\Admin\PostController@update');

try {    
    $router->run();
} catch (NotFoundException $e) {
    return $e->error404();
}