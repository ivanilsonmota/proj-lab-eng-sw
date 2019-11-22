<?php

namespace Source\Models;

use CoffeeCode\DataLayer\DataLayer;

class Client extends DataLayer {
    public function __construct()
    {
        parent::__construct("clients", ["name", "addr", "addr_nbhd", "addr_city", "addr_zip_code", "cpf", "cnpj", "user", "pass"]);
    }
}