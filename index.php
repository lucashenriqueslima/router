<?php 
ob_start();
session_start();
require __DIR__."/vendor/autoload.php";
use Source\Router;


$router = new Router;

$router->get('/router/', function(){
    echo 'HOME';
});

$router->get('/router/test', function(){
    echo 'TESTE';
});

$router->run();
