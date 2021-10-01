<?php

include_once "./View/generalView.php";
include_once "./Helpers/loginHelpers.php";

class GeneralController{
    
    private $view;
    private $loginHelper;

    
    function __construct(){
        $this->view = new GeneralView();    
        $this->loginHelper = new LoginHelpers();    
    }

    function showHome(){
        $this->view->viewHome($this->loginHelper->sessionStarted());
    }

    function errorMsje404(){
        $this->view->showMsje("ERROR 404 - Page not found.");
        $this->view->viewHome($this->loginHelper->sessionStarted());
    }

}