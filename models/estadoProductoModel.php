<?php
include_once dirname(__FILE__) . '../../Config/config.php';
require_once 'conexionModel.php';

class EstadoProducto
{
    private $id;
    private $estado;
    private $database;
    public function __construct()
    {
        $this->database = new Database();
    }
    public function getId(){
        return $this->id; 
    }
    public function getById($id){
        
        $estado = [];
        try{
            $sql = 'INSERT INTO estado_producto WHERE id=:id';
            $query = $this->database->conexion()->prepare($sql);
            $query->execute(['id_estado_producto' => $id]);
            
            while ($row=$query->fetch()) {
                 $datos = new EstadoProducto();
                 $datos->id= $row['id_estado_producto'];
                 $datos->$estado= $row['estado'];

                 array_push($estado, $datos);
            } 
            return $estado;

        } catch(PDOException $e){
            return ['mensasje' => $e];
        }
    }
    public function getAll( )
    {
        $items = [];

        try {
            $sql = 'SELECT * FROM estado_productos ORDER BY estado ASC';
            $query = $this->database->conexion()->query($sql);

            while ($row = $query->fetch()) {

                $item         = new EstadoProducto();
                $item->id     = $row['id_estado_producto'];
                $item->estado = $row['estado'];

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
            $sql = 'INSERT INTO estado_productos (estado) VALUES (:estado)';
            $prepare = $this->database->conexion()->prepare($sql);
            $query = $prepare->execute([
                'estado' => $datos['estado']
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
            $sql = 'UPDATE estado_productos SET estado WHERE id_estado_producto= :id_estado_producto';
            $prepare = $this->database->conexion()->prepare($sql);
            $query = $prepare->execute([
                'id_estado_producto' => $datos['id_estado_producto'],
                'estado'    => $datos['estado']
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
            $sql = 'DELETE  FROM estado_productos WHERE id_estado_producto =: id_estado_producto';
            $prepare = $this->database->conexion()->prepare($sql);
            $query = $prepare->execute(['id_estado_producto' => $id]);

            if ($query) {
                return true;
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    public function getEstado()
    {
        return $this->estado;
    }
    public function setEstado($estado)
    {
        return $this->estado;
    }
}

 
