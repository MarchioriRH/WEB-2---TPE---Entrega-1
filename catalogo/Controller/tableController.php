<?php

include_once "./View/tableView.php";
include_once "./Model/tableModel.php";
include_once "./Controller/vehiculosController.php";
include_once "./Model/vehiculosModel.php";
include_once "./Controller/generalController.php";
include_once "./View/generalView.php";




class TableController{
    
    private $view;
    private $model;
    private $categorias;
    private $vehiculosModel;
    private $generalView;
    private $usuarios;

    function __construct(){
        $this->view = new TableView();
        $this->generalView = new GeneralView();
        $this->model = new TableModel();
        $this->vehiculosModel = new VehiculosModel();
        $this->categorias = $this->model->getCategoriasDB();
        $this->vehiculosModel = $this->vehiculosModel->getVehiculosDB();
        $this->usuarios = $this->model->getUsuariosDB();
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
            $categoria = $this->model->getDetallesCategoriaDB($id_categoria);
            $this->view->editCategoria($categoria);
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
                $this->generalView->showMsje("ERROR: los campos no pueden estar vacios.");
                $this->view->showCategorias($this->categoria);
            } 
        }
}