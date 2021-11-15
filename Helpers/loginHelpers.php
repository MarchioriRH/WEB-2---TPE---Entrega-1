<?php

include_once "./View/GeneralView.php";

class LoginHelpers {

    private $generalView;

   public function __construct() {
       $this->generalView = new GeneralView();
    }

    /*public function __construct() {
        
        //if (!isset($_SESSION))
            session_start();

        // verifica que este logueado
        if(!isset($_SESSION['EMAIL'])){
            $this->generalView->viewHome(0);
            die();
        }
        else {
            if(isset($_SESSION['EMAIL'])){ // si esta logueado
                if (time() - $_SESSION['LAST_ACTIVITY'] > 10) { // expiro el timeout
                    $this->generalView->viewHome(0);
                    die();
                }
                $_SESSION['LAST_ACTIVITY'] = time();
            }
          
        }
    }*/




    // funcion que se encarga de iniciar la sesion cuando se loguea algun usuario
    public function sessionStarted(){
        if (!isset($_SESSION))
            session_start();
        if (isset($_SESSION['EMAIL'])){/*{
            
            if (time() - $_SESSION['LAST_ACTIVITY'] > 100) { // expiro el timeout
                $this->generalView->viewHome(0);
                die();
            }
            
            $_SESSION['LAST_ACTIVITY'] = time();*/
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