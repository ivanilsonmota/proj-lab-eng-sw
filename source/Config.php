<?php

define("URL_BASE", "http://127.0.0.1/proj-lab-eng-sw");
<<<<<<< HEAD
=======
define("ASSETS_DIR", "/source/Views/");
>>>>>>> 331ff6d45e1d867b09d209e5219a2323131ccc5d

define("URL_AUTOMAKER", "");
define("URL_DEALERSHIP", "");

define("SITE", "VEÍCULOS");

define("DATA_LAYER_CONFIG", [
    "driver"   => "mysql",
    "host"     => "127.0.0.1",
    "port"     => "3306",
    "dbname"   => "proj_lab_eng_sw",
    "username" => "root",
<<<<<<< HEAD
    "passwd"   => "",
    "options"  => [
=======
    "passwd" => "", 
    "options" => [
>>>>>>> 331ff6d45e1d867b09d209e5219a2323131ccc5d
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        PDO::ATTR_CASE => PDO::CASE_NATURAL
    ]
]);

define("CONF_SMTP_MAIL_A", [
    "host"       => "smtp.sendgrid.net",
    "port"       => "587",
    "username"   => "apikey",
    "passwd"     => "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",
    "from_name"  => "Ivanilson Pereira Mota",
    "from_email" => "ivanilsonmota@gmail.com"
]);

define("CONF_SMTP_MAIL", [
    "host"       => "smtp.gmail.com",
    "port"       => "587",
    "username"   => "ivanilsonmota@gmail.com",
    "passwd"     => "metalcore*andhc25",
    "from_name"  => "Marcio Silva",
    "from_email" => "marcio.silva@sangincio.com"
]);

<<<<<<< HEAD
/** Helper function */
=======
>>>>>>> 331ff6d45e1d867b09d209e5219a2323131ccc5d
function url(string $uri = null): string
{
    if ($uri) {
        return URL_BASE . "/{$uri}";
    }

    return URL_BASE;
}
