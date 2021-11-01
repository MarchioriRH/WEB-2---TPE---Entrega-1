<?php
include_once 'View/CommentsView.php';
include_once 'Helpers/LoginHelpers.php';
include_once 'View/VehiculosView.php';
include_once 'Model/VehiculosModel.php';
include_once 'View/CategoriasView.php';

class CommentsController {

    private $view;
    private $session;
    private $vehiculos;
    private $vehiculosView;
    private $vehiculosModel;
    private $catgoriasView;
    private $sessionView;

    public function __construct()    {
        $this->view = new CommentsView();
        $this->session = new LoginHelpers();
        $this->vehiculosView = new VehiculosView();
        $this->categoriasModel = new CategoriasView();
        $this->vehiculosModel = new VehiculosModel();
    }

    public function showComments($id){
        $this->view->showComments($id);
    }

    public function showAllComments(){
        $this->view->showAllComments();
    }

    public function addComment($id){
        $this->vehiculos = $this->vehiculosModel->getVehiculosDB();
        
        // se muestra el listado de items de fondo
        if ($this->session->sessionStarted() && $_SESSION['ROL'] == 1)
            $this->view->addComment($id);
        //se llama renderiza el modal que contiene el formulario de carga de un nuevo item
        //$this->vehiculosView->showVehiculos($this->vehiculos);
        
    }

}