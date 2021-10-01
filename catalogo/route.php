<?php
require_once "./Controller/categoriasController.php";
require_once "./Controller/vehiculosController.php";
require_once "./Controller/usersController.php";
require_once "./Controller/generalController.php";



define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

// lee la acción
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'catalogo'; // acción por defecto si no envían
}
//print_r($action);
$params = explode('/', $action);

$categorias = new CategoriasController();
$vehiculos = new VehiculosController();
$users = new UsersController();
$general = new GeneralController();

// determina que camino seguir según la acción
switch ($params[0]) {
    case 'catalogo': 
        $general->showHome(); 
        break;
    case 'login': 
        $users->login(); 
        break;
    case 'logout':
        $users->logOut();
    case 'loginUsuario': 
        $users->loginUsuarioDB(); 
        break;
    case 'registro': 
        $users->registro(); 
        break;
    case 'registroDB': 
        $users->registroNuevoUsuarioDB(); 
        break;
    case 'verCatalogoCompleto': 
        $vehiculos->showVehiculos(); 
        break;
    case 'detalles': 
        $vehiculos->showDetallesVehiculo($params[1]); 
        break;
    case 'eliminar': 
        $vehiculos->deleteVehiculo($params[1]); 
        break;
    case 'editar': 
        $vehiculos->editVehiculo($params[1]); 
        break;
    case 'editVehiculoDB':
        $vehiculos->editVehiculoDB($params[1]); 
        break;
    case 'addNewVehiculo': 
        $vehiculos->addNewVehiculo(); 
        break;
    case 'insertNewVehiculoDB': 
        $vehiculos->insertNewVehiculoDB(); 
        break;
    case 'verCatalogoCategoria': 
        $categorias->showCategorias(); 
        break;
    case 'eliminarCategoria': 
        $categorias->deleteCategoria($params[1]); 
        break;
    case 'editCategoriaDB': 
        $categorias->editCategoriaDB($params[1]); 
        break;
    case 'addNewCategoria': 
        $categorias->addNewCategoria(); 
        break;
    case 'insertNewCategoriaDB': 
        $categorias->insertNewCategoriaDB(); 
        break;
    case 'editarCategoria': 
        $categorias->editCategoria($params[1]); 
        break;
    default: 
        $general->errorMsje404(); 
        break;
}
