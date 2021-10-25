<?php

require_once 'libs/Router.php';
require_once 'Controller/apiComentsController.php';

// crea el router
$router = new Router();

// define la tabla de ruteo
$router->addRoute('coments', 'GET', 'apiComentsController', 'getAllComents');

// rutea
$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);