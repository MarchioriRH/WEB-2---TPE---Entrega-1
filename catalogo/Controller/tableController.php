<?php

include_once "./View/tableView.php";
include_once "./Model/tableModel.php";

class TableController{
    
    private $view;
    private $model;

    function __construct(){
        $this->view = new TableView();
        $this->model = new TableModel();
    }

    function showHome(){
        $this->view->viewHome();
    }
   
    function showVehiculos(){
        $vehiculos = $this->model->getVehiculosDB();
        $this->view->showVehiculos($vehiculos);
    }

    function showDetallesVehiculo($id_vehiculo){
        $vehiculos = $this->model->getVehiculosDB();
        $detalles = $this->model->getDetallesVehiculoDB($id_vehiculo);
        $this->view->showDetallesVehiculo($detalles);
        $this->view->showVehiculos($vehiculos);
    }

    function deleteVehiculo($id_vehiculo){
        $this->model->deleteVehiculoDB($id_vehiculo);
        header('Location: '.BASE_URL.'verCatalogoCompleto');
    }

    function editVehiculo($id_vehiculo){
        $vehiculo = $this->model->getDetallesVehiculoDB($id_vehiculo);
        $categorias = $this->model->getCategoriasDB();        
        $this->view->editVehiculo($vehiculo,$categorias);
        $vehiculos = $this->model->getVehiculosDB();
        $this->view->showVehiculos($vehiculos);
    }

    function editVehiculoDB($id){
        print_r($_POST);
        $this->model->editVehiculoDB($id, $_POST['tipo'], $_POST['marca'], $_POST['modelo'], $_POST['anio'], $_POST['kms'], $_POST['precio']);
        header('Location: '.BASE_URL.'verCatalogoCompleto');
    }

    function addNewVehiculo(){
        $categorias = $this->model->getCategoriasDB();
        $vehiculos = $this->model->getVehiculosDB();
        $this->view->showVehiculos($vehiculos);
        $this->view->addNewVehiculo($vehiculos,$categorias);
    }

    function insertNewVehiculoDB(){
        if (!empty($_POST['marca']) || !empty($_POST['modelo']) || !empty($_POST['anio']) || !empty($_POST['kms']) || !empty($_POST['precio'])){
            $this->model->addNewVehiculoDB($_POST['tipo'], $_POST['marca'], $_POST['modelo'], $_POST['anio'], $_POST['kms'], $_POST['precio']);
            header('Location: '.BASE_URL.'verCatalogoCompleto');
        } else {
            $this->view->showErrorMsje("ERROR: los campos no pueden estar vacios");
            $vehiculos = $this->model->getVehiculosDB();
            $this->view->showVehiculos($vehiculos);
        } 
    }
 
}