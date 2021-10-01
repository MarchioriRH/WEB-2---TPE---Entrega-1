<?php

//include_once "./Model/categoriasModel.php";
include_once "./Model/categoriasModel.php";

class VehiculosModel {
    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_vehiculos;charset=utf8', 'root', '');
    }

    function getVehiculosDB(){
        $sentencia = $this->db->prepare("SELECT vehiculos.*, categorias.tipo as Tipo FROM categorias RIGHT JOIN vehiculos ON vehiculos.id_categoria = categorias.id_categoria ORDER BY vehiculos.id_categoria");
        $sentencia->execute();
        $vehiculos = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $vehiculos;
    }

    function getDetallesVehiculoDB($id_vehiculo){
        $sentencia = $this->db->prepare("SELECT vehiculos.*, categorias.tipo as Tipo FROM categorias JOIN vehiculos ON vehiculos.id_categoria = categorias.id_categoria WHERE vehiculos.id_vehiculo = $id_vehiculo");
        $sentencia->execute();
        $detalles = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $detalles;
    }

    function deleteVehiculoDB($id_vehiculo){
        $sentencia = $this->db->prepare("DELETE FROM vehiculos WHERE id_vehiculo = $id_vehiculo");
        $sentencia->execute();
        header('Location: '.BASE_URL.'verCatalogoCompleto');
    }

    function addNewVehiculoDB($tipo, $marca, $modelo, $anio, $kms, $precio){
        $sentencia = $this->db->prepare("INSERT INTO vehiculos(marca, modelo, anio, kilometros, precio, id_categoria) VALUES(?, ?, ?, ?, ?, ?)");
        $sentencia->execute(array($marca, $modelo, $anio, $kms, $precio, $tipo));
    }

    function editVehiculoDB($id, $tipo, $marca, $modelo, $anio, $kilometros, $precio){       
        $sentencia = $this->db->prepare("UPDATE vehiculos SET marca = '$marca', modelo = '$modelo', anio = '$anio', kilometros = '$kilometros', precio = '$precio', id_categoria = '$tipo' WHERE id_vehiculo=?");
        $sentencia->execute(array($id));
    }
}