<?php

include_once "./View/tableView.php";
include_once "./Model/tableModel.php";

class TableController{
    
    private $view;

    function __construct(){
        $this->view = new TableView();
    }

    function showHome(){
        $this->view->viewHome();
    }

}