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
        $vehiculos = $this->model->getVehiculos();
        $this->view->showVehiculos($vehiculos);
    }

    function showDetallesVehiculo($id_vehiculo){
        $vehiculos = $this->model->getVehiculos();
        $detalles = $this->model->getDetallesVehiculo($id_vehiculo);
        $this->view->showDetallesVehiculo($detalles);
        $this->view->showVehiculos($vehiculos);
    }

    function deleteVehiculo($id_vehiculo){
        $this->view->deleteVehiculo($id_vehiculo);
        $vehiculos = $this->model->getVehiculos();
        $this->view->showVehiculos($vehiculos);
    }

    function borrarVehiculoDB($id_vehiculo){
        $this->model->borrarVehiculoDB($id_vehiculo);
        $vehiculos = $this->model->getVehiculos();
        $this->view->showVehiculos($vehiculos);
    }

    function addNewVehiculo(){
        $categorias = $this->model->getCategorias();
        $this->view->addNewVehiculo($categorias);
    }

    function insertNewVehiculo(){
        $this->model->addNewVehiculo($_POST['tipo'], $_POST['marca'], $_POST['modelo'], $_POST['anio'], $_POST['kms'], $_POST['precio']);
        header('Location: '.BASE_URL.'verCatalogoCompleto');
    }
 
}