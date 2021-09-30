<?php

class TableModel {
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

    function getCategoriasDB(){
        $sentencia = $this->db->prepare("SELECT categorias.*, categorias.id_categoria as idTipo FROM vehiculos RIGHT JOIN categorias ON categorias.id_categoria = vehiculos.id_categoria GROUP BY categorias.id_categoria");
        $sentencia->execute();        
        $categorias = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $categorias;
    }

    function addNewVehiculoDB($tipo, $marca, $modelo, $anio, $kms, $precio){
        $sentencia = $this->db->prepare("INSERT INTO vehiculos(marca, modelo, anio, kilometros, precio, id_categoria) VALUES(?, ?, ?, ?, ?, ?)");
        $sentencia->execute(array($marca, $modelo, $anio, $kms, $precio, $tipo));
    }

    function editVehiculoDB($id, $tipo, $marca, $modelo, $anio, $kilometros, $precio){       
        $sentencia = $this->db->prepare("UPDATE vehiculos SET marca = '$marca', modelo = '$modelo', anio = '$anio', kilometros = '$kilometros', precio = '$precio', id_categoria = '$tipo' WHERE id_vehiculo=?");
        $sentencia->execute(array($id));
    }

    function deleteCategoriaDB($id_categoria){
        $sentencia1 = $this->db->prepare("DELETE FROM vehiculos WHERE id_categoria = $id_categoria");
        $sentencia1->execute();
        $sentencia2 = $this->db->prepare("DELETE FROM categorias WHERE id_categoria = $id_categoria");
        $sentencia2->execute();
        header('Location: '.BASE_URL.'verCatalogoCategoria');
    }
    
    function addNewCategoriaDB($tipo){
        $sentencia = $this->db->prepare("INSERT INTO categorias(tipo) VALUES(?)");
        $sentencia->execute(array($tipo));
    }

    function editCategoriaDB($id, $tipo){
        $sentencia1 = $this->db->prepare("UPDATE FROM vehiculos SET  WHERE id_categoria = $id");
        $sentencia1->execute();
        $sentencia2 = $this->db->prepare("UPDATE FROM categorias SET tipo = '$tipo' WHERE id_categoria= $id");
        $sentencia2->execute(array($id));
    }

    function registroNuevoUsuarioDB($mail, $userPassword, $nombre, $apellido){
        $sentencia = $this->db->prepare("INSERT INTO usuarios(mail, passwrd, nombre, apellido) VALUES(?, ?, ?, ?)");
        $sentencia->execute(array($mail, $userPassword, $nombre, $apellido));
    }

    function getUsuariosDB(){
        $sentencia = $this->db->prepare("SELECT * FROM usuarios");
        $sentencia->execute();
        $usuarios = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $usuarios;
    }
    
    

}