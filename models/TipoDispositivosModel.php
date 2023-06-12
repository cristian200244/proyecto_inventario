<?php
include_once dirname(__FILE__) . '../../Config/config.example.php';
require_once 'conexionModel.php';

class Dispositivos  
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
        $dispositivo = [];
        try {
            $sql = 'SELECT * FROM tipo_dispositivos WHERE id_tipo_dispositivo=:id_tipo_dispositivo';
            $query = $this->database->conexion()->prepare($sql);
            $query->execute(['id_tipo_dispositivo' => $id]);
            while ($row = $query->fetch()) {
                $datos  = new Dispositivos();
                $datos->id = $row['id_tipo_dispositivo'];
                $datos->nombre = $row['nombre'];

                array_push($dispositivo, $datos);
            }
            return $dispositivo;
        } catch (PDOException $e) {
            return ['mensasje' => $e];
        }
    }

    public function getAll()
    {
        $items = [];

        try {
            $sql = 'SELECT * FROM tipo_dispositivos ORDER BY nombre ASC';
            $query = $this->database->conexion()->query($sql);

            while ($row = $query->fetch()) {

                $item         = new Dispositivos();
                $item->id     = $row['id_tipo_dispositivo'];
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
            $sql = 'INSERT INTO tipo_dispositivos (nombre) values (UPPER(:nombre)) ';
            $prepare = $this->database->conexion()->prepare($sql);
            $query = $prepare->execute([
                'nombre' => $datos['nombre']
            ]);
            if ($query) {
                return true;
            }
        } catch (PDOException $e) {
            die($e->getMessage());;
        }
    }

    public function update($datos)
    {
        try {
            $sql = 'UPDATE tipo_dispositivos SET  nombre = :nombre WHERE id_tipo_dispositivo = :id_tipo_dispositivo'; 
            $prepare = $this->database->conexion()->prepare($sql);
             $query = $prepare->execute([
                'id_tipo_dispositivo'      => $datos['id_tipo_dispositivo'],
                'nombre'         => $datos['nombre']
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
            $sql = 'DELETE FROM tipo_dispositivos WHERE id_tipo_dispositivo = :id_tipo_dispositivo';
            $prepare = $this->database->conexion()->prepare($sql);
            $query = $prepare->execute([
                'id_tipo_dispositivo'  => $id
            ]);
            if ($query) {
                return true;
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getDispositivo()
    {
        return $this->nombre;
    }

    public function setDispositivo($nombre)
    {
        return $this->nombre = $nombre;
    }

   
}
