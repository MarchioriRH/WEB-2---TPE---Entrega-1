<?php

include_once "./View/VehiculosView.php";
include_once "./Model/VehiculosModel.php";
include_once "GeneralController.php";
include_once "Helpers/paginationHelper.php";
include_once "Model/apiCommentsModel.php";
const RAMAVE = "vehiculos";
const RAMADELVE = "eliminarVehiculo";
const RAMADELVECAT = "eliminarVehiculoCat";
const RAMAFORBIDDEN = "forbidden";
const RAMAFINDCONTENT = "inputNull";
const ITEMS_PAGINA = 6;

class VehiculosController{
    
    // se crean las variables que se van a usar en la clase
    private $vehiculosView;
    private $vehiculosModel;
    private $vehiculos;
    private $categorias;
    private $generalView;
    private $categoriasModel;
    private $loginHelper;
    private $paginationHelper;
    private $pagina;
    private $commentsModel;
    private $limit;
    
    

    // se instancian las clases a utilizar y se cargan los arreglos de vehiculos y categorias
    public function __construct(){
        $this->commentsModel = new ApiCommentsModel();
        $this->vehiculosView = new VehiculosView();
        $this->vehiculosModel = new VehiculosModel();
        $this->generalView = new GeneralView();
        $this->categoriasModel = new CategoriasModel();
        $this->loginHelper = new LoginHelpers();
        $this->paginationHelper = new PaginationHelper();
        $this->limit = ITEMS_PAGINA;
        if (isset($_GET['pagina']))
            $this->pagina = $_GET['pagina'];
        else
            $this->pagina = 1;
    }
   
    // funcion encargada de mostar el listado de items disponibles
    public function showVehiculos(){
        $offset = $this->paginationHelper->getOffset();
        $cantPags = $this->paginationHelper->getCantPags();       
        $vehiculos = $this->vehiculos = $this->vehiculosModel->getVehiculosDB($this->limit, $offset);
        $this->vehiculosView->showVehiculos($vehiculos, $cantPags, $this->pagina);
    }

    // dada una categoria esta funcion envia a renderizar el listado de los items
    // que cumplen con esa condicion
    public function showVehiculosPorCategoria($id_cat){
        $vehiculosporcat = [];
        $vehiculosporcat = $this->vehiculosModel->getVehiculosPorCatDB($id_cat, $this->limit, $this->paginationHelper->getOffset());
        $cantPags = $this->paginationHelper->getCantPags($id_cat);        
        $this->vehiculosView->showVehiculos($vehiculosporcat, $cantPags, $this->pagina, $id_cat);
    }

    // funcion para renderizar los detalles de un item especifico, se despliega en un modal
    public function showDetallesVehiculo($id_vehiculo){
        $this->showVehiculos();
        // se obtiene el item seleccionado del listado de vehiculos de la BBDD
        $detalles = $this->vehiculosModel->getDetallesVehiculoDB($id_vehiculo);
        // se obtiene la imagen del item seleccionado
        $imagen = $this->vehiculosModel->getImagenVehiculoDB($id_vehiculo);
        // se renderiza el modal de detalles
        $this->vehiculosView->showDetallesVehiculo($detalles, null, $imagen->pathh, $this->pagina);        
    }

    // funcion para renderizar los detalles de un item especifico, se despliega en un modal
    public function showDetallesVehiculoCat($id_vehiculo){
        // se obtiene el item seleccionado del listado de vehiculos de la BBDD
        $detalles = $this->vehiculosModel->getDetallesVehiculoDB($id_vehiculo);
        $id_categoria = $detalles->id_categoria;
        $linkImagen = $this->vehiculosModel->getImagenVehiculoDB($id_vehiculo);
        if($linkImagen)
            // se renderiza el modal de detalles
            $this->vehiculosView->showDetallesVehiculo($detalles, $id_categoria, $linkImagen->pathh, $this->pagina);
        else
            $this->vehiculosView->showDetallesVehiculo($detalles, $id_categoria, null, $this->pagina);
        // se carga como fondo el listado de vehiculos
        $this->showVehiculosPorCategoria($id_categoria);
    }

    // funcion encargada de hacer el llamado a la vista para mostrar la confirmacion de la eliminacion
    // de un item desde la vista por vehiculos.
    public function deleteVehiculo($id_Vehiculo){
        $vehiculo = $this->vehiculosModel->getDetallesVehiculoDB($id_Vehiculo);
        $marca = $vehiculo->marca;
        $modelo = $vehiculo->modelo;
        $id_cat = null;
        if ($this->loginHelper->sessionStarted() && $_SESSION['ROL'] == 1)
            $this->generalView->showMsje(RAMADELVE, "El vehiculo $marca, $modelo, sera eliminado de la base de datos.\r\n ¿Esta seguro?", $id_Vehiculo, $id_cat , $this->pagina);
        else
            $this->generalView->showMsje(RAMAFORBIDDEN, "403 - Forbidden", null, null, $this->pagina);
        $this->showVehiculos();   
    }

