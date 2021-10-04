<?php   
    
include_once "./Model/usersModel.php";
include_once "./View/usersView.php";
include_once "./View/categoriasView.php";
include_once "./View/generalView.php";
include_once "./Helpers/loginHelpers.php";

const KEYWORD = 'yourcar';

class UsersController {   

    // se declaran variables de la funcion
    private $usersView;
    private $generalView;
    private $userModel;
    private $loginHelper;
   
    // se istancian las distintas clases
    public function __construct(){
        $this->usersView = new UsersView();
        $this->generalView = new GeneralView();
        $this->userModel = new UsersModel;
        $this->loginHelper = new LoginHelpers();
    }

    // funcion encargada de llamar a la del view que renderiza el modal de login
    public function login(){
        $this->usersView->login($this->loginHelper->sessionStarted());
    }

    // funcion encargada del logout del usuario activo
    public function logOut(){
        $this->loginHelper->logOut();
    }

    // funcion que encargada del login
    public function loginUsuarioDB(){
        // si los datos traidos por los inputs que se cargan en el modal de loguin, realiza
        // la verificacion del usuario en la BBDD
        if(!empty($_POST['mail']) && !empty($_POST['password'])){
            $userPassword = $_POST['password'];
            $userMail = $_POST['mail'];
            // se traen los datos del usuario desde la BBDD
            $user = $this->userModel->getUsuarioByMail($userMail);
            // si el usuario esta registrado y la clave ingresada coincide se inicia la sesion
            if (!empty($user) && password_verify($userPassword, $user->passwrd)){
                session_start();
                $_SESSION['EMAIL'] = $user->mail;
                $_SESSION['ROL'] = $user->rol;
                $this->generalView->showMsje('Bienvenido '.$user->nombre.' '.$user->apellido.'.');
            } else {
                // si los datos son incorrectos se muestra mensaje de error
                $this->generalView->showMsje('ERROR - Usuario y/o contraseña incorrectos.');
            }
        } else {
            // si los campos del input de login estan vacios, se muestra el mensaje de error
            $this->generalView->showMsje("ERROR - Los campos e-Mail y Password no pueden estar vacios.");
        } 
        // una vez iniciada la sesion o no, se muestra el home
        $this->generalView->viewHome($this->loginHelper->sessionStarted());
    }
    
    // funcion encargada de llamar al view encargado de renderizar el modal de registro
    public function registro(){
        $this->usersView->registro($this->loginHelper->sessionStarted());
    }

    // funcion que registra un nuevo usuario en la BBDD de usuarios
    public function registroNuevoUsuarioDB(){
        // se verifica que los datos del input no esten vacios, por lo menos email y clave tienen que estar
        if(!empty($_POST['mail']) && !empty($_POST['password'])){
            $userMail = $_POST['mail'];
            // se busca el email ingresado en la BBDD
            $user = $this->userModel->getUsuarioByMail($userMail);
            // si no esta registrado, se lo carga en la BBDD
            if (empty($user)){
                // si la palabra clave esta seteada, el usuario se registra como admin = 1
                $userPassword =  password_hash($_POST['password'], PASSWORD_BCRYPT);
                if ($_POST['keyword'] == KEYWORD)
                    $rol = 1;
                else
                    $rol = 0;
                // se envian los datos al model para registrarlos en la BBDD
                $this->userModel->registroNuevoUsuarioDB($_POST ['mail'], $userPassword, $_POST ['nombre'], $_POST ['apellido'], $rol);
                // se muestra mensaje de exito en el registro
                $this->generalView->showMsje('Usuario '.$_POST['mail'].' registrado con exito.');               
            } else {
                // si el mail se encuentra en la BBDD se muestra mensaje de usuario registrado
                $this->generalView->showMsje('ERROR - El mail '.$_POST['mail'].' ya se encuentra registrado.');
            }
        } else {
            // si los campos mail y/o password estan vacios se muestra un mensaje de error
            $this->generalView->showMsje("ERROR - Los campos e-Mail y Password no pueden estar vacios.");
        } 
        // se muestra el home, con sesion iniciada o no
        $this->generalView->viewHome($this->loginHelper->sessionStarted());
    }
}