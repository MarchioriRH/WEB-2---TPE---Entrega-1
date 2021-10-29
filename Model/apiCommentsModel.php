<?php

class ApiCommentsModel{
    
    private $db;


    public function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_vehiculos;charset=utf8', 'root', '');
    }

    public function getAllComments(){
        $sentencia = $this->db->prepare("SELECT * FROM comments");
        $sentencia->execute();
        $comments = $sentencia->fetchAll(PDO::FETCH_ASSOC);
        return $comments;
    }
    
    public function getCommentsByUserID($id){
        $sentencia = $this->db->prepare("SELECT * FROM comments WHERE id_usuario = ?");
        $sentencia->execute([$id]);
        $comments = $sentencia->fetchAll(PDO::FETCH_ASSOC);
        return $comments;
    }

    public function getComment($id){
        $sentencia = $this->db->prepare("SELECT * FROM comments WHERE id = ?");
        $sentencia->execute([$id]);
        return $sentencia->fetch(PDO::FETCH_ASSOC);
    }

    public function addComment($id_usuario, $id_vehiculo, $comment){
        $sentencia = $this->db->prepare("INSERT INTO comments (id_usuario, id_vehiculo, comment) VALUES (?, ?, ?)");
        $sentencia->execute([$id_usuario, $id_vehiculo, $comment]);
    }

    public function deleteComment($id){
        $sentencia = $this->db->prepare("DELETE FROM comments WHERE id = ?");
        $sentencia->execute([$id]);
    }

    public function updateComment($id, $comment){
        $sentencia = $this->db->prepare("UPDATE comments SET comment = ? WHERE id = ?");
        $sentencia->execute([$comment, $id]);
    }

    public function getCommentsByVehiculo($id){
        $sentencia = $this->db->prepare("SELECT * FROM comments WHERE id_vehiculo = ?");
        $sentencia->execute([$id]);
        return $sentencia->fetchAll(PDO::FETCH_ASSOC);
    }
}