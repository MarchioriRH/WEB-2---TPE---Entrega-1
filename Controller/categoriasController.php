<?php

include_once "./View/CategoriasView.php";
include_once "./Model/CategoriasModel.php";
include_once "GeneralController.php";
const RAMACAT = "categorias";
const RAMADELCAT = "eliminarCategoria";


class CategoriasController{
    
    // se declaran las variables que se utilizan en la clase
    private $view;
    private $model;
    private $categorias;
    private $generalView;
    private $loginHelper;
    private $pagina;
    
    // se istancian las distintas clases
    public function __construct(){
        $this->view = new CategoriasView();
        $this->generalView = new GeneralView();
        $this->model = new CategoriasModel();
        $this->loginHelper = new LoginHelpers();
        if (isset($_GET['pagina'])){
            $this->pagina = $_GET['pagina'];
        }else{
            $this->pagina = 1;
        }
     }


     // funcion encargada de solicitar al view la funcion showCategorias
    public function showCategorias(){
        $this->categorias = $this->model->getCategoriasDB();
        $this->view->showCategorias($this->categorias);
    }

    // funcion creada para mostrar el modal de advertencia antes de borrar una categoria
    public function deleteCategoria($idCategoria){
        if ($this->loginHelper->sessionStarted() && $_SESSION['ROL'] == 1){
            $categoria = $this->model->getDetallesCategoriaDB($idCategoria);
            $tipo = $categoria->tipo;
            $this->categorias = $this->model->getCategoriasDB();
            $this->generalView->showMsje(RAMADELCAT, "La categoria $tipo, y todos los items asociados, seran eliminados de la base de datos.\n ¿Esta Seguro?", $idCategoria);
        } else
            $this->generalView->showMsje(RAMAFORBIDDEN, "403 - Forbidden", null, null, $this->pagina);
        $this->view->showCategorias($this->categorias);
    }

    // funcion encargada de solicitar al model la funcion deletecategoriaDB
    public function deleteCategoriaDB($id_categoria){
        if ($this->loginHelper->sessionStarted() && $_SESSION['ROL'] == 1)
            $this->model->deleteCategoriaDB($id_categoria);
        else
            $this->generalView->showMsje(RAMAFORBIDDEN, "403 - Forbidden", null, null, $this->pagina);
        header('Location: '.BASE_URL.'verCatalogoCategoria');
    }

    // funcion que se encarga de llevar a cabo todo el proceso de la edicion de las categorias
    public function editCategoria($id_categoria){
        $this->categorias = $this->model->getCategoriasDB();
        if ($this->loginHelper->sessionStarted() && $_SESSION['ROL'] == 1){
            $categoria = $this->model->getDetallesCategoriaDB($id_categoria);
            $this->view->editCategoria($categoria);
        } else
            $this->generalView->showMsje(RAMAFORBIDDEN, "403 - Forbidden", null, null, $this->pagina);
        $this->view->showCategorias($this->categorias);
    }

    // funcion encargada de llamar a la funcion de model encargada de la edicion de la DB de categorias
    public function editCategoriaDB($id){
        if ($this->loginHelper->sessionStarted() && $_SESSION['ROL'] == 1)
            $this->model->editCategoriaDB($id, $_POST['tipo']);
        else
            $this->generalView->showMsje(RAMAFORBIDDEN, "403 - Forbidden", null, null, $this->pagina);
        header('Location: '.BASE_URL.'verCatalogoCategoria');
    }

    // funcion encargada de llamar a las respectivas funciones para llevar a cabo un agregado de categoria
    public function addNewCategoria(){
        $this->categorias = $this->model->getCategoriasDB();
        if ($this->loginHelper->sessionStarted() && $_SESSION['ROL'] == 1)
            $this->view->showCategorias($this->categorias);
        else
            $this->generalView->showMsje(RAMAFORBIDDEN, "403 - Forbidden", null, null, $this->pagina);
        $this->view->addNewCategoria($this->categorias);
    }

    // funcion que lleva a cabo la insercion de una nueva categoria en la DB
    public function insertNewCategoriaDB(){
        $this->categorias = $this->model->getCategoriasDB();
        if ($this->loginHelper->sessionStarted() && $_SESSION['ROL'] == 1){
            if (!empty($_POST['tipo'])){
                $this->model->addNewCategoriaDB($_POST['tipo']);
                header('Location: '.BASE_URL.'verCatalogoCategoria');
            } else {
                $this->generalView->showMsje(RAMACAT, "ERROR: faltan datos.");
                $this->view->showCategorias($this->categorias);
            } 
        } else {
            $this->generalView->showMsje(RAMAFORBIDDEN, "403 - Forbidden", null, null, $this->pagina);
        }
    }
}