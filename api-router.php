<?php
require_once './libs/Router.php';
require_once './app/controller/dragonesApiController.php';
require_once './app/controller/authApiController.php';



$router = new Router();


$router->addRoute("dragones", "GET", "dragonesApiController", "getFields");

$router->addRoute('dragones/:ID', 'GET', 'dragonesApiController', 'showDragon');
$router->addRoute('dragones/:ID', 'DELETE', 'dragonesApiController', 'deleteDragon');
$router->addRoute('dragones/add', 'POST', 'dragonesApiController', 'addDragon'); 

$router->addRoute("auth/token", 'GET', 'AuthApiController', 'getToken');

$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);
