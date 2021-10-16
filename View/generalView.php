<?php

include_once "libs/smarty-3.1.39/libs/Smarty.class.php";
include_once "./Helpers/loginHelpers.php";

class GeneralView {
    
    private $smarty;
    

    public function __construct(){
        $this->smarty = new Smarty();
    }

    // funcion que se encarga de mostrar el home del sitio
    public function viewHome($session){
        $this->smarty->assign('session', $session);
        /*if ($session == 0)
            header('Location: '.BASE_URL.'homeCatalogo');*/
        $this->smarty->display('templates/tplGeneral/home.tpl');
       
    }

    // funcion encargada de mostrar los mensajes de error y generales
    public function showMsje($errorMsje){
        $this->smarty->assign('texto1',$errorMsje);
        $this->smarty->display('templates/tplGeneral/showMsje.tpl');
    }
}