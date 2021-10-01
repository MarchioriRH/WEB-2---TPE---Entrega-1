<?php

include_once "./View/generalView.php";

class GeneralController{
    
    private $view;
    private $model;
    
    function __construct(){
        $this->view = new GeneralView();        
    }

    function showHome(){
        $this->view->viewHome();
    }

    function errorMsje404(){
        $this->view->showMsje("ERROR 404 - Page not found.");
        $this->view->viewHome();
    }

}