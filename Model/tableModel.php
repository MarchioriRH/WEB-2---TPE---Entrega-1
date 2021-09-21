<?php

class TableModel {
    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_vehiculos;charset=utf8', 'root', '');
    }

    function getVehiculos(){
        $sentencia = $this->db->prepare("SELECT vehiculos.*, vehiculos.id_vehiculo as ID, vehiculos.marca as Marca, vehiculos.modelo as Modelo, vehiculos.kilometros as Kms, vehiculos.precio as Precio FROM categorias RIGHT JOIN vehiculos ON vehiculos.id_categoria = categorias.id_categoria");
        $sentencia->execute();
        $vehiculos = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $vehiculos;
    }
}