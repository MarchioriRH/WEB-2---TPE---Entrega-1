<?php

include_once "./View/categoriasView.php";
include_once "./Model/categoriasModel.php";
include_once "generalController.php";


class CategoriasController{
    
    private $view;
    private $model;
    private $categorias;
    private $generalView;
    private $loginHelper;

    public function __construct(){
        $this->view = new CategoriasView();
        $this->generalView = new GeneralView();
        $this->model = new CategoriasModel();
        $this->loginHelper = new LoginHelpers();
    }


    //  categorias
    public function showCategorias(){
        $this->categorias = $this->model->getCategoriasDB();
        $this->view->showCategorias($this->categorias);
    }

    public function deleteCategoria($id_categoria){
        if ($this->loginHelper->sessionStarted() && $_SESSION['ROL'] == 1)
            $this->model->deleteCategoriaDB($id_categoria);
        header('Location: '.BASE_URL.'verCatalogoCategoria');
    }

    public function editCategoria($id_categoria){
        $this->categorias = $this->model->getCategoriasDB();
        if ($this->loginHelper->sessionStarted() && $_SESSION['ROL'] == 1){
            $categoria = $this->model->getDetallesCategoriaDB($id_categoria);
            $this->view->editCategoria($categoria);
        }
        $this->view->showCategorias($this->categorias);
    }

    public function editCategoriaDB($id){
        if ($this->loginHelper->sessionStarted() && $_SESSION['ROL'] == 1)
            $this->model->editCategoriaDB($id, $_POST['tipo']);
        header('Location: '.BASE_URL.'verCatalogoCategoria');
    }

    public function addNewCategoria(){
        $this->categorias = $this->model->getCategoriasDB();
        if ($this->loginHelper->sessionStarted() && $_SESSION['ROL'] == 1)
            $this->view->showCategorias($this->categorias);
        $this->view->addNewCategoria($this->categorias);
    }

    public function insertNewCategoriaDB(){
        $this->categorias = $this->model->getCategoriasDB();
        if ($this->loginHelper->sessionStarted() && $_SESSION['ROL'] == 1){
            if (!empty($_POST['tipo'])){
                $this->model->addNewCategoriaDB($_POST['tipo']);
                header('Location: '.BASE_URL.'verCatalogoCategoria');
            } else {
                $this->generalView->showMsje("ERROR: los campos no pueden estar vacios.");
                $this->view->showCategorias($this->categorias);
            } 
        } else {
            $this->view->showCategorias($this->categorias);
        }
    }
}