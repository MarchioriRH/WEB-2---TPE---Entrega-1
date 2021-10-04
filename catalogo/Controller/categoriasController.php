<?php

include_once "./View/categoriasView.php";
include_once "./Model/categoriasModel.php";
include_once "generalController.php";




class CategoriasController{
    
    private $view;
    private $model;
    private $categorias;
    private $generalView;

    function __construct(){
        $this->view = new CategoriasView();
        $this->generalView = new GeneralView();
        $this->model = new CategoriasModel();
        $this->categorias = $this->model->getCategoriasDB();
    }


        //  categorias
        function showCategorias(){
            $this->view->showCategorias($this->categorias);
        }
    
        function deleteCategoria($id_categoria){
            $this->model->deleteCategoriaDB($id_categoria);
            header('Location: '.BASE_URL.'verCatalogoCategoria');
        }
    
        function editCategoria($id_categoria){
            $categoria = $this->model->getDetallesCategoriaDB($id_categoria);
            $this->view->editCategoria($categoria);
            $this->view->showCategorias($this->categorias);
        }
    
        function editCategoriaDB($id){
            $this->model->editCategoriaDB($id, $_POST['tipo']);
            header('Location: '.BASE_URL.'verCatalogoCategoria');
        }
    
        function addNewCategoria(){
            $this->view->showCategorias($this->categorias);
            $this->view->addNewCategoria($this->categorias);
        }
    
        function insertNewCategoriaDB(){
            if (!empty($_POST['tipo'])){
                $this->model->addNewCategoriaDB($_POST['tipo']);
                header('Location: '.BASE_URL.'verCatalogoCategoria');
            } else {
                $this->generalView->showMsje("ERROR: los campos no pueden estar vacios.");
                $this->view->showCategorias($this->categoria);
            } 
        }
}