    // funcion encargada de hacer el llamado para eliminar un item de la BBDD
    public function deleteVehiculoDB($id_vehiculo){
        if ($this->loginHelper->sessionStarted() && $_SESSION['ROL'] == 1){
            $linkImagen = $this->vehiculosModel->getImagenVehiculoDB($id_vehiculo);
            if($linkImagen != null){
                $link = $linkImagen->pathh;
                unlink($link);
                $this->vehiculosModel->deleteImagenpathh($id_vehiculo);
            }
            $this->commentsModel->deleteAllComments($id_vehiculo);
            $this->vehiculosModel->deleteVehiculoDB($id_vehiculo);
        }
        else
            $this->generalView->showMsje(RAMAFORBIDDEN, "403 - Forbidden", null, null, $this->pagina);
        $this->showVehiculos();
    }

    // funcion encargada de hacer el llamado a la vista para mostrar la confirmacion de la eliminacion
    // de un item desde la vista por categorias.
    public function deleteVehiculoDesdeCategoria($id_vehiculo){
        $vehiculo = $this->vehiculosModel->getDetallesVehiculoDB($id_vehiculo);
        $marca = $vehiculo->marca;
        $modelo = $vehiculo->modelo;
        $id_categoria = $vehiculo->id_categoria;
        if ($this->loginHelper->sessionStarted() && $_SESSION['ROL'] == 1){            
            $this->generalView->showMsje(RAMADELVECAT, "El vehiculo $marca, $modelo, sera eliminado de la base de datos. \n ¿Esta seguro?", $id_vehiculo, $id_categoria);
        }
        else
            $this->generalView->showMsje(RAMAFORBIDDEN, "403 - Forbidden", null, null, $this->pagina);
        $id_categoria = $vehiculo->id_categoria;
        $this->showVehiculosPorCategoria($id_categoria);
    }

    // funcion encargada de hacer el llamado para eliminar un item de la BBDD
    // desde la vista por categoria
    public function deleteVehiculoDesdeCategoriaDB($id_vehiculo){
        $detalles = $this->vehiculosModel->getDetallesVehiculoDB($id_vehiculo);
        if ($this->loginHelper->sessionStarted() && $_SESSION['ROL'] == 1){
            $linkImagen = $this->vehiculosModel->getImagenVehiculoDB($id_vehiculo);
            if($linkImagen != null){
                $link = $linkImagen->pathh;
                unlink($link);
                $this->vehiculosModel->deleteImagenpathh($id_vehiculo);
            }
            $this->commentsModel->deleteAllComments($id_vehiculo);
            $this->vehiculosModel->deleteVehiculoDB($id_vehiculo);
        }
        else
            $this->generalView->showMsje(RAMAFORBIDDEN, "403 - Forbidden", null, null, $this->pagina);
        $id_categoria = $detalles[0]->id_categoria;
        $this->showVehiculosPorCategoria($id_categoria);
    }

    // funcion para editar un item
    public function editVehiculo($id_vehiculo){
        $this->showVehiculos();
        $this->categorias = $this->categoriasModel->getCategoriasDB();
        // se selecciona de la BBDD el item a editar
        if ($this->loginHelper->sessionStarted() && $_SESSION['ROL'] == 1)
            $vehiculo = $this->vehiculosModel->getDetallesVehiculoDB($id_vehiculo);
        else
            $this->generalView->showMsje(RAMAFORBIDDEN, "403 - Forbidden", null, null, $this->pagina);
        // se renderizan los datos en un modal para su edicion
        $this->vehiculosView->editVehiculo($vehiculo, $this->categorias, $this->pagina);
    }

    // funcion para editar un item desde la vista por Categoria
    public function editarVehiculoEnCategoria($id_vehiculo){
        $this->categorias = $this->categoriasModel->getCategoriasDB();
        // se selecciona de la BBDD el item a editar
        if ($this->loginHelper->sessionStarted() && $_SESSION['ROL'] == 1)
            $vehiculo = $this->vehiculosModel->getDetallesVehiculoDB($id_vehiculo);
        else
            $this->generalView->showMsje(RAMAFORBIDDEN, "403 - Forbidden", null, null, $this->pagina);
        // se obtiene el valor de la categoria a la que pertenece el item
        $id_categoria = $vehiculo->id_categoria;
        // si no esta creada la carpeta donde se almacenan las imagenes asociadas a los items, se crea.
        $carpetaImagenes = BASE_URL.'img/vehiculos';
        if (!file_exists($carpetaImagenes)) {
            mkdir($carpetaImagenes, 0777, true);
        }
        // se renderizan los datos en un modal para su edicion
        $this->vehiculosView->editVehiculo($vehiculo, $this->categorias, $this->pagina, $id_categoria);
        // se carga como fondo el listado de vehiculos filtrados por categoria
        $this->showVehiculosPorCategoria($id_categoria);
    }

