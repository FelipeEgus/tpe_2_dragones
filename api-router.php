<?php
require_once './libs/Router.php';
require_once './app/controller/dragonesApiController.php';
require_once './app/controller/authApiController.php';



$router = new Router();


$router->addRoute('dragones/', 'GET', 'dragonesApiController', 'showDragones');
$router->addRoute('dragones/:mitologia', 'GET', 'dragonesApiController', 'showDragonMitologia');
$router->addRoute('dragon/:ID', 'GET', 'dragonesApiController', 'showDragonId');

$router->addRoute('dragon/:ID', 'DELETE', 'dragonesApiController', 'deleteDragon');
$router->addRoute('dragon/add', 'POST', 'dragonesApiController', 'addDragon'); 

$router->addRoute('dragon/order/id/:order', 'GET', 'dragonesApiController', 'orderDragon');
$router->addRoute('dragon/order/nombre/:order', 'GET', 'dragonesApiController', 'orderNombre');
$router->addRoute('dragon/order/mitologia/:order', 'GET', 'dragonesApiController', 'orderMitologia');
$router->addRoute('dragon/order/descrip/:order', 'GET', 'dragonesApiController', 'orderDescrip');
$router->addRoute('dragon/order/repre/:order', 'GET', 'dragonesApiController', 'orderRepre');
$router->addRoute('dragon/pagina/:pag', 'GET', 'dragonesApiController', 'showLimit');


$router->addRoute("auth/token", 'GET', 'AuthApiController', 'getToken');


$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);
