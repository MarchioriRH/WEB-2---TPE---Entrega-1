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
        if ($this->session->sessionStarted())
            $this->view->addComment($id);
    }

}