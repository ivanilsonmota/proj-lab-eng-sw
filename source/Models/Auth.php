<?php

namespace Source\Models;

use CoffeeCode\DataLayer\DataLayer;

class Auth extends DataLayer
{ 
    public function __construct() {
        parent::__construct("auth", ["email", "cpf", "pass"]);  
    }
}


/*

CREATE TABLE IF NOT EXISTS auth (
    id INT (11) AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(100) NOT NULL,
    cpf VARCHAR(15) NOT NULL,
    pass VARCHAR(255) NOT NULL
);

/*
