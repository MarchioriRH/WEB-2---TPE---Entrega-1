<?php

include_once 'Model/VehiculosModel.php';
const ITEMS_PAGE = 6;

class PaginationHelper {

    private $vehiculosModel;

    function __construct(){
        $this->vehiculosModel = new VehiculosModel();
    }

    // Funcion que devuelve la cantidad de paginas que hay en la base de datos de acuerdo
    // a los cantidad maxima de filas que se pueden mostrar en una pagina.
    public function getCantPags($id_cat = null){
        $limit = ITEMS_PAGE; 
        if ($id_cat == null)   
            $cantItems = $this->vehiculosModel->getCountItems();
        else
            $cantItems = $this->vehiculosModel->getCountItemsByCat($id_cat);
        $cantPaginas = ceil($cantItems / $limit);
        return $cantPaginas;
    }       

    // Funcion encargada de calcular el offset de la consulta para saber donde empezar la
    // siguiente consulta.
    public function getOffset(){
        $pagina = 1;
        if(isset($_GET['pagina'])){
            $pagina = $_GET['pagina'];
        }
        $limit = ITEMS_PAGE;
        $offset = ($pagina - 1) * $limit;
        return $offset;
    }
}