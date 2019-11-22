<?php

require_once __DIR__ . "/vendor/autoload.php";

use CoffeeCode\Router\Router;
use Source\Support\Client;
use Source\Support\Order;

$router = new Router(URL_BASE);

/*
* Controllers
*/
$router->namespace("Source\App");

/*
* WEB
* home
*/
$router->group(null);
$router->get("/", "Web:home");

/*
* WEB
* contact
*/
$router->group("contato");
$router->get("/", "Web:contact");

/*
* Login
* home
*/
$router->group("api");
$router->get("/v1/login", function($data){
    echo "<h1>Login</h1>";
});



$router->group("ops");
$router->get("/{errcode}", "Web:error");




$router->dispatch();

if($router->error()){
    $router->redirect("/ops/{$router->error()}");
}


