<?php

include_once "./View/GeneralView.php";
include_once "./Helpers/LoginHelpers.php";
include_once "VehiculosController.php";
include_once "UsersController.php";
include_once "CategoriasController.php";
const RAMA = "404";

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
        $this->generalView->showMsje(RAMA, "ERROR 404 - Page not found.");
        $this->showHome();          
    }

}