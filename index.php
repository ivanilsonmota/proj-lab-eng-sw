<?php

require_once __DIR__ . "/vendor/autoload.php";

use CoffeeCode\Router\Router;

$router = new Router(URL_BASE);

/*
* Controllers
*/
$router->namespace("Source\App");

$router->group(null);
$router->get("/", "Web:home");
$router->get("/contato", "Web:contact");
$router->get("/pedidos", "Web:order");
$router->get("/concessionarias", "Web:dealership");

$router->group("ops");
$router->get("/{errcode}", "Web:error");

$router->dispatch();

if($router->error()){
    $router->redirect("/ops/{$router->error()}");
}


