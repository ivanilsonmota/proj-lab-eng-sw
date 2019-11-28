<?php

define("URL_BASE", "http://127.0.0.1/proj-lab-eng-sw");
define("ASSETS_DIR", "/source/Views/");

define("URL_AUTOMAKER", "");
define("URL_DEALERSHIP", "");

define("SITE", "VEÍCULOS");

define("DATA_LAYER_CONFIG", [
    "driver" => "mysql",
    "host" => "127.0.0.1",
    "port" => "3306",
    "dbname" => "proj_lab_eng_sw",
    "username" => "root",
    "passwd" => "", 
    "options" => [
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        PDO::ATTR_CASE => PDO::CASE_NATURAL
    ]
]);


function url(string $uri = null): string
{
    if ($uri) {
        return URL_BASE . "/{$uri}";
    }

    return URL_BASE;
}
