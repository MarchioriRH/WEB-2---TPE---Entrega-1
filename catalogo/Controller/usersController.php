<?php   
    
include_once "./Model/usersModel.php";
include_once "./View/usersView.php";
include_once "./View/tableView.php";
include_once "./View/generalView.php";

class UsersController {   

    private $usersView;
    private $view;
    private $model;

    function __construct(){
        $this->usersView = new UsersView();
        $this->view = new GeneralView();
        $this->model = new UsersModel;
    }

    function login(){
        $this->usersView->login();
    }

    function loginUsuarioDB(){
        if(!empty($_POST['mail']) && !empty($_POST['password'])){
            $userPassword = $_POST['password'];
            $userMail = $_POST['mail'];
            $user = $this->model->getUsuarioByMail($userMail);
            if (!empty($user) && password_verify($userPassword, $user->passwrd)){
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
    
    function registro(){
        $this->usersView->registro();
    }

    function registroNuevoUsuarioDB(){
        if(!empty($_POST['mail']) && !empty($_POST['password'])){
            $userMail = $_POST['mail'];
            $user = $this->model->getUsuarioByMail($userMail);
            if (empty($user)){
                $userPassword =  password_hash($_POST['password'], PASSWORD_BCRYPT);
                $this->model->registroNuevoUsuarioDB($_POST ['mail'], $userPassword, $_POST ['nombre'], $_POST ['apellido']);
                $this->view->showMsje('Usuario '.$_POST['mail'].' registrado con exito.');
                $this->view->viewHome();
            } else {
                $this->view->showMsje('ERROR - El mail '.$_POST['mail'].' ya se encuentra registrado.');
                $this->view->viewHome();
            }
        } else {
            $this->view->showMsje("ERROR - Los campos e-Mail y Password no pueden estar vacios.");
            $this->view->viewHome();
        } 
    }
}