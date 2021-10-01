<?php

include_once "./View/categoriasView.php";
include_once "./Model/categoriasModel.php";
include_once "./View/vehiculosView.php";
include_once "./Model/vehiculosModel.php";
include_once "./View/generalView.php";

class VehiculosController{
    
    private $view;
    private $model;
    private $vehiculos;
    private $categorias;
    private $generalView;
    private $getCategoriasDB;
    

    function __construct(){
        $this->view = new VehiculosView();
        $this->model = new VehiculosModel();
        $this->generalView = new GeneralView();
        $this->categoriasModel = new TableModel();
        $this->categorias = $this->categoriasModel->getCategoriasDB();
        $this->vehiculos = $this->model->getVehiculosDB();
        
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
            $this->generalView->showMsje("ERROR - Los campos no pueden estar vacios.");
            $this->view->showVehiculos($this->vehiculos);
        } 
    }
}