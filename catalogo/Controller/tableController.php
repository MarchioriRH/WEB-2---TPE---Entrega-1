<?php

include_once "./View/tableView.php";
include_once "./Model/tableModel.php";

class TableController{
    
    private $view;
    private $model;
    private $categorias;
    private $vehiculos;
    private $usuarios;

    function __construct(){
        $this->view = new TableView();
        $this->model = new TableModel();
        $this->categorias = $this->model->getCategoriasDB();
        $this->vehiculos = $this->model->getVehiculosDB();
        $this->usuarios = $this->model->getUsuariosDB();
    }

    function showHome(){
        $this->view->viewHome();
    }
   
    function showVehiculos(){
        $this->view->showVehiculos($this->vehiculos);
    }

    function showDetallesVehiculo($id_vehiculo){
        $detalles = $this->model->getDetallesVehiculoDB($id_vehiculo);
        $this->view->showDetallesVehiculo($detalles);
        $this->view->showVehiculos($this->vehiculos);
    }

    function deleteVehiculo($id_vehiculo){
        $this->model->deleteVehiculoDB($id_vehiculo);
        header('Location: '.BASE_URL.'verCatalogoCompleto');
    }

    function editVehiculo($id_vehiculo){
        $vehiculo = $this->model->getDetallesVehiculoDB($id_vehiculo);
        $this->view->editVehiculo($vehiculo,$this->categorias);
        $this->view->showVehiculos($this->vehiculos);
    }

    function editVehiculoDB($id){
        $this->model->editVehiculoDB($id, $_POST['tipo'], $_POST['marca'], $_POST['modelo'], $_POST['anio'], $_POST['kms'], $_POST['precio']);
        header('Location: '.BASE_URL.'verCatalogoCompleto');
    }

    function addNewVehiculo(){
        $this->view->showVehiculos($this->vehiculos);
        $this->view->addNewVehiculo($this->vehiculos,$this->categorias);
    }

    function insertNewVehiculoDB(){
        if (!empty($_POST['marca']) || !empty($_POST['modelo']) || !empty($_POST['anio']) || !empty($_POST['kms']) || !empty($_POST['precio'])){
            $this->model->addNewVehiculoDB($_POST['tipo'], $_POST['marca'], $_POST['modelo'], $_POST['anio'], $_POST['kms'], $_POST['precio']);
            header('Location: '.BASE_URL.'verCatalogoCompleto');
        } else {
            $this->view->showMsje("ERROR - Los campos no pueden estar vacios.");
            $this->view->showVehiculos($this->vehiculos);
        } 
    }
    
    function errorMsje404(){
        $this->view->showMsje("ERROR 404 - Page not found.");
        $this->view->viewHome();
    }

    function login(){
        $this->view->login();
    }

    function loginUsuarioDB(){
        if(!empty($_POST['mail']) && !empty($_POST['password'])){
            $userPassword = $_POST['password'];
            $userMail = $_POST['mail'];
            if ($this->compararClaveUsuario($userMail, $userPassword) == true){
                $this->view->showMsje('Bienvenido '.$_POST['mail'].'.');
                $this->view->viewHome();
            } else {
                $this->view->showMsje('ERROR - Usuario y/o contraseña incorrectos.');
                $this->view->viewHome();
            }
        } else {
            $this->view->showMsje("ERROR - Los campos e-Mail y Password no pueden estar vacios.");
            $this->view->viewHome();
        } 
    }

    function compararClaveUsuario($mail, $userPassword){
        print_r($this->usuarios);
        foreach($this->usuarios as $usuario){
            if (($usuario->mail) == $mail)
                if (password_verify($userPassword, ($usuario->passwrd)))    
                    return true;
        }return false;
    }

    function registro(){
        $this->view->registro();
    }

    function buscarUsuario($mail){
        foreach($this->usuarios as $usuario){
            if (($usuario->mail) == $mail) 
                return true;
            else
                return false;
        }
    }

    function registroNuevoUsuarioDB(){
        $userEmail = $_POST['mail'];
        if(!empty($_POST['mail']) && !empty($_POST['password'])){
            if ($this->buscarUsuario($userEmail) == false){
                $userPassword =  password_hash($_POST['password'], PASSWORD_BCRYPT);
                $this->model->registroNuevoUsuarioDB($_POST ['mail'], $userPassword, $_POST ['nombre'], $_POST ['apellido']);
                $this->view->showMsje('Usuario '.$_POST['mail'].' registrado con exito.');
                $this->view->viewHome();
            } else {
                $this->view->showMsje('ERROR - El usuario '.$_POST['mail'].' ya se encuentra registrado.');
                $this->view->viewHome();
            }
        } else {
            $this->view->showMsje("ERROR - Los campos e-Mail y Password no pueden estar vacios.");
            $this->view->viewHome();
        } 
    }

    //  categorias
    function showCategorias(){
        $this->view->showCategorias($this->categorias);
    }

    function deleteCategoria($id_categoria){
        $this->model->deleteCategoriaDB($id_categoria);
        header('Location: '.BASE_URL.'verCatalogoCategorias');
    }

    function editCategoria($id_categoria){
        $this->view->editCategoria($id_categoria, $this->categorias);
        $this->view->showCategorias($this->categorias);
    }

    function editCategoriaDB($id){
        $this->model->editCategoriaDB($id, $_POST['tipo']);
        header('Location: '.BASE_URL.'verCatalogoCategorias');
    }

    function addNewCategoria(){
        $this->view->showCategorias($this->categorias);
        $this->view->addNewCategoria($this->categorias);
    }

    function insertNewCategoriaDB(){
        if (!empty($_POST['tipo'])){
            $this->model->addNewCategoriaDB($_POST['tipo']);
            header('Location: '.BASE_URL.'verCatalogoCategorias');
        } else {
            $this->view->showMsje("ERROR: los campos no pueden estar vacios.");
            $this->view->showCategorias($this->categoria);
        } 
    }
}