    // funcion encargada de enviar los datos cargados en el modal de edicion
    // al model para cargar en la BBDD
    public function editVehiculoDB($id_vehiculo){
        if ($this->loginHelper->sessionStarted() && $_SESSION['ROL'] == 1)
            // se verifica que haya una imagen cargada
            if($_FILES['input_name']['type'] == "image/jpg" || $_FILES['input_name']['type'] == "image/jpeg" || $_FILES['input_name']['type'] == "image/png"){
                $imagen = $_FILES["input_name"]["tmp_name"];
                // se verifica si el item tiene una imagen asociada.
                $linkImagen = $this->vehiculosModel->getImagenVehiculoDB($id_vehiculo);
                // si hay una imagen asociada, se elimina el link y la imagen.
                if($linkImagen != null){
                    $link = $linkImagen->pathh;
                    unlink($link);
                    $this->vehiculosModel->deleteImagenpathh($id_vehiculo);
                }
                // se carga la imagen.
                $carpeta = $this->vehiculosModel->uploadImagen($imagen);
                $this->vehiculosModel->editVehiculoDB($id_vehiculo, $_POST['tipo'], $_POST['marca'],$_POST['modelo'], $_POST['anio'], $_POST['kms'], $_POST['precio'], $carpeta);
            }
            else{
                $this->vehiculosModel->editVehiculoDB($id_vehiculo, $_POST['tipo'], $_POST['marca'], $_POST['modelo'], $_POST['anio'], $_POST['kms'], $_POST['precio']);
            }
        else{
            $this->generalView->showMsje(RAMAFORBIDDEN, "403 - Forbidden", null, null, $this->pagina);
        }
            
        if (($_POST['id_categoria']) != null)
            $this->showVehiculosPorCategoria($_POST['id_categoria']);
        else
            header('Location: '.BASE_URL.'verCatalogoVehiculos/?pagina='.$this->pagina);
    }

    // funcion encargadad de la carga de un nuevo item
    public function addNewVehiculo(){
        //$this->vehiculos = $this->vehiculosModel->getVehiculosDB();
        $this->categorias = $this->categoriasModel->getCategoriasDB();
        // se muestra el listado de items de fondo
        if ($this->loginHelper->sessionStarted() && $_SESSION['ROL'] == 1)
            $this->showVehiculos();
        else
            $this->generalView->showMsje(RAMAFORBIDDEN, "403 - Forbidden", null, null, $this->pagina);
        // se llama renderiza el modal que contiene el formulario de carga de un nuevo item
        $this->vehiculosView->addNewVehiculo($this->vehiculos,$this->categorias);
    }

    // funcion encargada de insertar un nuevo item en la BBDD
    public function insertNewVehiculoDB(){
        //$this->vehiculos = $this->vehiculosModel->getVehiculosDB();
        // si el formulario NO esta vacio envia los datos al Model para cargarlos en la BBDD
        if ($this->loginHelper->sessionStarted() && $_SESSION['ROL'] == 1){
            if (!empty($_POST['tipo']) && !empty($_POST['marca']) && !empty($_POST['modelo']) && !empty($_POST['anio']) && !empty($_POST['kms']) && !empty($_POST['precio'])){
                $this->vehiculosModel->addNewVehiculoDB($_POST['tipo'], $_POST['marca'], $_POST['modelo'], $_POST['anio'], $_POST['kms'], $_POST['precio']);
                header('Location: '.BASE_URL.'verCatalogoVehiculos/?pagina='.$this->pagina);
            } else {
                // si el formulario esta vacio o incompleto muestra un mensaje de error y vuelve al
                // listado de items
                $this->generalView->showMsje(RAMAVE, "ERROR: algun campo no fue completado.");
                $this->showVehiculos();
            } 
        } else {
            $this->generalView->showMsje(RAMAFORBIDDEN, "403 - Forbidden", null, null, $this->pagina);
        }
    }  
    
    public function findContent(){
        
        if ((!empty($_POST['text']) || !isset($_POST['inputCampor']))){
            $vehiculos = $this->vehiculosModel->findContent($_POST['text'], $_POST['inputCampo']); 
            $this->vehiculosView->showVehiculos($vehiculos, null, $this->pagina);
        }
        else {
            $this->showVehiculos();
            $this->generalView->showMsje(RAMAFINDCONTENT, "El campo de busqueda no puede estar vacio.", null, null, $this->pagina);
        }
    }
}