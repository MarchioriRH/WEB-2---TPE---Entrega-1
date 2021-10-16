<?php

include_once "./View/vehiculosView.php";
include_once "./Model/vehiculosModel.php";
include_once "generalController.php";

class VehiculosController{
    
    // se crean las variables que se van a usar en la clase
    private $vehiculosView;
    private $vehiculosModel;
    private $vehiculos;
    private $categorias;
    private $generalView;
    private $categoriasModel;
    private $loginHelper;

    // se instancian las clases a utilizar y se cargan los arreglos de vehiculos y categorias
    public function __construct(){
        $this->vehiculosView = new VehiculosView();
        $this->vehiculosModel = new VehiculosModel();
        $this->generalView = new GeneralView();
        $this->categoriasModel = new CategoriasModel();
        $this->loginHelper = new LoginHelpers();
    }
   
    // funcion encargada de mostar el listado de items disponibles
    public function showVehiculos(){
        $this->vehiculos = $this->vehiculosModel->getVehiculosDB();
        $this->vehiculosView->showVehiculos($this->vehiculos);
    }

    // dada una categoria esta funcion envia a renderizar el listado de los items
    // que cumplen con esa condicion
    public function showVehiculosPorCategoria($id_cat){
        $vehiculosporcat = $this->vehiculosModel->getVehiculosPorCatDB($id_cat);
        $this->vehiculosView->showVehiculos($vehiculosporcat, $id_cat);
    }

    // funcion para renderizar los detalles de un item especifico, se despliega en un modal
    public function showDetallesVehiculo($id_vehiculo){
        $this->vehiculos = $this->vehiculosModel->getVehiculosDB();
        // se obtiene el item seleccionado del listado de vehiculos de la BBDD
        $detalles = $this->vehiculosModel->getDetallesVehiculoDB($id_vehiculo);
        // se renderiza el modal de detalles
        $this->vehiculosView->showDetallesVehiculo($detalles);
        // se carga como fondo el listado de vehiculos
        $this->vehiculosView->showVehiculos($this->vehiculos);
    }

    // funcion para renderizar los detalles de un item especifico, se despliega en un modal
    public function showDetallesVehiculoCat($id_vehiculo){
        // se obtiene el item seleccionado del listado de vehiculos de la BBDD
        $detalles = $this->vehiculosModel->getDetallesVehiculoDB($id_vehiculo);
        $id_categoria = $detalles[0]->id_categoria;
        // se renderiza el modal de detalles
        $this->vehiculosView->showDetallesVehiculo($detalles, $id_categoria);
        // se carga como fondo el listado de vehiculos
        $this->showVehiculosPorCategoria($id_categoria);
    }

    // funcion encargada de hacer el llamado para eliminar un item de la BBDD
    public function deleteVehiculo($id_vehiculo){
        if ($this->loginHelper->sessionStarted() && $_SESSION['ROL'] == 1)
            $this->vehiculosModel->deleteVehiculoDB($id_vehiculo);
        header('Location: '.BASE_URL.'verCatalogoVehiculos');
    }

    // funcion encargada de hacer el llamado para eliminar un item de la BBDD
    // desde la vista por categoria
    public function deleteVehiculoDesdeCategoria($id_vehiculo){
        $detalles = $this->vehiculosModel->getDetallesVehiculoDB($id_vehiculo);
        if ($this->loginHelper->sessionStarted() && $_SESSION['ROL'] == 1)
            $this->vehiculosModel->deleteVehiculoDB($id_vehiculo);
        $id_categoria = $detalles[0]->id_categoria;
        $this->showVehiculosPorCategoria($id_categoria);
    }

    // funcion para editar un item
    public function editVehiculo($id_vehiculo){
        $this->vehiculos = $this->vehiculosModel->getVehiculosDB();
        $this->categorias = $this->categoriasModel->getCategoriasDB();
        // se selecciona de la BBDD el item a editar
        if ($this->loginHelper->sessionStarted() && $_SESSION['ROL'] == 1)
            $vehiculo = $this->vehiculosModel->getDetallesVehiculoDB($id_vehiculo);
        // se renderizan los datos en un modal para su edicion
        $this->vehiculosView->editVehiculo($vehiculo, $this->categorias);
        // se carga como fondo el listado de vehiculos
        $this->vehiculosView->showVehiculos($this->vehiculos);
    }

    // funcion para editar un item desde la vista por Categoria
    public function editarVehiculoEnCategoria($id_vehiculo){
        $this->categorias = $this->categoriasModel->getCategoriasDB();
        // se selecciona de la BBDD el item a editar
        if ($this->loginHelper->sessionStarted() && $_SESSION['ROL'] == 1)
            $vehiculo = $this->vehiculosModel->getDetallesVehiculoDB($id_vehiculo);
        // se obtiene el valor de la categoria a la que pertenece el item
        $id_categoria = $vehiculo[0]->id_categoria;
        // se renderizan los datos en un modal para su edicion
        $this->vehiculosView->editVehiculo($vehiculo, $this->categorias, $id_categoria);
        // se carga como fondo el listado de vehiculos filtrados por categoria
        $this->showVehiculosPorCategoria($id_categoria);
    }

    // funcion encargada de enviar los datos cargados en el modal de edicion
    // al model para cargar en la BBDD
    public function editVehiculoDB($id){
        if ($this->loginHelper->sessionStarted() && $_SESSION['ROL'] == 1)
            $this->vehiculosModel->editVehiculoDB($id, $_POST['tipo'], $_POST['marca'], $_POST['modelo'], $_POST['anio'], $_POST['kms'], $_POST['precio']);
        if (($_POST['id_categoria']) != null)
            $this->showVehiculosPorCategoria($_POST['id_categoria']);
        else
            header('Location: '.BASE_URL.'verCatalogoVehiculos');
    }

    // funcion encargadad de la carga de un nuevo item
    public function addNewVehiculo(){
        $this->vehiculos = $this->vehiculosModel->getVehiculosDB();
        $this->categorias = $this->categoriasModel->getCategoriasDB();
        // se muestra el listado de items de fondo
        if ($this->loginHelper->sessionStarted() && $_SESSION['ROL'] == 1)
            $this->vehiculosView->showVehiculos($this->vehiculos);
        // se llama renderiza el modal que contiene el formulario de carga de un nuevo item
        $this->vehiculosView->addNewVehiculo($this->vehiculos,$this->categorias);
    }

    // funcion encargada de insertar un nuevo item en la BBDD
    public function insertNewVehiculoDB(){
        $this->vehiculos = $this->vehiculosModel->getVehiculosDB();
        // si el formulario NO esta vacio envia los datos al Model para cargarlos en la BBDD
        if ($this->loginHelper->sessionStarted() && $_SESSION['ROL'] == 1){
            if (!empty($_POST['marca']) || !empty($_POST['modelo']) || !empty($_POST['anio']) || !empty($_POST['kms']) || !empty($_POST['precio'])){
                $this->vehiculosModel->addNewVehiculoDB($_POST['tipo'], $_POST['marca'], $_POST['modelo'], $_POST['anio'], $_POST['kms'], $_POST['precio']);
                header('Location: '.BASE_URL.'verCatalogoVehiculos');
            } else {
                // si el formulario esta vacio o incompleto muestra un mensaje de error y vuelve al
                // listado de items
                $this->generalView->showMsje("ERROR - Los campos no pueden estar vacios.");
                $this->vehiculosView->showVehiculos($this->vehiculos);
            } 
        } else {
            header('Location: '.BASE_URL.'verCatalogoVehiculos');
        }
    }
}