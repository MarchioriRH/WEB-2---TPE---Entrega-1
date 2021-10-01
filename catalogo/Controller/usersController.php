<?php   
    
include_once "./Model/usersModel.php";
include_once "./View/usersView.php";
include_once "./View/categoriasView.php";
include_once "./View/generalView.php";
include_once "./Helpers/loginHelpers.php";

const KEYWORD = 'yourcar';

class UsersController {   

    private $usersView;
    private $view;
    private $model;
    private $loginHelper;
   

    function __construct(){
        $this->usersView = new UsersView();
        $this->view = new GeneralView();
        $this->model = new UsersModel;
        $this->loginHelper = new LoginHelpers();
    }

    function login(){
        $this->usersView->login($this->loginHelper->sessionStarted());
    }

    function logOut(){
        $this->loginHelper->logOut();
    }

    function loginUsuarioDB(){
        if(!empty($_POST['mail']) && !empty($_POST['password'])){
            $userPassword = $_POST['password'];
            $userMail = $_POST['mail'];
            $user = $this->model->getUsuarioByMail($userMail);
            print_r($user);
            if (!empty($user) && password_verify($userPassword, $user->passwrd)){
                session_start();
                $_SESSION['EMAIL'] = $user->mail;
                $_SESSION['NOMBRE'] = $user->nombre;
                $_SESSION['ROL'] = $user->rol;
                $this->view->showMsje('Bienvenido '.$user->nombre.' '.$user->apellido.'.');
                $this->view->viewHome($this->loginHelper->sessionStarted());
            } else {
                $this->view->showMsje('ERROR - Usuario y/o contraseña incorrectos.');
                $this->view->viewHome($this->loginHelper->sessionStarted());
            }
        } else {
            $this->view->showMsje("ERROR - Los campos e-Mail y Password no pueden estar vacios.");
            $this->view->viewHome($this->loginHelper->sessionStarted());
        } 
    }
    
    function registro(){
        $this->usersView->registro($this->loginHelper->sessionStarted());
    }

    function registroNuevoUsuarioDB(){
        if(!empty($_POST['mail']) && !empty($_POST['password'])){
            $userMail = $_POST['mail'];
            $user = $this->model->getUsuarioByMail($userMail);
            if (empty($user)){
                $userPassword =  password_hash($_POST['password'], PASSWORD_BCRYPT);
                if ($_POST['keyword'] == KEYWORD)
                    $rol = 1;
                else
                    $rol = 0;
                $this->model->registroNuevoUsuarioDB($_POST ['mail'], $userPassword, $_POST ['nombre'], $_POST ['apellido'], $rol);
                $this->view->showMsje('Usuario '.$_POST['mail'].' registrado con exito.');
                $this->view->viewHome($this->loginHelper->sessionStarted());
            } else {
                $this->view->showMsje('ERROR - El mail '.$_POST['mail'].' ya se encuentra registrado.');
                $this->view->viewHome($this->loginHelper->sessionStarted());
            }
        } else {
            $this->view->showMsje("ERROR - Los campos e-Mail y Password no pueden estar vacios.");
            $this->view->viewHome($this->loginHelper->sessionStarted());
        } 
    }
}