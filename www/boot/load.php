<?php

session_start();
// autoload
if (!defined('__ROOT__')) {
    define('__ROOT__', $_SERVER['DOCUMENT_ROOT']); 
}
require_once __ROOT__.'/vendor/autoload.php';
// end-autoload

// DB connect
use Illuminate\Database\Capsule\Manager as Capsule;
use Dotenv\Dotenv;

$dotenv = Dotenv::create(__ROOT__);
$dotenv->load();
$capsule = new Capsule;
$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => getenv('HOST'),
    'database'  => getenv('DATABASE'),
    'username'  => getenv('USER'),
    'password'  => getenv('PASSWORD'),
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);

$capsule->setAsGlobal();
$capsule->bootEloquent();