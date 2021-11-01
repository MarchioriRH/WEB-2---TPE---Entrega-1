<?php

require_once 'libs/Router.php';
require_once 'Controller/ApiCommentsController.php';

// crea el router
$router = new Router();

// define la tabla de ruteo
$router->addRoute('comment', 'GET', 'ApiCommentsController', 'getAllComments');
$router->addRoute('comment/:ID', 'GET', 'ApiCommentsController', 'getComment');
$router->addRoute('comment/ByUser/:ID', 'GET', 'ApiCommentsController', 'getCommentsByUserID');
$router->addRoute('comment/ByVehicle/:ID', 'GET', 'ApiCommentsController', 'getCommentsByVehiculoID');
$router->addRoute('comment/:ID', 'DELETE', 'ApiCommentsController', 'deleteComment');
$router->addRoute('comment', 'POST', 'ApiCommentsController', 'addComment');
$router->addRoute('comment/:ID', 'PUT', 'ApiCommentsController', 'updateComment');

// rutea
$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);