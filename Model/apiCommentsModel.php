<?php

class ApiCommentsModel{
    
    private $db;


    public function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_vehiculos;charset=utf8', 'root', '');
    }

    public function getAllComments(){
        $sentencia = $this->db->prepare("SELECT * FROM comments");
        $sentencia->execute();
        $comments = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $comments;
    }
    
    public function getCommentsByUserID($id){
        $sentencia = $this->db->prepare("SELECT * FROM comments WHERE id_usuario = ?");
        $sentencia->execute(array($id));
        $comments = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $comments;
    }

    public function getComment($id){
        $sentencia = $this->db->prepare("SELECT * FROM comments WHERE id_comment = ?");
        $sentencia->execute(array($id));
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }

    public function addComment($id_usuario, $id_vehiculo, $fecha, $comment, $score){
        $sentencia = $this->db->prepare("INSERT INTO comments (id_usuario, id_vehiculo, fecha, comment, score) VALUES (?, ?, ?, ?, ?)");
        $sentencia->execute(array($id_usuario, $id_vehiculo, $fecha, $comment, $score));
        return $this->db->lastInsertId();
    }

    public function deleteComment($id){
        $sentencia = $this->db->prepare("DELETE FROM comments WHERE id_comment = ?");
        $sentencia->execute(array($id));
    }

    public function updateComment($id, $fecha, $comment, $score){
        $sentencia = $this->db->prepare("UPDATE comments SET fecha = ?, comment = ?, score = ? WHERE id_comment = ?");
        $sentencia->execute(array($fecha, $comment, $score, $id));
    }

    public function getCommentsByVehiculoID($id){
        $sentencia = $this->db->prepare("SELECT * FROM comments WHERE id_vehiculo = ?");
        $sentencia->execute(array($id));
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }
}