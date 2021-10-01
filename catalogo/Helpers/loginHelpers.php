<?php

include_once "./View/generalView.php";

class LoginHelpers {

    private $view;

    function __construct() {
        $this->view = new GeneralView();
    }

    function sessionStarted(){
        if (!isset($_SESSION))
            session_start();
        if (isset($_SESSION['EMAIL']))
            return true;
        else 
            return false;
    }

    function logOut() {
        session_start();
        session_destroy();
        $this->view->viewHome("false");
    }
}