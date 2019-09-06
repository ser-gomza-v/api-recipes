<?php
session_start();
chdir(__DIR__);
include_once "config/Routes.php";
include_once "config/config_db.php";
include_once "config/config.php";
//require_once 'vendor/autoload.php';

spl_autoload_register(
    function ($class) {
        $class = str_replace("_", "/", $class . ".php");
        if (file_exists($class)) {
            include_once $class;
        }
    }
);


$route = new Routes();
$route = $route->start(URI);


