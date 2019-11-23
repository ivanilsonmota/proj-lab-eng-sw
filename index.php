<?php

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

$router->get("/api/v1/usuarios", "UserController:getAll");
$router->post("/api/v1/usuarios", function () {
    echo json_encode(array("Status" => "OK"));
});


$router->group("ops");
$router->get("/{errcode}", "WebController:error");

$router->dispatch();

if ($router->error()) {
    $router->redirect("/ops/{$router->error()}");
}
