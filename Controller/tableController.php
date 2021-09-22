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
        $detalles = $this->model->getDetallesVehiculo($id_vehiculo);
        $this->view->showDetallesVehiculo($detalles);
    }
 
}