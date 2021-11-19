<?php

class ApiCommentsModel{
    
    private $db;


    public function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_vehiculos;charset=utf8', 'root', '');
    }
    
    public function getComment($id){
        $sentencia = $this->db->prepare("SELECT * FROM comments WHERE id_comment = ?");
        $sentencia->execute(array($id));
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }

    /*public function getCommentsByOrder($id, $column, $order){
        $sentencia = $this->db->prepare("SELECT usuarios.nombre, comments.comment as comment, comments.fecha as fecha, comments.score as score, 
                                        comments.id_vehiculo as id_vehiculo, comments.id_usuario as id_usuario FROM usuarios RIGHT JOIN comments 
                                        ON usuarios.id_usuario = comments.id_usuario WHERE comments.id_vehiculo = :id ORDER BY :column :order");
        $sentencia->bindParam(':id', $id, PDO::PARAM_INT);
        $sentencia->bindParam(':column', $column, PDO::PARAM_STR);
        $sentencia->bindParam(':order', $order, PDO::PARAM_STR);
        $sentencia->execute();
       // var_dump($sentencia);
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }*/

    public function getCommentsByDateDESC($id){
        $sentencia = $this->db->prepare("SELECT usuarios.nombre, comments.comment as comment, comments.fecha as fecha, comments.score as score, 
                                        comments.id_vehiculo as id_vehiculo, comments.id_usuario as id_usuario, comments.id_comment as id_comment  FROM usuarios RIGHT JOIN comments 
                                        ON usuarios.id_usuario = comments.id_usuario WHERE comments.id_vehiculo = :id ORDER BY comments.fecha DESC");
        $sentencia->bindParam(':id', $id, PDO::PARAM_INT);
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

    public function getCommentsByDateASC($id){
        $sentencia = $this->db->prepare("SELECT usuarios.nombre, comments.comment as comment, comments.fecha as fecha, comments.score as score, 
                                        comments.id_vehiculo as id_vehiculo, comments.id_usuario as id_usuario, comments.id_comment as id_comment  FROM usuarios RIGHT JOIN comments 
                                        ON usuarios.id_usuario = comments.id_usuario WHERE comments.id_vehiculo = :id ORDER BY comments.fecha ASC");
        $sentencia->bindParam(':id', $id, PDO::PARAM_INT);
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

    public function getCommentsByScoreDESC($id){
        $sentencia = $this->db->prepare("SELECT usuarios.nombre, comments.comment as comment, comments.fecha as fecha, comments.score as score, 
                                        comments.id_vehiculo as id_vehiculo, comments.id_usuario as id_usuario, comments.id_comment as id_comment  FROM usuarios RIGHT JOIN comments 
                                        ON usuarios.id_usuario = comments.id_usuario WHERE comments.id_vehiculo = :id ORDER BY comments.score DESC");
        $sentencia->bindParam(':id', $id, PDO::PARAM_INT);
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

    public function getCommentsByScoreASC($id){
        $sentencia = $this->db->prepare("SELECT usuarios.nombre, comments.comment as comment, comments.fecha as fecha, comments.score as score, 
                                        comments.id_vehiculo as id_vehiculo, comments.id_usuario as id_usuario, comments.id_comment as id_comment FROM usuarios RIGHT JOIN comments 
                                        ON usuarios.id_usuario = comments.id_usuario WHERE comments.id_vehiculo = :id ORDER BY comments.score ASC");
        $sentencia->bindParam(':id', $id, PDO::PARAM_INT);
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

    public function getCommentsByVehiculoID($id){
        $sentencia = $this->db->prepare("SELECT usuarios.nombre, comments.comment as comment, comments.fecha as fecha, comments.score as score, 
                                        comments.id_vehiculo as id_vehiculo, comments.id_usuario as id_usuario, comments.id_comment as id_comment  FROM usuarios RIGHT JOIN comments 
                                        ON usuarios.id_usuario = comments.id_usuario WHERE comments.id_vehiculo = ? ORDER BY comments.fecha ASC");
        $sentencia->execute(array($id));
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

    public function getCommentsByScore($id, $score){
        $sentencia = $this->db->prepare("SELECT usuarios.nombre, comments.comment as comment, comments.fecha as fecha, comments.score as score, 
                                        comments.id_vehiculo as id_vehiculo, comments.id_usuario as id_usuario, comments.id_comment as id_comment  FROM usuarios RIGHT JOIN comments 
                                        ON usuarios.id_usuario = comments.id_usuario WHERE id_vehiculo = ? AND score = ?");
        $sentencia->execute(array($id, $score));
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
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
        
}