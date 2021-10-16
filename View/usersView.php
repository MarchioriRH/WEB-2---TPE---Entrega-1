<?php

include_once "libs/smarty-3.1.39/libs/Smarty.class.php";

class UsersView {

    private $smarty;

    public function __construct(){
        $this->smarty = new Smarty();
    }

    // se manda a visualizar el formulario de login
    public function login($session){
        $this->smarty->assign('session', $session);
        $this->smarty->display('templates/tplUsers/login.tpl');
    }

    // se manda a vizulizar el formulario de registro
    public function registro($session){
        $this->smarty->assign('session', $session);
        $this->smarty->display('templates/tplUsers/registro.tpl');
    }
}