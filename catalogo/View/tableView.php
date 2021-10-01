<?php

include_once "libs/smarty-3.1.39/libs/Smarty.class.php";

class TableView{
    
    private $smarty;

    public function __construct(){
        $this->smarty = new Smarty();
    }

    function viewHome(){
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

    function editVehiculo($vehiculo,$categorias){
        $vehiculos = [];
        foreach ($vehiculo as $car) {
            array_push($vehiculos, $car);
        }
        $this->smarty->assign('categorias', $categorias);
        $this->smarty->assign('tituloEdit','Editar item');
        $this->smarty->assign('vehiculos', $vehiculos);
        $this->smarty->display('./templates/editVehiculo.tpl');
    }
    
    function addNewVehiculo($vehiculos, $categorias){
        $this->smarty->assign('texto1','Agregar nuevo vehiculo.');
        $this->smarty->assign('categorias',$categorias);
        $this->smarty->display('./templates/addNewVehiculo.tpl');
        $this->smarty->assign('vehiculos',$vehiculos);
    }

    function showMsje($errorMsje){
        $this->smarty->assign('texto1',$errorMsje);
        $this->smarty->display('./templates/showMsje.tpl');
    }

    function login(){
        $this->smarty->display('./templates/login.tpl');
    }

    function registro(){
        $this->smarty->display('./templates/registro.tpl');
    }

    function showCategorias($categorias){
        $catalogocat = [];
        foreach ($categorias as $categoria) {
            array_push($catalogocat, $categoria);
        }
        $this->smarty->assign('titulo','Categorias disponibles');
        $this->smarty->assign('categorias',$catalogocat);
        $this->smarty->display('./templates/viewCategorias.tpl');
    }

    function deleteCategoria($id_categoria){
        $this->smarty->assign('texto1','El item sera eliminado');
        $this->smarty->assign('texto2','¿Esta seguro?');
        $this->smarty->assign('dato',$id_categoria);
        $this->smarty->display('./templates/viewMensaje.tpl');
    }

    function editCategoria($categoria){
        $categorias = [];
        foreach ($categoria as $car) {
            array_push($categorias, $car);
        }
        $this->smarty->assign('tituloEdit','Editar Categoria');
        $this->smarty->assign('categorias',$categorias);
        $this->smarty->display('./templates/editCategoria.tpl');
    }

    function addNewCategoria($categorias){
        $this->smarty->assign('texto1','Agregar nueva categoria.');
        $this->smarty->assign('categorias',$categorias);
        $this->smarty->display('./templates/addNewCategoria.tpl');
        $this->smarty->assign('categorias',$categorias);
    }
}