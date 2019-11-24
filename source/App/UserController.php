<?php

namespace Source\App;

use Source\Models\User;

class UserController
{
    private $users;
    public function __construct()
    {
        $this->users = new User();

        header('Cache-Control: no-cache, must-revalidate');
        header('Content-Type: application/json; charset=utf-8');
    }

    public function getAll(): void
    {
        $users = ($this->users)->find()->fetch(true);
        if (($this->users)->find()->count() > 0) {
            $users_arr["data"] = array();

            foreach ($users as $user) {
                $userItem = array(
                    "id"         => $user->id,
                    "first_name" => $user->first_name,
                    "last_name"  => $user->last_name,
                    "email"      => $user->email
                );

                array_push($users_arr["data"], $userItem);
            }

            echo json_encode($users_arr);
        } else {
            echo json_encode(array("error_message" => "Não possui usuários cadastrados!"));
        }
    }

    public function getById($data)
    {
        $user = ($this->users)->findById($data["id"]);
        if (($this->users)->findById($data["id"])) {
            $user_arr["data"] = array();

            $userItem = array(
                "id"         => $user->id,
                "first_name" => $user->first_name,
                "last_name"  => $user->last_name,
                "email"      => $user->email
            );
            array_push($user_arr["data"], $userItem);

            echo json_encode($user_arr);
        } else {
            echo json_encode(array("error_message" => "O usuário informado não existe!"));
        }
    }

    public function create(): void
    {
        $json = file_get_contents("php://input");
        $json_content = json_decode($json);

        foreach ($json_content as $usr) {
            $user = $this->users;
            $user->first_name = $usr[0]->first_name;
            $user->last_name  = $usr[0]->last_name;
            $user->email      = $usr[0]->email;
            $user->pwd       =  md5($usr[0]->pwd);
            $userId = $user->save();

            if ($userId) {
                echo json_encode(array("success" => "Usuário registrado com sucesso!"));
            } else {
                echo json_encode(array("error_message" => "Não foi possível cadastrar o usuário!"));
            }
        }
    }

    public function update($data): void
    {
        $json = file_get_contents("php://input");
        $json_content = json_decode($json);

        foreach ($json_content as $usr) {
            $user = ($this->users)->findById($data["id"]);
            $user->first_name = $usr[0]->first_name;
            $user->last_name  = $usr[0]->last_name;
            $user->email      = $usr[0]->email;
            $user->pwd       =  md5($usr[0]->pwd);
        }

        $userId = $user->save();
        if ($userId) {
            echo json_encode(array("success" => "Usuário atualizado com sucesso!"));
        } else {
            echo json_encode(array("error_message" => "Não foi possível atualizar o usuário!"));
        }
    }


    public function delete($data): void
    {
        $user = ($this->users)->findById($data["id"]);
        if ($user->destroy()) {
            echo json_encode(array("success" => "Usuário excluído com sucesso!"));
        } else {
            echo json_encode(array("error_message" => "Não foi possível excluir o usuário!"));
        }
    }

    /*     public function getByEmail($data){
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
    } */
}
