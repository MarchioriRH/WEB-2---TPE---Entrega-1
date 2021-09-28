<?php

include_once "./View/tableView.php";
include_once "./Model/tableModel.php";

class TableController{
    
    private $view;
    private $model;
    private $categorias;
    private $vehiculos;

    function __construct(){
        $this->view = new TableView();
        $this->model = new TableModel();
        $this->categorias = $this->model->getCategoriasDB();
        $this->vehiculos = $this->model->getVehiculosDB();
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
            $this->view->showErrorMsje("ERROR - Los campos no pueden estar vacios.");
            $this->view->showVehiculos($this->vehiculos);
        } 
    }
    
    function errorMsje404(){
        $this->view->showErrorMsje("ERROR 404 - Page not found.");
        $this->view->showVehiculos($this->vehiculos);
    }
}