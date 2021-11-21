<?php

require_once 'libs/Router.php';
require_once 'Controller/ApiCommentsController.php';

// Se crea el router
$router = new Router();

// Se define la tabla de ruteo

$router->addRoute('comment/:ID', 'GET', 'ApiCommentsController', 'getComment');
$router->addRoute('comments/byVehicle/:ID', 'GET', 'ApiCommentsController', 'getCommentsByVehiculoID');
$router->addRoute('comment/:ID', 'DELETE', 'ApiCommentsController', 'deleteComment');
$router->addRoute('comment/:ID', 'POST', 'ApiCommentsController', 'addComment');
$router->addRoute('comments/byOrder/:ID', 'GET', 'ApiCommentsController', 'getCommentsByOrder');
$router->addRoute('comments/byScore/:ID', 'GET', 'ApiCommentsController', 'getCommentsByScore');
$router->addRoute('comments/countByCriteria/:ID', 'GET', 'ApiCommentsController', 'getCountByCriteria');

// Ruteo
$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);