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
        echo $this->view->render("login", [
            "title" => "Login | " . SITE,
        ]);
    }

    public function error($data): void
    {
        echo $this->view->render("error", [
            "title" => "Erro " . $data['errcode'],
            "error" => $data["errcode"]
        ]);
    }
}
