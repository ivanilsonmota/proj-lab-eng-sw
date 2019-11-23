<?php

define("URL_BASE", "http://127.0.0.1:8080/proj-lab-eng-sw");
define("URL_AUTOMAKER", "");
define("URL_DEALERSHIP", "");

define("SITE", "VEÍCULOS");

define("DATA_LAYER_CONFIG", [
    "driver" => "mysql",
    "host" => "127.0.0.1",
    "port" => "3306",
    "dbname" => "frontend",
    "username" => "root",
    "passwd" => "9876",
    "options" => [
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        PDO::ATTR_CASE => PDO::CASE_NATURAL
    ]
]);


function url($uri = null)
{
    if ($uri) {
        return URL_BASE . "/{$uri}";
    }

    return URL_BASE;
}
