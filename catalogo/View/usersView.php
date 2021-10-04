<?php

include_once "libs/smarty-3.1.39/libs/Smarty.class.php";


class UsersView {

    private $smarty;

    public function __construct(){
        $this->smarty = new Smarty();
    }

    public function login($session){
        $this->smarty->assign('session', $session);
        $this->smarty->display('./templates/login.tpl');
    }

    public function registro($session){
        $this->smarty->assign('session', $session);
        $this->smarty->display('./templates/registro.tpl');
    }
}