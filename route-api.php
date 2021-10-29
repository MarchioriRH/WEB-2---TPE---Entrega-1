<?php

require_once 'libs/Router.php';
require_once 'Controller/apiCommentsController.php';

// crea el router
$router = new Router();

// define la tabla de ruteo
$router->addRoute('comments', 'GET', 'apiCommentsController', 'getAllComments');
$router->addRoute('comments/:ID', 'GET', 'apiCommentsController', 'getCommentsByUserID');

// rutea
$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);