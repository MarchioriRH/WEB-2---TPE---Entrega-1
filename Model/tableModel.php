<?php

class TableModel {
    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_vehiculos;charset=utf8', 'root', '');
    }

    function getVehiculos(){
        $sentencia = $this->db->prepare("SELECT vehiculos.*, categorias.tipo as Tipo FROM categorias RIGHT JOIN vehiculos ON vehiculos.id_categoria = categorias.id_categoria");
        $sentencia->execute();
        $vehiculos = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $vehiculos;
    }

    function getDetallesVehiculo($id_vehiculo){
        $sentencia = $this->db->prepare("SELECT * FROM vehiculos WHERE id_vehiculo = $id_vehiculo");
        $sentencia->execute();
        $vehiculo = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $vehiculo;
    }
}