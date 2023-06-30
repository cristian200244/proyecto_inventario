<?php
include_once dirname(__FILE__) . '../../Config/config.php';
require_once 'conexionModel.php';

class Marcas
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
        $marca = [];
        try {
            $sql = 'SELECT * FROM marcas WHERE id=:id';
            $query = $this->database->conexion()->prepare($sql);
            $query->execute(['id_marca' => $id]);

            while ($row = $query->fetch()) {
                $datos = new Marcas();
                $datos->id = $row['id_marca'];
                $datos->nombre = $row['nombre'];

                array_push($marca, $datos);
            }
            return $marca;
        } catch (PDOException $e) {
            return ['mensasje' => $e];
        }
    }
    public function getAll()
    {
        $items = [];

        try {
            $sql = 'SELECT * FROM marcas ORDER BY nombre ASC';
            $query = $this->database->conexion()->query($sql);

            while ($row = $query->fetch()) {

                $item         = new Marcas();
                $item->id     = $row['id_marca'];
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
            $sql = 'INSERT INTO marcas (nombre) VALUES (:nombre)';
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
            $sql = 'UPDATE marcas SET nombre WHERE id_marca= :id_marca';
            $prepare = $this->database->conexion()->prepare($sql);
            $query = $prepare->execute([
                'id_marca' => $datos['id_marca'],
                'nombre'    => $datos['nombre']
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
            $sql = 'DELETE  FROM marcas WHERE id_marca =: id_marca';
            $prepare = $this->database->conexion()->prepare($sql);
            $query = $prepare->execute(['id_marca' => $id]);

            if ($query) {
                return true;
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    public function getMarca()
    {
        return $this->nombre;
    }
    public function setMarca($nombre)
    {
        return $this->nombre;
    }
}
