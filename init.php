<?php
require_once 'vendor/autoload.php';
$dotenv = new Dotenv\Dotenv(__DIR__);
$dotenv->load();

function getDb (){
	return new Medoo\Medoo([
	  'database_type' => getenv('DB_TYPE'),
	  'database_name' => getenv('DB_NAME'),
	  'server' => getenv('DB_HOST'),
	  'username' => getenv('DB_USERNAME'),
	  'password' => getenv('DB_PASS')
	]);
};