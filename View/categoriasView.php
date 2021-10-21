<?php

include_once "libs/smarty-3.1.39/libs/Smarty.class.php";
include_once "./Helpers/loginHelpers.php";

class CategoriasView{
    // se declaran la variables de clase 
    private $smarty;
    private $sessionInitiated;

    // se instancian las clases incluidas
    public function __construct(){
        $this->smarty = new Smarty();
        $this->sessionInitiated = new LoginHelpers();
    }

    // funcion encargada de renderizar el listado de categorias
    public function showCategorias($categorias){
        $catalogocat = [];
        foreach ($categorias as $categoria) {
            array_push($catalogocat, $categoria);
        }
        $this->smarty->assign('titulo','Categorias disponibles');
        $this->smarty->assign('categorias',$catalogocat);
        $this->smarty->assign('session', $this->sessionInitiated->sessionStarted());
        if (isset($_SESSION['EMAIL']))
            $this->smarty->assign('rol', $_SESSION['ROL']);
        else
            $this->smarty->assign('rol', 0);
        $this->smarty->display('templates/tplCategorias/viewCategorias.tpl');
    }

    // funcion encargada de el modal editCategoria
    public function editCategoria($categoria){
        $categorias = [];
        foreach ($categoria as $car) {
            array_push($categorias, $car);
        }
        $this->smarty->assign('tituloEdit','Editar Categoria');
        $this->smarty->assign('categorias',$categorias);
        $this->smarty->display('templates/tplCatergorias/editCategoria.tpl');
    }

    // funcion encargada de el modal addCategoria
    public function addNewCategoria($categorias){
        $this->smarty->assign('texto1','Agregar nueva categoria.');
        $this->smarty->assign('categorias',$categorias);
        $this->smarty->display('templates/tplCategorias/addNewCategoria.tpl');
        $this->smarty->assign('categorias',$categorias);
    }

    // funcion encargada de mostrar los mensajes de error
    public function showMsje($rama, $errorMsje){
        $this->smarty->assign('rama', $rama);
        $this->smarty->assign('texto1',$errorMsje);
        $this->smarty->display('templates/tplGeneral/showMsje.tpl');
    }
}