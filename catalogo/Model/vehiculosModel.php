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

    // funcion encargada de buscar los vehiculos desde la BBDD, junto con la categoria de cada unos
    public function getVehiculosDB(){
        // select que realiza el JOIN de los datos de la BBDD de vehiculos y los relaciona con al de
        // categorias
        $sentencia = $this->db->prepare("SELECT vehiculos.*, categorias.tipo as Tipo FROM categorias RIGHT JOIN vehiculos ON vehiculos.id_categoria = categorias.id_categoria ORDER BY vehiculos.id_categoria");
        $sentencia->execute();
        $vehiculos = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $vehiculos;
    }

    // esta funcion obtiene los datos de un determinado item de la BBDD
    public function getDetallesVehiculoDB($id_vehiculo){
        $sentencia = $this->db->prepare("SELECT vehiculos.*, categorias.tipo as Tipo FROM categorias JOIN vehiculos ON vehiculos.id_categoria = categorias.id_categoria WHERE vehiculos.id_vehiculo = $id_vehiculo");
        $sentencia->execute();
        $detalles = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $detalles;
    }

    // funcion para eliminar un item de la BBDD
    public function deleteVehiculoDB($id_vehiculo){
        $sentencia = $this->db->prepare("DELETE FROM vehiculos WHERE id_vehiculo = $id_vehiculo");
        $sentencia->execute();
        header('Location: '.BASE_URL.'verCatalogoVehiculos');
    }

    // se agrega nuevo item a la DDBB
    public function addNewVehiculoDB($tipo, $marca, $modelo, $anio, $kms, $precio){
        $sentencia = $this->db->prepare("INSERT INTO vehiculos(marca, modelo, anio, kilometros, precio, id_categoria) VALUES(?, ?, ?, ?, ?, ?)");
        $sentencia->execute(array($marca, $modelo, $anio, $kms, $precio, $tipo));
    }

    // se guardan en la BBDD los datos editados
    public function editVehiculoDB($id, $tipo, $marca, $modelo, $anio, $kilometros, $precio){       
        $sentencia = $this->db->prepare("UPDATE vehiculos SET marca = '$marca', modelo = '$modelo', anio = '$anio', kilometros = '$kilometros', precio = '$precio', id_categoria = '$tipo' WHERE id_vehiculo=?");
        $sentencia->execute(array($id));
    }
}