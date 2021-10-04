<?php

include_once "./View/generalView.php";

class LoginHelpers {

    private $generalView;

    public function __construct() {
        $this->generalView = new GeneralView();
    }

    public function sessionStarted(){
        if (!isset($_SESSION))
            session_start();
        if (isset($_SESSION['EMAIL']))
            return true;
        else 
            return false;
    }

    public function logOut() {
        session_start();
        session_destroy();
        $this->generalView->viewHome(0);
    }
}