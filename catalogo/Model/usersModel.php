<?php

class UsersModel {
    
    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_vehiculos;charset=utf8', 'root', '');
    }

    function registroNuevoUsuarioDB($mail, $userPassword, $nombre, $apellido, $rol){
        $sentencia = $this->db->prepare("INSERT INTO usuarios(mail, passwrd, nombre, apellido, rol) VALUES(?, ?, ?, ?, ?)");
        $sentencia->execute(array($mail, $userPassword, $nombre, $apellido, $rol));
    }

    function getUsuariosDB(){
        $sentencia = $this->db->prepare("SELECT * FROM usuarios");
        $sentencia->execute();
        $usuarios = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $usuarios;
    }

    function getUsuarioByMail($mail) {
        $sentencia = $this->db->prepare("SELECT * FROM usuarios WHERE mail=?");
        $sentencia->execute(array($mail));
        $usuario = $sentencia->fetch(PDO::FETCH_OBJ);
        return $usuario;
    }
}   