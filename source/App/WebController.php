<?php

namespace Source\App;


use League\Plates\Engine;
use Source\Support\Order;

class WebController
{
    private $view;
    public function __construct()
    {
        $this->view = Engine::create(__DIR__ . "/../Views", "php");

        header('Cache-Control: no-cache, must-revalidate');
        header('Content-Type: application/json; charset=utf-8');
    }

    public function home(): void
    {
        echo $this->view->render("home", [
            "title" => "Home | " . SITE,
            "users" => "Ivanilson Pereira Mota"
        ]);
    }

    public function order(): void
    {
        $orders = new Order();
        echo $this->view->render("order", [
            "title" => "Pedidos | " . SITE,
            "orders" => $orders
        ]);
    }

    public function contact(): void
    {

        echo $this->view->render("contact", [
            "title" => "Contato | " . SITE,
        ]);
    }

    public function dealership(): void
    {
        echo $this->view->render("dealership", [
            "title" => "Concessionárias | " . SITE,
        ]);
    }

    public function login(): void
    {
        echo "<h1>Login</h1>";
    }

    public function error($data): void
    {
        echo $this->view->render("error", [
            "title" => "Erro " . $data['errcode'],
            "error" => $data["errcode"]
        ]);
    }
}
