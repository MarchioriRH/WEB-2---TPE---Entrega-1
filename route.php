<?php
require_once "./Controller/tableController.php";

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

// lee la acción
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'catalogo'; // acción por defecto si no envían
}
//print_r($action);
$params = explode('/', $action);

$table = new TableController();

// determina que camino seguir según la acción
switch ($params[0]) {
    case 'catalogo': 
        $table->showHome(); 
        break;
    case 'verCatalogoCompleto': 
        $table->showVehiculos(); 
        break;
    case 'detalles': 
        $table->showDetallesVehiculo($params[1]); 
        break;
    case 'eliminar': 
        $table->deleteVehiculo($params[1]); 
        break;
    
    case 'borrarVehiculoDB': 
        $table->borrarVehiculoDB($params[1]); 
        break;
    default: 
        echo('404 Page not found'); 
        break;
}
