<?php
include_once dirname(__FILE__) . '../../Config/config.example.php';
require_once 'conexionModel.php';

class Roles 
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
        $roles = [];
        try {
            $sql = 'SELECT * FROM roles WHERE id=:id';
            $query = $this->database->conexion()->prepare($sql);
            $query->execute(['id_rol' => $id]);
            while ($row = $query->fetch()) {
                $datos  = new Roles();
                $datos->id = $row['id_rol'];
                $datos->nombre = $row['nombre'];

                array_push($roles, $datos);
            }
            return $roles;
        } catch (PDOException $e) {
            return ['mensasje' => $e];
        }
    }

    public function getAll()
    {
        $items = [];

        try {
            $sql = 'SELECT * FROM roles ORDER BY nombre ASC';
            $query = $this->database->conexion()->query($sql);

            while ($row = $query->fetch()) {

                $item         = new Roles();
                $item->id     = $row['id_rol'];
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
            $sql = 'INSERT INTO roles ( nombre) values (:nombre)';
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

    

    public function getRol()
    {
        return $this->nombre;
    }

    public function setRol($nombre)
    {
        return $this->nombre;
    }

   
}
