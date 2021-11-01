<?php

include_once "libs/smarty-3.1.39/libs/Smarty.class.php";
include_once "./Helpers/LoginHelpers.php";

class GeneralView {
    
    private $smarty;
    

    public function __construct(){
        $this->smarty = new Smarty();
    }

    // funcion que se encarga de mostrar el home del sitio
    public function viewHome($session){
        if ($session){
            $sessionRol = $_SESSION['ROL'];
            $this->smarty->assign('sessionRol', $sessionRol);
        }
        $this->smarty->assign('session', $session);
        $this->smarty->display('templates/tplGeneral/home.tpl');
       
    }

    // funcion encargada de mostrar los mensajes de error y generales
    public function showMsje($rama, $errorMsje, $id = null, $id_cat = null){
        $this->smarty->assign('texto1',$errorMsje);
        $this->smarty->assign('rama', $rama);
        $this->smarty->assign('id', $id);
        $this->smarty->assign('id_cat', $id_cat);
        $this->smarty->display('templates/tplGeneral/showMsje.tpl');
    }
}