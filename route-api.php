<?php

require_once 'libs/Router.php';
require_once 'Controller/ApiCommentsController.php';

// crea el router
$router = new Router();

// define la tabla de ruteo

$router->addRoute('comment/:ID', 'GET', 'ApiCommentsController', 'getComment');
$router->addRoute('comment/byVehicle/:ID', 'GET', 'ApiCommentsController', 'getCommentsByVehiculoID');
$router->addRoute('comment/:ID', 'DELETE', 'ApiCommentsController', 'deleteComment');
$router->addRoute('comment', 'POST', 'ApiCommentsController', 'addComment');
$router->addRoute('comment/byOrder/:ID', 'GET', 'ApiCommentsController', 'getCommentsByOrder');
$router->addRoute('comment/byScore/:ID', 'GET', 'ApiCommentsController', 'getCommentsByScore');
// rutea
$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);