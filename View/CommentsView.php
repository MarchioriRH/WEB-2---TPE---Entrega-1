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
    }

   
    function showComments($id){
        if ($this->session){
            $sessionRol = $_SESSION['ROL'];
            $this->smarty->assign('sessionRol', $sessionRol);
        }
        $this->smarty->assign('id', $id);
        $this->smarty->assign('flag', "ByVehicle");
        $this->smarty->assign('session', $this->session);
        $this->smarty->assign('titulo', 'Comentarios');
        $this->smarty->display('templates/tplComments/commentsByVehicle.tpl');
    }

    public function showAllComments(){
        if ($this->session){
            $sessionRol = $_SESSION['ROL'];
            $this->smarty->assign('sessionRol', $sessionRol);
        }
        $this->smarty->assign('session', $this->session);
        $this->smarty->assign('id', ''); 
        $this->smarty->assign('flag', "All");
        $this->smarty->assign('titulo', 'Comentarios');
        $this->smarty->display('templates/tplComments/allComments.tpl');
    }

    public function addComment($id){
        if ($this->session){
            $sessionRol = $_SESSION['ROL'];
            $this->smarty->assign('sessionRol', $sessionRol);
        }
        $this->smarty->assign('id', $id);
        $this->smarty->assign('flag', "Add");
        $this->smarty->assign('idUsuario', $_SESSION['ID_USUARIO']);
        $this->smarty->assign('session', $this->session);
        $this->smarty->assign('titulo', 'Comentarios');
        $this->smarty->display('templates/tplComments/addComment.tpl');
    }
}