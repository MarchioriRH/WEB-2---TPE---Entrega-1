<?php

include_once "libs/smarty-3.1.39/libs/Smarty.class.php";
include_once "./Helpers/LoginHelpers.php";

class VehiculosView{
    
    // se declaran la variables de clase
    private $smarty;
    private $sessionInitiated;
    private $session;

    // se instancian las clases incluidas
    public function __construct(){
        $this->smarty = new Smarty();
        $this->sessionInitiated = new LoginHelpers();
        $this->session = $this->sessionInitiated->sessionStarted();
    }

    // funcion encargada de renderizar el listado de vehiculos
    public function showVehiculos($vehiculos, $cantPags, $pagina, $id_cat = null){
        if ($this->session){
            $sessionRol = $_SESSION['ROL'];
            $this->smarty->assign('sessionRol', $sessionRol);
        }
        // se crea vacio el arreglo catalodo donde se almacenaran los datos traidos
        // desde la BBDD
        $catalogo = [];
        foreach ($vehiculos as $vehiculo) {
            array_push($catalogo, $vehiculo);
        }
        if ($catalogo == [])
            $pagina = 0;
        $this->smarty->assign('pagina', $pagina);
        $this->smarty->assign('cantPags', $cantPags);
        // se asigna el nombre titulo a la variable que se mostrara como titulo
        $this->smarty->assign('titulo','Vehiculos disponibles');
        // se asigna el nombre vehiculos al arreglo que contendra los datos a mostrar
        $this->smarty->assign('vehiculos',$catalogo);
        // se asigna el nombre session a la variable que indicara si la sesion esta iniciada
        $this->smarty->assign('session', $this->session);
        // se asigna como parametro el id de categoria para realizar comparaciones
        $this->smarty->assign('id_cat', $id_cat);
        // si la sesion esta iniciada, se asigna el nombre rol al valor de rol de usuario
        if ($this->session)//(isset($_SESSION['EMAIL']))
            $this->smarty->assign('rol', $_SESSION['ROL']);
        else
            // si no, por defecto el rol de usuario es 0.
            $this->smarty->assign('rol', 0);
        // se llama al template viewCatalogoVehiculos encargado de renderizar la tabla
        $this->smarty->display('templates/tplVehiculos/viewCatalogoVehiculos.tpl');
    }

    // funcion encargada de renderizar los detalles de un item especifico
    public function showDetallesVehiculo($detalles, $id_cat = null){
        if ($this->session){
            $sessionRol = $_SESSION['ROL'];
            $this->smarty->assign('sessionRol', $sessionRol);
        } else {
            $this->smarty->assign('sessionRol', -1);
        }
        // se asigna el nombre tituloDetalle al titulo para mostar
        $this->smarty->assign('tituloDetalle','Detalles');
        // se asigna al nombre detalles al array que contine los datos del item
        $this->smarty->assign('detalles',$detalles);
        $this->smarty->assign('id_cat', $id_cat);
        // se renderiza la ventana modal donde se muestran los detalles de un item
        $this->smarty->display('templates/tplVehiculos/viewDetalles.tpl');
    }

    // funcion que renderiza la ventana modal de edicion de un item
    public function editVehiculo($vehiculo, $categorias, $id_categoria = null){
        if ($this->session){
            $sessionRol = $_SESSION['ROL'];
            $this->smarty->assign('sessionRol', $sessionRol);
        }
        $this->smarty->assign('categorias', $categorias);
        $this->smarty->assign('tituloEdit','Editar item');
        $this->smarty->assign('vehiculo', $vehiculo);
        $this->smarty->assign('id_categoria', $id_categoria);
        $this->smarty->display('templates/tplVehiculos/editVehiculo.tpl');
    }
    
    // funcion engargada de renderizar la ventana modal para agregar un nuevo item
    public function addNewVehiculo($vehiculos, $categorias){
        if ($this->session){
            $sessionRol = $_SESSION['ROL'];
            $this->smarty->assign('sessionRol', $sessionRol);
        }
        $this->smarty->assign('texto1','Agregar nuevo vehiculo.');
        $this->smarty->assign('categorias',$categorias);
        $this->smarty->display('templates/tplVehiculos/addNewVehiculo.tpl');
        $this->smarty->assign('vehiculos',$vehiculos);
    }

}