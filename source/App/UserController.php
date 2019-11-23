<?php

namespace Source\App;

use Source\Models\User;

class UserController
{
    private $users;
    public function __construct()
    {
        $this->users = new User();
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
        }else{
            echo json_encode(array(
                "error_message" => "Não possui usuários cadastrados!"
            ));
        }
    }
}
