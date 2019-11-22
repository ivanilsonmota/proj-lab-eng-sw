<?php

namespace Source\Models;

use CoffeeCode\DataLayer\DataLayer;

class Phone extends DataLayer {
    public function __construct() {
        parent::__construct("phones", ["cli_id", "phone", "type"]);
    }

    public function add()
    {
        # code...

        
    }
}