<?php

include_once 'Model/VehiculosModel.php';
const ITEMS_PAGE = 6;

class PaginationHelper {

    private $vehiculosModel;
    private $cantPaginas;

    function __construct(){
        $this->vehiculosModel = new VehiculosModel();
    }

    public function getCantPags($id_cat = null){
        $limit = ITEMS_PAGE; 
        if ($id_cat == null)   
            $cantItems = $this->vehiculosModel->getCountItems();
        else
            $cantItems = $this->vehiculosModel->getCountItemsByCat($id_cat);
        $cantPaginas = ceil($cantItems / $limit);
        return $cantPaginas;
    }       

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