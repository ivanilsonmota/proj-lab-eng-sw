<?php

namespace Source\App;

class Client {
    public function __construct()
    {
        
    }

    public function home($data)
    {
        var_dump($data);

        $url = URL_BASE;

        require __DIR__."/../Views/client.php";

    }

    public function add($data)
    {   
        var_dump($data);    
        echo "<h1>Cliente {$data["id"]}</h1>";

    }
}