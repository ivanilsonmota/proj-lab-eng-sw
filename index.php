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



   public function getByEmail($data){
        if (($this->users)->find($data["id"])->count() > 0) {
            $user_arr["data"] = array();
            $user = ($this->users)->find($data["id"])->fetch();
            $userItem = array(
                "id"         => $user->id,
                "first_name" => $user->first_name,
                "last_name"  => $user->last_name,
                "email"      => $user->email
            );
            array_push($user_arr["data"], $userItem);

            echo json_encode($user_arr);
        } else {
            echo json_encode(array("error_message" => "Não existe usuário cadastrado com o email {$data["email"]}"));
        }
    } 

