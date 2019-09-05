<?php

session_start();

if (!isset($_SESSION["error"])) {
    $_SESSION["error"] = [];
}
if (!isset($_SESSION["success"])) {
    $_SESSION["success"] = [];
}
if (!defined('__ROOT__')) {
    define('__ROOT__', $_SERVER['DOCUMENT_ROOT']); 
}
if (!defined('__HOST__')) {
    define('__HOST__', 'http://'.$_SERVER['HTTP_HOST']); 
}
// autoload
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
