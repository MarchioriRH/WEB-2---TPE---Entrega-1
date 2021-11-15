<?php

include_once "./View/GeneralView.php";

class LoginHelpers {

    private $generalView;

    public function __construct() {
       $this->generalView = new GeneralView();    
    }


    // funcion que se encarga de iniciar la sesion cuando se loguea algun usuario
    public function sessionStarted(){
        if (!isset($_SESSION))
            session_start();
        if (isset($_SESSION['EMAIL'])){
            return true;
        } else 
            return false;
    }

    // funcion para terminar la sesion iniciada.
    public function logOut() {
        if (!isset($_SESSION))
            session_start();
        session_destroy();
        $this->generalView->viewHome(0);
    }
}