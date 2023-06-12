<?php
include_once dirname(__FILE__) . '../../Config/config.example.php';
require_once 'conexionModel.php';

class Sexo
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
        $sexo = [];
        try {
            $sql = 'SELECT * FROM sexo WHERE id_sexo=:id_sexo';
            $query = $this->database->conexion()->prepare($sql);
            $query->execute(['id_sexo' => $id]);
            while ($row = $query->fetch()) {
                $datos  = new Sexo();
                $datos->id = $row['id_sexo'];
                $datos->nombre = $row['nombre'];

                array_push($sexo, $datos);
            }
            return $sexo;
        } catch (PDOException $e) {
            return ['mensasje' => $e];
        }
    }

    public function getAll()
    {
        $items = [];

        try {
            $sql = 'SELECT * FROM sexo ORDER BY nombre ASC';
            $query = $this->database->conexion()->query($sql);

            while ($row = $query->fetch()) {

                $item         = new Sexo();
                $item->id     = $row['id_sexo'];
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
            $sql = 'INSERT INTO sexo ( nombre) values (:nombre)';
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
            $sql = 'UPDATE sexo SET  nombre WHERE id_sexo = :id_sexo';
            $prepare = $this->database->conexion()->prepare($sql);
            $query = $prepare->execute([
                'id_sexo'      => $datos['id_sexo'],
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
            $sql = 'DELETE FROM sexo WHERE id_sexo = :id_sexo';
            $prepare = $this->database->conexion()->prepare($sql);
            $query = $prepare->execute([
                'id_sexo'  => $id
            ]);
            if ($query) {
                return true;
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getSexo()
    {
        return $this->nombre;
    }

    public function setSexo($nombre)
    {
        return $this->nombre;
    }
}
