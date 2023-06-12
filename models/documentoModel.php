<?php
include_once dirname(__FILE__) . '../../Config/config.example.php';
require_once 'conexionModel.php';

class TipoDocumento
{

    private $id;
    private $tipo_documento;
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
        $documento = [];
        try {
            $sql =  'SELECT * FROM tipo_documentos WHERE id_tipo_documento = :id_tipo_documento';
            $query = $this->database->conexion()->prepare($sql);
            $query->execute(['id_tipo_documento' => $id]);

            while ($row = $query->fetchAll()) {
                $datos = new TipoDocumento();
                $datos->id = $row['id_tipo_documento'];
                $datos->tipo_documento = $row['tipo'];

                array_push($documento, $datos);
            }

            return $documento;
        } catch (PDOException $e) {
            return ['mensasje' => $e];
        }
    }
    public function getAll()
    {
        $items = [];

        try {
            $sql = 'SELECT * FROM tipo_documentos ORDER BY tipo ASC';
            $query = $this->database->conexion()->query($sql);

            while ($row = $query->fetch()) {

                $item         = new TipoDocumento();
                $item->id     = $row['id_tipo_documento'];
                $item->tipo_documento = $row['tipo'];

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
            $sql = 'INSERT INTO tipo_documentos (tipo) values  (UPPER(:tipo)) ';
            $prepare = $this->database->conexion()->prepare($sql);
            $query = $prepare->execute([
                'tipo' => $datos['tipo']
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
            $sql = 'UPDATE tipo_documentos SET tipo= :tipo WHERE id_tipo_documento = :id_tipo_documento'; 
            $prepare = $this->database->conexion()->prepare($sql);
             $query = $prepare->execute([
                'id_tipo_documento'   => $datos['id_tipo_documento'],
                'tipo'                => $datos['tipo'] 
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
            $sql = 'DELETE FROM tipo_documentos WHERE id_tipo_documento = :id_tipo_documento';
            $prepare = $this->database->conexion()->prepare($sql);
            $query = $prepare->execute([
                'id_tipo_documento' => $id,
            ]);
            if ($query) {
                return true;
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getTipoDocumento()
    {
        return $this->tipo_documento;
    }

    public function setTipoDocumento($tipo_documento)
    {
        $this->tipo_documento = $tipo_documento;
    }
}

 
