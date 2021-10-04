<?php

include_once "./View/categoriasView.php";
include_once "./Model/categoriasModel.php";
include_once "vehiculosController.php";
include_once "./Model/vehiculosModel.php";
include_once "generalController.php";
include_once "./View/generalView.php";
include_once "usersController.php";




class CategoriasController{
    
    private $view;
    private $model;
    private $categorias;
    private $generalView;

    public function __construct(){
        $this->view = new CategoriasView();
        $this->generalView = new GeneralView();
        $this->model = new CategoriasModel();
        $this->vehiculosModel = new VehiculosModel();
        $this->categorias = $this->model->getCategoriasDB();
    }


    //  categorias
    public function showCategorias(){
        $this->view->showCategorias($this->categorias);
    }

    public function deleteCategoria($id_categoria){
        $this->model->deleteCategoriaDB($id_categoria);
        header('Location: '.BASE_URL.'verCatalogoCategoria');
    }

    public function editCategoria($id_categoria){
        $categoria = $this->model->getDetallesCategoriaDB($id_categoria);
        $this->view->editCategoria($categoria);
        $this->view->showCategorias($this->categorias);
    }

    public function editCategoriaDB($id){
        $this->model->editCategoriaDB($id, $_POST['tipo']);
        header('Location: '.BASE_URL.'verCatalogoCategoria');
    }

    public function addNewCategoria(){
        $this->view->showCategorias($this->categorias);
        $this->view->addNewCategoria($this->categorias);
    }

    public function insertNewCategoriaDB(){
        if (!empty($_POST['tipo'])){
            $this->model->addNewCategoriaDB($_POST['tipo']);
            header('Location: '.BASE_URL.'verCatalogoCategoria');
        } else {
            $this->generalView->showMsje("ERROR: los campos no pueden estar vacios.");
            $this->view->showCategorias($this->categoria);
        } 
    }
}