<?php
require_once "./Controller/CategoriasController.php";
require_once "./Controller/VehiculosController.php";
require_once "./Controller/UsersController.php";
require_once "./Controller/GeneralController.php";
require_once "./Controller/CommentsController.php";
require_once "./Controller/ApiCommentsController.php";


// se define URL base.
define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

// lee la acción
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'homeCatalogo'; // acción por defecto si no envían
    header('Location: '.BASE_URL.'homeCatalogo');
}
// realiza el explode de la accion 
$params = explode('/', $action);

// se instancian las distintas categorias.
$categorias = new CategoriasController();
$vehiculos = new VehiculosController();
$users = new UsersController();
$general = new GeneralController();
$comments = new CommentsController();

// determina que camino seguir según la acción
switch ($params[0]) {
    case 'homeCatalogo': 
        $general->showHome(); 
        break;
    case 'login': 
        $users->login(); 
        break;
    case 'logout':
        header('Location: '.BASE_URL.'homeCatalogo');
        $users->logOut();
        break;
    case 'loginUsuario': 
        $users->loginUsuarioDB(); 
        break;
    case 'registroNuevoUsuario': 
        $users->registro(); 
        break;
    case 'adminUsers': 
        $users->showUsuarios(); 
        break;
    case 'editarRolUsuario': 
        $users->editarRolUsuario($params[1]); 
        break;
    case 'editRolUsuarioDB': 
        $users->editRolUsuarioDB($params[1]); 
        break;
    case 'eliminarUsuario': 
        $users->eliminarUsuario($params[1]); 
        break;
    case 'eliminarUsuarioDB': 
        $users->eliminarUsuarioDB($params[1]); 
        break;
    case 'registroDB': 
        $users->registroNuevoUsuarioDB(); 
        break;
    case 'verCatalogoVehiculos': 
        $vehiculos->showVehiculos(); 
        break;
    case 'detallesVehiculo': 
        $vehiculos->showDetallesVehiculo($params[1]); 
        break;
    case 'detallesVehiculoEnCategoria': 
        $vehiculos->showDetallesVehiculoCat($params[1]); 
        break;
    case 'eliminarVehiculo': 
        $vehiculos->deleteVehiculo($params[1]); 
        break;
    case 'eliminarVehiculoDB':
        $vehiculos->deleteVehiculoDB($params[1]); 
        break;
    case 'eliminarVehiculoDesdeCategoria': 
        $vehiculos->deleteVehiculoDesdeCategoria($params[1]); 
        break;
    case 'eliminarVehiculoDesdeCategoriaDB': 
        $vehiculos->deleteVehiculoDesdeCategoriaDB($params[1]); 
        break;
    case 'editarVehiculo': 
        $vehiculos->editVehiculo($params[1]); 
        break;
    case 'editVehiculoDB':
        $vehiculos->editVehiculoDB($params[1]); 
        break;
    case 'editarVehiculoEnCategoria':
        $vehiculos->editarVehiculoEnCategoria($params[1]); 
        break;
    case 'addNewVehiculo': 
        $vehiculos->addNewVehiculo(); 
        break;
    case 'insertNewVehiculoDB': 
        $vehiculos->insertNewVehiculoDB(); 
        break;
    case 'showComments': 
        $comments->showComments($params[1]); 
        break;   
    case 'addComment': 
        $comments->addComment($params[1]); 
        break;
    case 'verCatalogoCategoria': 
        $categorias->showCategorias(); 
        break;
    case 'eliminarCategoria': 
        $categorias->deleteCategoria($params[1]); 
        break;
    case 'eliminarCategoriaDB': 
        $categorias->deleteCategoriaDB($params[1]); 
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
    case 'verCatalogoPorCategorias': 
        $vehiculos->showVehiculosPorCategoria($params[1]); 
        break;
    default: 
        $general->errorMsje404(); 
        break;
}
