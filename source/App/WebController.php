<?php

namespace Source\App;


use League\Plates\Engine;
use Source\Models\User;
use Source\Support\Order;

class WebController
{
    private $view;
    private $err;
    private $users;
    private $userSession;
    public function __construct()
    {
        $this->users = new User();
        $this->view = Engine::create(__DIR__ . "/../Views", "php");

        # Start session
        session_start();
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
        if (isset($_POST["email"]) && isset($_POST["pass"])) {
            if (!empty($_POST["email"]) && !empty("pass")) {
                $email = $_POST["email"];
                $pwd = $_POST["pass"];

                $user = ($this->users)->find("email = :mail", "mail={$email}");
                if ($user->count() > 0) {
                    $usr = $user->fetch();
                    if (($usr->email == $email) && ($usr->pwd == md5($pwd))) {
                        $_SESSION["login"] = array(
                            "user" => $usr->first_name,
                            "email" => $usr->email
                        );
                        header("Location: " . url(""));
                    } else {
                        $this->err = "E-mail e/ou senha inválido!";
                    }
                } else {
                    $this->err = "E-mail não encontrado!";
                }
            } else {
                $this->err = "Informe o e-mail e a senha!";
            }
        }

        echo $this->view->render("login", [
            "title" => "Login | " . SITE,
            "err" => $this->err
        ]);
    }

    public function logout(): void
    {
        header("Location: " . url(""));
        session_destroy();
    }

    public function error($data): void
    {
        echo $this->view->render("error", [
            "title" => "Erro " . $data['errcode'],
            "error" => $data["errcode"]
        ]);
    }
}
