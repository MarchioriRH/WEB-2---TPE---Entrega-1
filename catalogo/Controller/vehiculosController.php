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
    private $id_cat;

    // se instancian las clases a utilizar y se cargan los arreglos de vehiculos y categorias
    public function __construct(){
        $this->vehiculosView = new VehiculosView();
        $this->vehiculosModel = new VehiculosModel();
        $this->generalView = new GeneralView();
        $this->categoriasModel = new CategoriasModel();
        $this->categorias = $this->categoriasModel->getCategoriasDB();
        $this->vehiculos = $this->vehiculosModel->getVehiculosDB(); 
     
    }
   
    // funcion encargada de mostar el listado de items disponibles
    public function showVehiculos(){
        $this->vehiculosView->showVehiculos($this->vehiculos);
    }

    public function showVehiculosPorCategoria($id_cat){
        $vehiculosporcat = $this->vehiculosModel->getVehiculosPorCatDB($id_cat);
        $this->vehiculosView->showVehiculos($vehiculosporcat);
    }

    // funcion para renderizar los detalles de un item especifico, se despliega en un modal
    public function showDetallesVehiculo($id_vehiculo){
        // se obtiene el item seleccionado del listado de vehiculos de la BBDD
        $detalles = $this->vehiculosModel->getDetallesVehiculoDB($id_vehiculo);
        // se renderiza el modal de detalles
        $this->vehiculosView->showDetallesVehiculo($detalles);
        // se carga como fondo el listado de vehiculos
        $this->vehiculosView->showVehiculos($this->vehiculos);
    }

    // funcion encargada de hacer el llamado para eliminar un item de la BBDD
    public function deleteVehiculo($id_vehiculo){
        $this->vehiculosModel->deleteVehiculoDB($id_vehiculo);
        header('Location: '.BASE_URL.'verCatalogoVehiculos');
    }

    // funcion para editar un item
    public function editVehiculo($id_vehiculo){
        // se selecciona de la BBDD el item a editar
        $vehiculo = $this->vehiculosModel->getDetallesVehiculoDB($id_vehiculo);
        // se renderizan los datos en un modal para su edicion
        $this->vehiculosView->editVehiculo($vehiculo,$this->categorias);
        // se carga como fondo el listado de vehiculos
        $this->vehiculosView->showVehiculos($this->vehiculos);
    }

    // funcion encargada de enviar los datos cargados en el modal de edicion
    // al model para cargar en la BBDD
    public function editVehiculoDB($id){
        $this->vehiculosModel->editVehiculoDB($id, $_POST['tipo'], $_POST['marca'], $_POST['modelo'], $_POST['anio'], $_POST['kms'], $_POST['precio']);
        header('Location: '.BASE_URL.'verCatalogoVehiculos');
    }

    // funcion encargadad de la carga de un nuevo item
    public function addNewVehiculo(){
        // se muestra el listado de items de fondo
        $this->vehiculosView->showVehiculos($this->vehiculos);
        // se llama renderiza el modal que contiene el formulario de carga de un nuevo item
        $this->vehiculosView->addNewVehiculo($this->vehiculos,$this->categorias);
    }

    // funcion encargada de insertar un nuevo item en la BBDD
    public function insertNewVehiculoDB(){
        // si el formulario NO esta vacio envia los datos al Model para cargarlos en la BBDD
        if (!empty($_POST['marca']) || !empty($_POST['modelo']) || !empty($_POST['anio']) || !empty($_POST['kms']) || !empty($_POST['precio'])){
            $this->vehiculosModel->addNewVehiculoDB($_POST['tipo'], $_POST['marca'], $_POST['modelo'], $_POST['anio'], $_POST['kms'], $_POST['precio']);
            header('Location: '.BASE_URL.'verCatalogoVehiculos');
        } else {
            // si el formulario esta vacio o incompleto muestra un mensaje de error y vuelve al
            // listado de items
            $this->generalView->showMsje("ERROR - Los campos no pueden estar vacios.");
            $this->vehiculosView->showVehiculos($this->vehiculos);
        } 
    }
}