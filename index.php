<?php

session_start();

require_once __DIR__ . "/vendor/autoload.php";

use CoffeeCode\Router\Router;
use CoffeeCode\DataLayer\Connect;

$conn = Connect::getInstance();
$error = Connect::getError();

if ($error) {
    echo $error->getMessage();
    die();
}

$router = new Router(URL_BASE);

/*
* Controllers
*/
$router->namespace("Source\App");

$router->group(null);
$router->get("/", "WebController:home");

$router->get("/contato", "WebController:contact");

$router->get("/pedidos", "WebController:order");

$router->get("/concessionarias", "WebController:dealership");

$router->get("/login", "WebController:login");

//API Usuários
$router->get("/api/v1/usuarios", "UserController:getAll");
$router->get("/api/v1/usuarios/{id}", "UserController:getById");
$router->post("/api/v1/usuarios", "UserController:create");
$router->put("/api/v1/usuarios/{id}", "UserController:update");
$router->delete("/api/v1/usuarios/{id}", "UserController:delete");



$router->group("ops");
$router->get("/{errcode}", "WebController:error");

$router->dispatch();

if ($router->error()) {
    $router->redirect("/ops/{$router->error()}");
}