<?php

include_once "libs/smarty-3.1.39/libs/Smarty.class.php";

class GeneralView {
    
    private $smarty;

    public function __construct(){
        $this->smarty = new Smarty();
    }

    function viewHome(){
        $this->smarty->display('./templates/home.tpl');
    }

    function showMsje($errorMsje){
        $this->smarty->assign('texto1',$errorMsje);
        $this->smarty->display('./templates/showMsje.tpl');
    }
}