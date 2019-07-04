<?php
define('__ROOT__', $_SERVER['DOCUMENT_ROOT']); 
require_once __ROOT__.'/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::create(__ROOT__);
$dotenv->load();

use Illuminate\Database\Capsule\Manager as Capsule;

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

$connection = $capsule->getConnection();
$connection->beginTransaction();

$tables = $connection->select('SHOW TABLES');
$db_name = 'Tables_in_' . env('DATABASE');
foreach($tables as $table){
    $capsule->schema()->drop($table->$db_name);
    echo 'Table '.$table->$db_name.' Droped. <br>';
}

$capsule->schema()->create('test_methods', function ($table) {
    $table->increments('id');
    $table->string('name')->unique();
    $table->timestamps();
});

$capsule->schema()->create('test_template_info', function ($table) {
    $table->increments('id');
    $table->string('template_name')->unique();
    $table->string('question_quantity');
    $table->timestamps();
});

$capsule->schema()->create('test_template_question', function ($table) {
    $table->increments('id');
    $table->string('template_id');
    $table->string('question');
    $table->timestamps();
});

$capsule->schema()->create('organizations', function ($table) {
    $table->increments('id');
    $table->string('name')->unique();
    $table->string('tel')->unique();
    $table->string('email')->unique();
    $table->timestamps();
});

$capsule->schema()->create('test_question_info', function ($table) {
    $table->increments('id');
    $table->string('name');
    $table->string('info');
    $table->string('cover');
    $table->integer('method');
    $table->integer('organization');
    $table->integer('test_template_info_id');
    $table->timestamps();
});

$capsule->schema()->create('test_questions', function ($table) {
    $table->increments('id');
    $table->integer('test_question_info_id');
    $table->integer('test_template_question_id');
    $table->string('image');
    $table->timestamps();
});

$capsule->schema()->create('users', function ($table) {
    $table->increments('id');
    $table->string('username');
    $table->string('password');
    $table->string('email');
    $table->timestamps();
});

// Default value
$capsule->table('test_methods')->insert([
    'name' => '9-point hedonic scaling'
]);

echo "Migrate done";