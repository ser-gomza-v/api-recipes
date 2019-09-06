<?php

//uri
define("URI",$_SERVER["REQUEST_URI"]);

//server name
define("SERVER",$_SERVER["SERVER_NAME"]."/");

//subdomain
define("SUBSERVER",str_replace("/index.php","",$_SERVER["SCRIPT_NAME"])."/");

//use protocol
define("SCHEME",is_null($_SERVER["REQUEST_SCHEME"]) ? "http" :
    $_SERVER["REQUEST_SCHEME"]."://"
);

//base url
define("BASE",str_replace("//","/",SERVER.SUBSERVER));

//path to root project
define("MAIN",SCHEME.BASE);

//root folder
define("DIR",pathinfo($_SERVER["SCRIPT_FILENAME"],PATHINFO_DIRNAME));

//Model path
define("MODEL",DIR."/Model");

//View path
define("VIEW",DIR."/View/");

//Controller path
define("CONTROLLER",DIR."/Controller");

//path load images
define("IMAGES",DIR."/public/images/");

//type request
define("REQUEST",$_SERVER['REQUEST_METHOD']);

//type request
define("POST", $_POST);


?>