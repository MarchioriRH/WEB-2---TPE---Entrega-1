<?php

class TableModel {
    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_vehiculos;charset=utf8', 'root', '');
    }

   

    function getCategoriasDB(){
        $sentencia = $this->db->prepare("SELECT categorias.*, categorias.id_categoria as idTipo FROM vehiculos RIGHT JOIN categorias ON categorias.id_categoria = vehiculos.id_categoria GROUP BY categorias.id_categoria");
        $sentencia->execute();        
        $categorias = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $categorias;
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
        $sentencia2 = $this->db->prepare("UPDATE categorias SET tipo = '$tipo' WHERE id_categoria=?");
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
    function getDetallesCategoriaDB($id_categoria){
        $sentencia = $this->db->prepare("SELECT * FROM categorias WHERE id_categoria = $id_categoria");
        $sentencia->execute();
        $detalles = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $detalles;
    }
    

}