<?php   
    
include_once "./Model/usersModel.php";
include_once "./View/usersView.php";
include_once "./View/tableView.php";
include_once "./View/generalView.php";

class UsersController {   

    private $usersView;
    private $view;
    private $model;
    private $usuarios;

    function __construct(){
        $this->usersView = new UsersView();
        $this->view = new GeneralView();
        $this->model = new UsersModel;
        $this->usuarios = $this->model->getUsuariosDB();
    }

    function login(){
        $this->usersView->login();
    }

    function loginUsuarioDB(){
        if(!empty($_POST['mail']) && !empty($_POST['password'])){
            $userPassword = $_POST['password'];
            $userMail = $_POST['mail'];
            if ($this->compararClaveUsuario($userMail, $userPassword) == true){
                $this->view->showMsje('Bienvenido '.$_POST['mail'].'.');
                $this->view->viewHome();
            } else {
                $this->view->showMsje('ERROR - Usuario y/o contraseña incorrectos.');
                $this->view->viewHome();
            }
        } else {
            $this->view->showMsje("ERROR - Los campos e-Mail y Password no pueden estar vacios.");
            $this->view->viewHome();
        } 
    }

    function compararClaveUsuario($mail, $userPassword){
        foreach($this->usuarios as $usuario){
            if (($usuario->mail) == $mail)
                if (password_verify($userPassword, ($usuario->passwrd)))    
                    return true;
        }return false;
    }

    function registro(){
        $this->usersView->registro();
    }

    function buscarUsuario($mail){
        foreach($this->usuarios as $usuario){
            if (($usuario->mail) == $mail) 
                return true;
            else
                return false;
        }
    }

    function registroNuevoUsuarioDB(){
        $userEmail = $_POST['mail'];
        if(!empty($_POST['mail']) && !empty($_POST['password'])){
            if ($this->buscarUsuario($userEmail) == false){
                $userPassword =  password_hash($_POST['password'], PASSWORD_BCRYPT);
                $this->model->registroNuevoUsuarioDB($_POST ['mail'], $userPassword, $_POST ['nombre'], $_POST ['apellido']);
                $this->view->showMsje('Usuario '.$_POST['mail'].' registrado con exito.');
                $this->view->viewHome();
            } else {
                $this->view->showMsje('ERROR - El usuario '.$_POST['mail'].' ya se encuentra registrado.');
                $this->view->viewHome();
            }
        } else {
            $this->view->showMsje("ERROR - Los campos e-Mail y Password no pueden estar vacios.");
            $this->view->viewHome();
        } 
    }
}