<?php

class ApiCommentsModel{
    
    private $db;


    public function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_vehiculos;charset=utf8', 'root', '');
    }
    
    // Fuuncion encargada de obtener un determinado comentario.
    public function getComment($id){
        $sentencia = $this->db->prepare("SELECT * FROM comments WHERE id_comment = ?");
        $sentencia->execute(array($id));
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }


    // Funcion encargada de obtener los comentarios de un vehiculo segun la fecha o puntaje, y de manera ascendente o descendente.
    public function getCommentsByOrder($id, $column, $order){
        // Se previene la inyeccion de SQL en el Controller
        $sentencia = $this->db->prepare("SELECT usuarios.nombre, comments.comment as comment, comments.fecha as fecha, comments.score as score, 
                                        comments.id_vehiculo as id_vehiculo, comments.id_usuario as id_usuario FROM usuarios RIGHT JOIN comments 
                                        ON usuarios.id_usuario = comments.id_usuario WHERE comments.id_vehiculo = :id ORDER BY $column $order");
        // Bindeo de parametros
        $sentencia->bindParam(':id', $id, PDO::PARAM_INT);
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

    // Funcion encargada de obtener los comentarios de determinado vehiculo.
    public function getCommentsByVehiculoID($id){
        $sentencia = $this->db->prepare("SELECT usuarios.nombre, comments.comment as comment, comments.fecha as fecha, comments.score as score, 
                                        comments.id_vehiculo as id_vehiculo, comments.id_usuario as id_usuario, comments.id_comment as id_comment  FROM usuarios RIGHT JOIN comments 
                                        ON usuarios.id_usuario = comments.id_usuario WHERE comments.id_vehiculo = ? ORDER BY comments.fecha ASC");
        $sentencia->execute(array($id));
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

    // Funcion encargada de devolver los comentarios que contengan determinado puntaje.
    public function getCommentsByScore($id, $score){
        $sentencia = $this->db->prepare("SELECT usuarios.nombre, comments.comment as comment, comments.fecha as fecha, comments.score as score, 
                                        comments.id_vehiculo as id_vehiculo, comments.id_usuario as id_usuario, comments.id_comment as id_comment  FROM usuarios RIGHT JOIN comments 
                                        ON usuarios.id_usuario = comments.id_usuario WHERE id_vehiculo = ? AND score = ?");
        $sentencia->execute(array($id, $score));
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

    // Funcion encargada de agregar un nuevo comentario.
    public function addComment($id_usuario, $id_vehiculo, $fecha, $comment, $score){
        $sentencia = $this->db->prepare("INSERT INTO comments (id_usuario, id_vehiculo, fecha, comment, score) VALUES (?, ?, ?, ?, ?)");
        $sentencia->execute(array($id_usuario, $id_vehiculo, $fecha, $comment, $score));
        return $this->db->lastInsertId();
    }

    // Funcion encargada de eliminar un determinado comentario.
    public function deleteComment($id){
        $sentencia = $this->db->prepare("DELETE FROM comments WHERE id_comment = ?");
        $sentencia->execute(array($id));
    }

    // Funcion encargada de eliminar todos los comentarios de un vehiculo.
    public function deleteAllComments($id){
        $sentencia = $this->db->prepare("DELETE FROM comments WHERE id_vehiculo = ?");
        $sentencia->execute(array($id));
    }

    public function deleteCommentsByUser($id){
        $sentencia = $this->db->prepare("DELETE FROM comments WHERE id_usuario = ?");
        $sentencia->execute(array($id));
    }
        
}