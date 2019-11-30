<?php

require_once __DIR__ . "/vendor/autoload.php";

use CoffeeCode\Router\Router;
use CoffeeCode\DataLayer\Connect;
use Source\Support\Email;


// Open instance connection database;
$conn = Connect::getInstance();
$error = Connect::getError();

if ($error) {
    echo $error->getMessage();
    die();
}

// Create routers
$router = new Router(URL_BASE);

$router->namespace("Source\App");

$router->group(null);
$router->get("/", "WebController:home");
$router->get("/contato", "WebController:contact");
$router->get("/pedidos", "WebController:order");
$router->get("/concessionarias", "WebController:dealership");
$router->get("/login", "WebController:login");
$router->post("/login", "WebController:login");
$router->get("/logout", "WebController:logout");

//API Usuários
$router->get("/api/v1/usuarios", "UserController:getAll");
$router->get("/api/v1/usuarios/{id}", "UserController:getById");
$router->post("/api/v1/usuarios", "UserController:create");
$router->put("/api/v1/usuarios/{id}", "UserController:update");
$router->delete("/api/v1/usuarios/{id}", "UserController:delete");


// Error pages control
$router->group("ops");
$router->get("/{errcode}", "WebController:error");

// Routes manager
$router->dispatch();

if ($router->error()) {
    $router->redirect("/ops/{$router->error()}");
}
<<<<<<< HEAD


// Send emails
$email = new Email();

$email->add(
    "Olá, Mundo! Esse é meu segundo e-mail",
    "<h1>Segundo e-mail!</h1>",
    "Ivanilson Pereira Mota",
    "ivanilsonmota@outlook.com"
);

if(!$email->error()){
    var_dump(true);
}else{
    echo $email->error()->getMessage();
}
=======
>>>>>>> 331ff6d45e1d867b09d209e5219a2323131ccc5d
