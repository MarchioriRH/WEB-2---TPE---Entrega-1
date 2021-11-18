<?php


include_once "libs/smarty-3.1.39/libs/Smarty.class.php";
include_once "Helpers/LoginHelpers.php";

class CommentsView{

    private $smarty;
    private $session;
    private $sessionInitiated;

    public function __construct(){
        $this->smarty = new Smarty();
        $this->sessionInitiated = new LoginHelpers();
        $this->session = $this->sessionInitiated->sessionStarted();
        if (isset($_SESSION['NOMBRE']) && isset($_SESSION['NOMBRE']))
            $this->user = $_SESSION['NOMBRE'] . ' ' . $_SESSION['APELLIDO'];
        else
            $this->user = null;
    }

   
    function showComments($id){
        if ($this->session){
            $sessionRol = $_SESSION['ROL'];
            $this->smarty->assign('sessionRol', $sessionRol);
        } else {
            $this->smarty->assign('sessionRol', '-1');
        }
        $this->smarty->assign('user', $this->user);
        $this->smarty->assign('id', $id);
        $this->smarty->assign('flag', "ByVehicle");
        $this->smarty->assign('session', $this->session);
        $this->smarty->assign('titulo', 'Comentarios');
        $this->smarty->display('templates/tplComments/commentsByVehicle.tpl');
    }

    public function addComment($id){
        if ($this->session){
            $sessionRol = $_SESSION['ROL'];
            $this->smarty->assign('sessionRol', $sessionRol);
        }
        $this->smarty->assign('user', $this->user);
        $this->smarty->assign('id', $id);
        $this->smarty->assign('flag', "Add");
        $this->smarty->assign('idUsuario', $_SESSION['ID_USUARIO']);
        $this->smarty->assign('session', $this->session);
        $this->smarty->assign('titulo', 'Comentarios');
        $this->smarty->display('templates/tplComments/addComment.tpl');
    }
}