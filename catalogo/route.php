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
    case 'login': 
        $table->login(); 
        break;
    case 'loginUsuario': 
        $table->loginUsuarioDB(); 
        break;
    case 'registro': 
        $table->registro(); 
        break;
    case 'registroDB': 
        $table->registroNuevoUsuarioDB(); 
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
    case 'editar': 
        $table->editVehiculo($params[1]); 
        break;
    case 'editVehiculoDB':
        $table->editVehiculoDB($params[1]); 
        break;
    case 'addNewVehiculo': 
        $table->addNewVehiculo(); 
        break;
    case 'insertNewVehiculoDB': 
        $table->insertNewVehiculoDB(); 
        break;
    case 'verCatalogoCategoria': 
        $table->showCategorias(); 
        break;
    case 'eliminarCategoria': 
        $table->deleteCategoria($params[1]); 
        break;
    case 'editCategoriaDB': 
        print_r($params[1]);
        $table->editCategoriaDB($params[1]); 
        break;
    case 'addNewCategoria': 
        $table->addNewCategoria(); 
        break;
    case 'insertNewCategoriaDB': 
        $table->insertNewCategoriaDB(); 
        break;
    case 'editarCategoria': 
        $table->editCategoria($params[1]); 
        break;
    default: 
        $table->errorMsje404(); 
        break;
}
