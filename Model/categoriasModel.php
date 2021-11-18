<?php

class CategoriasModel {
    // clase Model de Categorias, encargada del trafico de datos desde la BBDD de vehiculos
    // se declara variable
    private $db;

    // se realiza la coneccion mediante PDO con la BBDD
    public function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_vehiculos;charset=utf8', 'root', '');
    }

    // funcion encargada de buscar las categorias desde la BBDD
    public function getCategoriasDB(){
        // select que realiza el JOIN de los datos de la BBDD de categorias y los relaciona al de vehiculos
        $sentencia = $this->db->prepare("SELECT categorias.*, categorias.id_categoria as idTipo FROM vehiculos RIGHT JOIN categorias 
                                        ON categorias.id_categoria = vehiculos.id_categoria GROUP BY categorias.id_categoria");
        $sentencia->execute();        
        $categorias = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $categorias;
    }

    // funcion encargada de eliminar una categoria de la BBDD mediante el id
    public function deleteCategoriaDB($id_categoria){
        $sentencia1 = $this->db->prepare("DELETE FROM vehiculos WHERE id_categoria = ?");
        $sentencia1->bindParam(1, $id_categoria, PDO::PARAM_INT);
        $sentencia1->execute();
        $sentencia2 = $this->db->prepare("DELETE FROM categorias WHERE id_categoria = ?");
        $sentencia2->bindParam(1, $id_categoria, PDO::PARAM_INT);
        $sentencia2->execute();
    }
    
    // funcion encargada de agregar una nueva categoria en la BBDD
    public function addNewCategoriaDB($tipo){
        $sentencia = $this->db->prepare("INSERT INTO categorias(tipo) VALUES(?)");
        $sentencia->bindParam(1, $tipo, PDO::PARAM_STR);
        $sentencia->execute();
    }

    // funcion encargada de editar una categoria en la base de datos
    public function editCategoriaDB($id, $tipo){
        $sentencia = $this->db->prepare("UPDATE categorias SET tipo = ? WHERE id_categoria = ?");
        $sentencia->bindParam(2, $id, PDO::PARAM_INT);
        $sentencia->bindParam(1, $tipo, PDO::PARAM_STR);
        $sentencia->execute();
    }
    
    // funcion que trae todos los datos de una categoria de la BBDD
    public function getDetallesCategoriaDB($id_categoria){
        $sentencia = $this->db->prepare("SELECT * FROM categorias WHERE id_categoria = ?");
        $sentencia->bindParam(1, $id_categoria, PDO::PARAM_INT);
        $sentencia->execute();
        $detalles = $sentencia->fetch(PDO::FETCH_OBJ);
        return $detalles;
    }
}