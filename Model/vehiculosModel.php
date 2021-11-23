<?php

include_once "./Model/categoriasModel.php";

class VehiculosModel {
    // clase Model de Vehiculos, encargada del trafico de datos desde la BBDD de vehiculos
    // se declara variable
    private $db;

    // se realiza la coneccion mediante PDO con la BBDD
    public function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_vehiculos;charset=utf8', 'root', '');
    }

    // Funcion que devuelve la cantidad de items en la BBDD para la paginacion.
    public function getCountItems(){
        $sentencia = $this->db->prepare("SELECT COUNT(*) FROM vehiculos");
        $sentencia->execute();
        return $sentencia->fetchColumn();
    }

    // Funcion que devuelve la cantidad de items por categorias en la BBDD para la paginacion.
    public function getCountItemsByCat($id_cat){
        $sentencia = $this->db->prepare("SELECT COUNT(*) FROM vehiculos WHERE id_categoria = ?");
        $sentencia->execute(array($id_cat));
        return $sentencia->fetchColumn();
    }

    // funcion encargada de buscar los vehiculos desde la BBDD, junto con la categoria de cada unos
    public function getVehiculosDB($limit, $offset){
        // select que realiza el JOIN de los datos de la BBDD de vehiculos y los relaciona con al de
        // categorias
        $sentencia = $this->db->prepare("SELECT vehiculos.*, categorias.tipo as Tipo FROM categorias RIGHT JOIN vehiculos 
                                         ON vehiculos.id_categoria = categorias.id_categoria  ORDER BY vehiculos.id_categoria LIMIT ? OFFSET ?");
        $sentencia->bindParam(1, $limit, PDO::PARAM_INT);
        $sentencia->bindParam(2, $offset, PDO::PARAM_INT);
        $sentencia->execute();
        $vehiculos = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $vehiculos;
    }

    public function getVehiculosSinLimDB(){
        // select que realiza el JOIN de los datos de la BBDD de vehiculos y los relaciona con al de
        // categorias
        $sentencia = $this->db->prepare("SELECT vehiculos.*, categorias.tipo as Tipo FROM categorias RIGHT JOIN vehiculos ON vehiculos.id_categoria = categorias.id_categoria ORDER BY vehiculos.id_categoria");
        $sentencia->execute();
        $vehiculos = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $vehiculos;
    }

    // Funcion que devuelve los vehiculos de la BBDD de acuerdo a la categoria seleccionada.
    public function getVehiculosPorCatDB($id_cat){
        $sentencia = $this->db->prepare("SELECT vehiculos.*, categorias.tipo as Tipo FROM categorias RIGHT JOIN vehiculos ON vehiculos.id_categoria = categorias.id_categoria WHERE vehiculos.id_categoria = ?");
        //$sentencia->bindParam(1, $id_cat);
        $sentencia->execute(array($id_cat));
        $vehiculos = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $vehiculos;
    }

    // esta funcion obtiene los datos de un determinado item de la BBDD
    public function getDetallesVehiculoDB($id_vehiculo){
        $sentencia = $this->db->prepare("SELECT vehiculos.*, categorias.tipo as Tipo FROM categorias JOIN vehiculos ON vehiculos.id_categoria = categorias.id_categoria WHERE vehiculos.id_vehiculo = ?");
        $sentencia->bindParam(1, $id_vehiculo, PDO::PARAM_INT);
        $sentencia->execute();
        $detalles = $sentencia->fetch(PDO::FETCH_OBJ);
        return $detalles;
    }

    public function getImagenVehiculoDB($id_vehiculo){
        $sentencia = $this->db->prepare("SELECT pathh FROM imagenes WHERE fk_id_vehiculo = ?");
        $sentencia->execute(array($id_vehiculo));
        $imagen = $sentencia->fetchColumn();
        return $imagen;
    }

    // funcion para eliminar un item de la BBDD
    public function deleteVehiculoDB($id_vehiculo){
        $sentencia = $this->db->prepare("DELETE FROM vehiculos WHERE id_vehiculo = ?");
        $sentencia->bindParam(1, $id_vehiculo, PDO::PARAM_INT);
        $sentencia->execute();
        //header('Location: '.BASE_URL.'verCatalogoVehiculos');
    }

    // se agrega nuevo item a la DDBB
    public function addNewVehiculoDB($tipo, $marca, $modelo, $anio, $kms, $precio){
        $sentencia = $this->db->prepare("INSERT INTO vehiculos(marca, modelo, anio, kilometros, precio, id_categoria) VALUES(?, ?, ?, ?, ?, ?)");
        $sentencia->execute(array($marca, $modelo, $anio, $kms, $precio, $tipo));
    }

    // se guardan en la BBDD los datos editados
    public function editVehiculoDB($id, $tipo, $marca, $modelo, $anio, $kilometros, $precio, $imagen = null){   
        if($imagen!=null){ 
            $sentencia1 = $this->db->prepare("INSERT INTO imagenes (fk_id_vehiculo, pathh) VALUES(?, ?)");
            $sentencia1->execute(array($id, $imagen));
        } 
        $sentencia = $this->db->prepare("UPDATE vehiculos SET marca = ?, modelo = ?, anio = ?, kilometros = ?, precio = ?, id_categoria = ? WHERE id_vehiculo = ?");
        $sentencia->execute(array($marca, $modelo, $anio, $kilometros, $precio, $tipo, $id));
    }

    public function uploadImagen($imagen){
        $carpeta = 'img/vehiculos/' . uniqid() . '.jpg';
        move_uploaded_file($imagen, $carpeta);
        return $carpeta;
    }

    public function selectImagenABorrar($id){//OK
        $sentencia = $this->db->prepare("SELECT pathh FROM imagenes WHERE fk_id_vehiculo = ?");
        $sentencia->execute(array($id));
        $imagen = $sentencia->fetch(PDO::FETCH_OBJ);
        return $imagen;
    }

    public function deleteImagenpathh($id){//OK
        $sentencia = $this->db->prepare("DELETE FROM imagenes WHERE fk_id_vehiculo=?");
        $sentencia->execute(array($id));
    }
}