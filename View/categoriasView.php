<?php

include_once "libs/smarty-3.1.39/libs/Smarty.class.php";
include_once "./Helpers/LoginHelpers.php";

class CategoriasView{
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

    // funcion encargada de renderizar el listado de categorias
    public function showCategorias($categorias){
        if ($this->session){
            $sessionRol = $_SESSION['ROL'];
            $this->smarty->assign('sessionRol', $sessionRol);
        }
        $catalogocat = [];
        foreach ($categorias as $categoria) {
            array_push($catalogocat, $categoria);
        }
        $this->smarty->assign('titulo','Categorias disponibles');
        $this->smarty->assign('categorias',$catalogocat);
        $this->smarty->assign('session', $this->session);
        if (isset($_SESSION['EMAIL']))
            $this->smarty->assign('rol', $_SESSION['ROL']);
        else
            $this->smarty->assign('rol', 0);
        $this->smarty->display('templates/tplCategorias/viewCategorias.tpl');
    }

    // funcion encargada de el modal editCategoria
    public function editCategoria($categoria){
        if ($this->session){
            $sessionRol = $_SESSION['ROL'];
            $this->smarty->assign('sessionRol', $sessionRol);
        }
        $this->smarty->assign('categoria',$categoria);
        $this->smarty->assign('tituloEdit','Editar Categoria');
        $this->smarty->display('templates/tplCategorias/editCategoria.tpl');
    }

    // funcion encargada de el modal addCategoria
    public function addNewCategoria($categorias){
        if ($this->session){
            $sessionRol = $_SESSION['ROL'];
            $this->smarty->assign('sessionRol', $sessionRol);
        }
        $this->smarty->assign('texto1','Agregar nueva categoria.');
        $this->smarty->assign('categorias',$categorias);
        $this->smarty->display('templates/tplCategorias/addNewCategoria.tpl');
        $this->smarty->assign('categorias',$categorias);
    }

}