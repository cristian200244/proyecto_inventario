<?php
include_once dirname(__FILE__) . '../../Config/config.example.php';
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
        $datos_ciudad = [];
        try {
            $sql = 'SELECT * FROM ciudades WHERE id_ciudad=:id_ciudad';
            $query = $this->database->conexion()->prepare($sql);
            $query->execute([
                    'id_ciudad' => $id
            ]);
            while ($row = $query->fetch()) {
                $item         = new Ciudad();
                $item->id     = $row['id_ciudad'];
                $item->nombre = $row['nombre'];

                array_push($datos_ciudad , $item);
            }
            return $datos_ciudad;
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
            $sql = 'INSERT INTO ciudades ( nombre) values (:nombre)';
            $prepare = $this->database->conexion()->prepare($sql);
            $query = $prepare->execute([
                'nombre' => $datos['nombre']
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
            $sql = 'UPDATE ciudades SET nombre = :nombre WHERE id_ciudad = :id_ciudad'; 
            $prepare = $this->database->conexion()->prepare($sql);
             $query = $prepare->execute([
                'id_ciudad'      => $datos['id_ciudad'],
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
            $sql = 'DELETE FROM ciudades WHERE id_ciudad = :id_ciudad';
            $prepare = $this->database->conexion()->prepare($sql);
            $query = $prepare->execute([
                'id_ciudad'  => $id
            ]);
            if ($query) {
                return true;
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getCiudad()
    {
        return $this->nombre;
    }

    public function setCiudad($nombre)
    {
        return $this->nombre;
    }

   
}
