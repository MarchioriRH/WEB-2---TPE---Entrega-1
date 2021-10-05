<?php

include_once "libs/smarty-3.1.39/libs/Smarty.class.php";
include_once "./Helpers/loginHelpers.php";


class VehiculosView{
    
    private $smarty;
    private $sessionInitiated;

    public function __construct(){
        $this->smarty = new Smarty();
        $this->sessionInitiated = new LoginHelpers();
    }

    public function showVehiculos($vehiculos){
        $catalogo = [];
        foreach ($vehiculos as $vehiculo) {
            array_push($catalogo, $vehiculo);
        }
        $this->smarty->assign('titulo','Vehiculos disponibles');
        $this->smarty->assign('vehiculos',$catalogo);
        $this->smarty->assign('session', $this->sessionInitiated->sessionStarted());
        if (isset($_SESSION['EMAIL']))
            $this->smarty->assign('rol', $_SESSION['ROL']);
        else
            $this->smarty->assign('rol', 0);
        $this->smarty->display('./templates/viewCatalogo.tpl');
    }

    public function showDetallesVehiculo($detalles){
        $detalle = [];
        foreach ($detalles as $car) {
            array_push($detalle, $car);
        }
        $this->smarty->assign('tituloDetalle','Detalles');
        $this->smarty->assign('detalles',$detalle);
        $this->smarty->display('./templates/viewDetalles.tpl');
    }

    public function editVehiculo($vehiculo,$categorias){
        $vehiculos = [];
        foreach ($vehiculo as $car) {
            array_push($vehiculos, $car);
        }
        $this->smarty->assign('categorias', $categorias);
        $this->smarty->assign('tituloEdit','Editar item');
        $this->smarty->assign('vehiculos', $vehiculos);
        $this->smarty->display('./templates/editVehiculo.tpl');
    }
    
    public function addNewVehiculo($vehiculos, $categorias){
        $this->smarty->assign('texto1','Agregar nuevo vehiculo.');
        $this->smarty->assign('categorias',$categorias);
        $this->smarty->display('./templates/addNewVehiculo.tpl');
        $this->smarty->assign('vehiculos',$vehiculos);
    }

    
}