<?php

namespace Source\App;

class Web 
{
    public function __construct()
    {
        //Tudo que precisa ser inicializado na aplicação.
    }

    public function home($data){
        echo "<h1>Teste Home<h1>";
        var_dump($data);
    }

    public function contact($data){
        echo "<h1>Teste Contato<h1>";
        var_dump($data);
    }

    public function error($data){
        echo "<h1>Erro {$data["errcode"]}</h1>";
        var_dump($data);
    }
}