<?php 

session_start();
require __DIR__."/vendor/autoload.php";

define("VIEWPATH", __DIR__."/views/themes/");

use Source\Router;
site();
$router = new Router;

$router->get("/",  "Contact:contact");
$router->post('/contact', function(){

});

$router->notFound(function(){
    $title = "TITULO";
    require_once __DIR__."/views/themes/404.php";  
});

$router->run();


