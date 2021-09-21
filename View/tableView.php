<?php

include_once "libs/smarty-3.1.39/libs/Smarty.class.php";

class TableView{
    
    private $smarty;

    public function __contruct(){
        $this->smarty = new Smarty();
    }

    function viewHome(){
        $this->smarty->assign('titulo', 'Materias 2021');
        $this->smarty->display('./templates/home.tpl');
    }
}