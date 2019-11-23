<?php

namespace Source\App;


use League\Plates\Engine;
use Source\Models\User;

class Web
{
    private $view;
    public function __construct()
    {
        $this->view = Engine::create(__DIR__ . "/../Views", "php");
    }

    public function home(): void
    {
        /* $users = (new User)->find()->fetch(true);
        var_dump($users); */
        echo $this->view->render("home", [
            "title" => "Home | " . SITE,
            "users" => "Ivanilson Pereira Mota"
        ]);
    }

    public function order(): void
    {
        echo $this->view->render("order", [
            "title" => "Contato " . SITE,
            "order" => ""
        ]);
    }

    public function contact(): void
    {

        echo $this->view->render("contact", [
            "title" => "Contato | " . SITE,
            "contact" => ""
        ]);
    }

    public function dealership(): void
    {
        echo $this->view->render("dealership", [
            "title" => "Concessionárias | " . SITE,
            "dealership" => ""
        ]);
    }

    public function error($data): void
    {
        echo $this->view->render("error", [
            "title" => "Error " . $data['errcode'],
            "error" => $data["errcode"]
        ]);
    }
}
