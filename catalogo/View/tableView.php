<?php

include_once "libs/smarty-3.1.39/libs/Smarty.class.php";

class TableView{
    
    private $smarty;

    public function __construct(){
        $this->smarty = new Smarty();
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