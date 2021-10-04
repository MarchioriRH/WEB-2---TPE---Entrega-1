<?php

include_once "./View/generalView.php";
include_once "./Helpers/loginHelpers.php";

class GeneralController{
    
    // se declaran las variables que se utilizan en la clase
    private $generalView;
    private $loginHelper;

    // se instancian las clases
    public function __construct(){
        $this->generalView = new GeneralView();    
        $this->loginHelper = new LoginHelpers();    
    }

    // funcion encargada de solicitar al view la renderizacion del home
    public function showHome(){
        $this->generalView->viewHome($this->loginHelper->sessionStarted());
    }

    // si la pagina solicitada no existe, se muestra el error 404
    public function errorMsje404(){
        $this->generalView->showMsje("ERROR 404 - Page not found.");
    }

}