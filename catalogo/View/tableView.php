<?php

include_once "libs/smarty-3.1.39/libs/Smarty.class.php";

class TableView{
    
    private $smarty;

    public function __construct(){
        $this->smarty = new Smarty();
    }

    function viewHome(){
        //$this->smarty->assign('titulo', 'Catalogo de Vehiculos 2021');
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
        $detalle = [];
        foreach ($detalles as $car) {
            array_push($detalle, $car);
        }
        $this->smarty->assign('tituloDetalle','Detalles');
        $this->smarty->assign('detalles',$detalle);
        $this->smarty->display('./templates/viewDetalles.tpl');
    }

    function deleteVehiculo($id_vehiculo){
        $this->smarty->assign('texto1','El item sera eliminado');
        $this->smarty->assign('texto2','¿Esta seguro?');
        $this->smarty->assign('dato',$id_vehiculo);
        $this->smarty->display('./templates/viewMensaje.tpl');
    }

    function editVehiculo($vehiculo,$categorias){
        $vehiculo = [];
        foreach ($vehiculo as $car) {
            array_push($vehiculo, $car);
        }
        $this->smarty->assign('categorias',$categorias);
        $this->smarty->assign('tituloEdit','Editar item');
        $this->smarty->assign('vehiculos',$vehiculo);
        $this->smarty->display('./templates/editVehiculo.tpl');
    }


    function addNewVehiculo($categorias){
        $this->smarty->assign('texto1','Agregar nuevo vehiculo.');
        $this->smarty->assign('categorias',$categorias);
        $this->smarty->display('./templates/addNewVehiculo.tpl');
    }
}