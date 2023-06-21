<?php
include_once dirname(__FILE__) . '../../Config/config.php';
require_once 'conexionModel.php';

class Servicios
{
    private $id;
    private $servicio;
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
        $servicio = [];
        try {
            $sql = 'SELECT * FROM tipo_servicios WHERE id_tipo_servicio=:id_tipo_servicio';
            $query = $this->database->conexion()->prepare($sql);
            $query->execute(['id_tipo_servicio' => $id]);

            while ($row = $query->fetch()) {
                $datos = new Servicios();
                $datos->id = $row['id_tipo_servicio'];
                $datos->servicio = $row['servicio'];
                array_push($servicio, $datos);
            }
            return $servicio;
        } catch (PDOException $e) {
            return ['mensasje' => $e];
        }
    }
    public function getAll()
    {
        $items = [];

        try {
            $sql = 'SELECT * FROM tipo_servicios ORDER BY servicio ASC';
            $query = $this->database->conexion()->query($sql);

            while ($row = $query->fetch()) {

                $item         = new Servicios();
                $item->id     = $row['id_tipo_servicio'];
                $item->servicio = $row['servicio'];

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
            $sql = 'INSERT INTO tipo_servicios (servicio) VALUES  (UPPER(:servicio)) ';
            $prepare = $this->database->conexion()->prepare($sql);
            $query = $prepare->execute([
                'servicio' => $datos['servicio']
            ]);
            if ($query) {
                return true;
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    public function update($datos)
    {
        try {
            $sql = 'UPDATE tipo_servicios SET servicio = :servicio WHERE id_tipo_servicio= :id_tipo_servicio';
            $prepare = $this->database->conexion()->prepare($sql);
            $query = $prepare->execute([
                'id_tipo_servicio' => $datos['id_tipo_servicio'],
                'servicio'    => $datos['servicio']
            ]);
            if ($query) {
                return true;
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    public function delete($id)
    {
        try {
            $sql = 'DELETE  FROM tipo_servicios WHERE id_tipo_servicio = :id_tipo_servicio';
            $prepare = $this->database->conexion()->prepare($sql);
            $query = $prepare->execute(['id_tipo_servicio' => $id]);

            if ($query) {
                return true;
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    public function getServicio( ){
        return $this->servicio;
        
    }
    public function setServicio($servicio){
        return $this->servicio = $servicio;
    }
}
