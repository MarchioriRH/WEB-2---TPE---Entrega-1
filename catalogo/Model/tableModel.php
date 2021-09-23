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
        $detalles = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $detalles;
    }

    function borrarVehiculoDB($id_vehiculo){
        $sentencia = $this->db->prepare("DELETE FROM vehiculos WHERE id_vehiculo = $id_vehiculo");
        $sentencia->execute();
       
        header('Location: '.BASE_URL.'verCatalogoCompleto');
    }

    function getCategorias(){
        $sentencia = $this->db->prepare("SELECT categorias.*, categorias.id_categoria as idTipo FROM vehiculos RIGHT JOIN categorias ON categorias.id_categoria = vehiculos.id_categoria GROUP BY categorias.id_categoria");
        $sentencia->execute();        
        $categorias = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $categorias;
    }

    function addNewVehiculo($tipo, $marca, $modelo, $anio, $kms, $precio){
        $sentencia = $this->db->prepare("INSERT INTO vehiculos(marca, modelo, anio, kilometros, precio, id_categoria) VALUES(?, ?, ?, ?, ?, ?)");
        $sentencia->execute(array($marca, $modelo, $anio, $kms, $precio,$tipo));
    }

    

}