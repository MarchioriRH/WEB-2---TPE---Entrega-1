<?php

include_once "libs/smarty-3.1.39/libs/Smarty.class.php";
include_once "./Helpers/loginHelpers.php";

class UsersView {

    private $smarty;
    private $sessionInitiated;
    private $session;

    public function __construct(){
        $this->smarty = new Smarty();
        $this->sessionInitiated = new LoginHelpers();
        $this->session = $this->sessionInitiated->sessionStarted();
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

    public function showUsuarios($usuarios, $session){
        if ($session){
            $sessionRol = $_SESSION['ROL'];
            $this->smarty->assign('sessionRol', $sessionRol);
        }       
        $this->smarty->assign('session', $session);
        $this->smarty->assign('titulo', 'Usuarios');
        $this->smarty->assign('usuarios', $usuarios);
        $this->smarty->display('templates/tplUsers/usuarios.tpl');
    }

    public function editarRolUsuario($idUsuario, $roles, $user){
        if ($this->session){
            $sessionRol = $_SESSION['ROL'];
            $this->smarty->assign('sessionRol', $sessionRol);
        }     
        $this->smarty->assign('tituloEdit', "Editar rol de usuario de ");
        $this->smarty->assign('idUsuario', $idUsuario);
        $this->smarty->assign('user', $user);
        $this->smarty->assign('roles', $roles);
        $this->smarty->display('templates/tplUsers/editRolUsuario.tpl');
    }
}