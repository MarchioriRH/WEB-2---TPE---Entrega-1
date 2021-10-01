<?php

include_once "libs/smarty-3.1.39/libs/Smarty.class.php";


class UsersView {

    private $smarty;

    public function __construct(){
        $this->smarty = new Smarty();
    }

    function login(){
        $this->smarty->display('./templates/login.tpl');
    }

    function registro(){
        $this->smarty->display('./templates/registro.tpl');
    }
}