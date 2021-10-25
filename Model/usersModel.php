<?php

class UsersModel {
    
    // se declara la variable utilizada en la clase
    private $db;

    // se conecta la BBDD mediante PDO
    public function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_vehiculos;charset=utf8', 'root', '');
    }

    // funcion encargada de registrar un nuevo usuario en la BBDD
    public function registroNuevoUsuarioDB($mail, $userPassword, $nombre, $apellido, $rol){
        $sentencia = $this->db->prepare("INSERT INTO usuarios(mail, passwrd, nombre, apellido, rol) VALUES(?, ?, ?, ?, ?)");
        $sentencia->execute(array($mail, $userPassword, $nombre, $apellido, $rol));
    }

    // funcion que tiene la tarea de obtener los datos de todos los usuarios de la BBDD
    public function getUsuariosDB(){
        $sentencia = $this->db->prepare("SELECT * FROM usuarios");
        $sentencia->execute();
        $usuarios = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $usuarios;
    }

    // funcion para obtener los datos de un determinado usuario de la BBDD
    public function getUsuarioByMail($mail) {
        $sentencia = $this->db->prepare("SELECT * FROM usuarios WHERE mail=?");
        $sentencia->execute(array($mail));
        $usuario = $sentencia->fetch(PDO::FETCH_OBJ);
        return $usuario;
    }

    public function getRolesUsuario(){
        $sentencia = $this->db->prepare("SELECT rol as rolUsuario FROM usuarios GROUP BY rol");
        $sentencia->execute();        
        $roles = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $roles;
    }

    public function getUsuario($idUsuario){
        $sentencia = $this->db->prepare("SELECT * FROM usuarios WHERE id_usuario=?");
        $sentencia->execute(array($idUsuario));
        $usuario = $sentencia->fetch(PDO::FETCH_OBJ);
        return $usuario;
    }

    public function editRolUsuarioDB($idUsuario, $rol){
        $sentencia2 = $this->db->prepare("UPDATE usuarios SET rol = '$rol' WHERE id_usuario=?");
        $sentencia2->execute(array($idUsuario));
    }

    public function eliminarUsuarioDB($idUsuario){
        $sentencia = $this->db->prepare("DELETE FROM usuarios WHERE id_usuario = $idUsuario");
        $sentencia->execute();
    }
}   