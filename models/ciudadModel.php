<?php
include_once dirname(__FILE__) . '../../Config/config.php';
require_once 'conexionModel.php';

class Ciudad
{
    private $id;
    private $nombre;
    private $database;


    public function __construct()
    {
        $this->database = new Database();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getById($id)
    {
        $ciudad = [];
        try {
            $sql = 'SELECT * FROM ciudades WHERE id=:id';
            $query = $this->database->conexion()->prepare($sql);
            $query->execute(['id' => $id]);
            while ($row = $query->fetchAll()) {
                $datos  = new Ciudad();
                $datos->id = $row['id'];
                $datos->nombre = $row['nombre'];
            }
            return $ciudad;
        } catch (PDOException $e) {
            return ['mensasje' => $e];
        }
    }

    public function getAll()
    {
        $items = [];

        try {
            $sql = 'SELECT * FROM ciudades ORDER BY nombre ASC';
            $query = $this->database->conexion()->query($sql);

            while ($row = $query->fetch()) {

                $item         = new Ciudad();
                $item->id     = $row['id_ciudad'];
                $item->nombre = $row['nombre'];

                array_push($items, $item);
            }

            return $items;
        } catch (PDOException $e) {
            return ['mensaje' => $e];
        }
    }

    public function store($datos)
    {
        try {
            $sql = 'INSERT INTO ciudades (nombre) values (:nombre)';
            // $prepare = $this->database->conexion()->prepare();
             

        } catch (PDOException $e) {
            return ['mensaje' => $e];
        }
    }

    public function update(){

    }

    public function delete(){

    }

    public function getCiudad()
    {
        return $this->nombre;
    }

    public function setCiudad()
    {
    }
}
