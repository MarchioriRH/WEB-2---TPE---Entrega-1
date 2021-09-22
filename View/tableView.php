<?php

include_once "libs/smarty-3.1.39/libs/Smarty.class.php";

class TableView{
    
    private $smarty;

    public function __construct(){
        $this->smarty = new Smarty();
    }

    function viewHome(){
        $this->smarty->assign('titulo', 'Catalogo de Vehiculos 2021');
        $this->smarty->display('./templates/home.tpl');
    }

    function showVehiculos($vehiculos){
        $catalogo = [];
        foreach ($vehiculos as $vehiculo) {
            array_push($catalogo, $vehiculo);
        }
        $this->smarty->assign('titulo','Vehiculos disponibles');
        $this->smarty->assign('vehiculos',$catalogo);
        $this->smarty->display('./templates/viewCatalogo.tpl');
    }

    function showDetallesVehiculo($detalles){
        $vehiculo = [];
        foreach ($detalles as $car) {
            array_push($vehiculo, $car);
        }
        $this->smarty->assign('titulo','Detalles');
        $this->smarty->assign('vehiculos',$vehiculo);
        $this->smarty->display('./templates/viewDetalles.tpl');
    }
}