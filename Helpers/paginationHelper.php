<?php

include_once 'Model/VehiculosModel.php';
const ITEMS_PAGE = 6;

class PaginationHelper {

    private $vehiculosModel;
    private $cantPaginas;

    function __construct(){
        $this->vehiculosModel = new VehiculosModel();
    }

    public function getPage(){
        $limit = ITEMS_PAGE;    
        $cantItems = $this->vehiculosModel->getCountItems();
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