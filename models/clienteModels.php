<?php

include_once dirname(__FILE__) . '../../Config/config.php';
require_once 'conexionModel.php';


class Cliente extends stdClass
{
    private $id;
    private $tipo_documento;
    private $numero_documento;
    private $primer_nombre;
    private $segundo_nombre;
    private $primer_apellido;
    private $segundo_apellido;
    private $sexo;
    private $ciudad;
    private $email;
    private $direccion;
    private $telefono;
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
        $datos_clientes = [];

        try {
            $sql  = 'SELECT * FROM personas WHERE id = :id';
            $query = $this->database->conexion()->prepare($sql);
            $query->execute([
                'id' => $id
            ]);

            while ($row = $query->fetch()) {
                $item            = new Cliente();
                $item->id               = $row['id'];
                $item->tipo_documento = $row['id_tipo_documento'];
                $item->numero_documento = $row['numero_documento'];
                $item->primer_nombre    = $row['primer_nombre'];
                $item->segundo_nombre   = $row['segundo_nombre'];
                $item->primer_apellido  = $row['primer_apellido'];
                $item->segundo_apellido = $row['segundo_apellido'];
                $item->sexo             = $row['sexo'];
                $item->ciudad           = $row['id_ciudad'];
                $item->telefono           = $row['telefono'];
                $item->email            = $row['email'];
                $item->direccion        = $row['direccion'];

                array_push($datos_clientes,$item);
            }

            return $datos_clientes;
        } catch (PDOException $e) {
            return ['mensaje' => $e];
        }
    }
    public function getAll()
    {
        $items = [];

        try {
            $sql = 'SELECT  id_tipo_documento, numero_documento , primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, sexo, telefono, ciudad, email, direccion FROM personas';
            $query = $this->database->conexion()->query($sql);

            while ($row = $query->fetch()) {
                $item            = new Cliente();
                $item->id               = $row['id'];
                $item->tipo_documento = $row['id_tipo_documento'];
                $item->numero_documento = $row['numero_documento'];
                $item->primer_nombre    = $row['primer_nombre'];
                $item->segundo_nombre   = $row['segundo_nombre'];
                $item->primer_apellido  = $row['primer_apellido'];
                $item->segundo_apellido = $row['segundo_apellido'];
                $item->sexo             = $row['sexo'];
                $item->telefono         = $row['telefono'];
                $item->ciudad           = $row['ciudad'];
                $item->email            = $row['email'];
                $item->direccion        = $row['direccion'];


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
            $sql = 'INSERT INTO personas( id_tipo_documento, numero_documento,primer_nombre,segundo_nommbre,primer_apellido,segundo_apellido,sexo,telefono,ciudad,email,direccion ) 
            VALUES(:id_tipo_documento, :numero_documento, :primer_nombre, :segundo_nombre, :primer_apelido, :segundo_apellido, :sexo, :telefono, :ciudad, :email, :direccion)';

            $prepare = $this->database->conexion()->prepare($sql);
            $query = $prepare->execute([

                
                'id_tipo_documento  ' => $datos['id_tipo_documento'],
                'numero_documento' => $datos['numero_documento'],
                'primer_nombre   ' => $datos['primer_nombre'],
                'segundo_nombre  ' => $datos['segundo_nombre'],
                'primer_apellido ' => $datos['primer_apellido'],
                'segundo_apellido' => $datos['segundo_apellido'],
                'sexo            ' => $datos['sexo'],
                'telefono'         => $datos['telefono'],
                'ciudad          ' => $datos['ciudad'],
                'email           ' => $datos['email'],
                'direccion       ' => $datos['direccion'],
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
            $sql = 'UPDATE personas SET 
              
              id_tipo_documento= :id_tipo_documento,
              numero_documento = :numero_documento,
              primer_nombre = :primer_nombre,
              segundo_nommbre = :segundo_nommbre,
              primer_apellido = :primer_apellido,
              segundo_apellido = :segundo_apellido,
              sexo = :sexo,
              ciudad = :ciudad,
              email = :email,
              direccion = :direccion,
              rol WHERE id = :id';

            $prepare = $this->database->conexion()->prepare($sql);
            $query = $prepare->execute([
                'id'        => $datos['id'],
                'id_tipo_documento  ' => $datos['id_tipo_documento'],
                'numero_documento' => $datos['numero_documento'],
                'primer_nombre   ' => $datos['primer_nombre'],
                'segundo_nombre  ' => $datos['segundo_nombre'],
                'primer_apellido ' => $datos['primer_apellido'],
                'segundo_apellido' => $datos['segundo_apellido'],
                'sexo            ' => $datos['sexo'],
                'ciudad          ' => $datos['ciudad'],
                'email           ' => $datos['email'],
                'direccion       ' => $datos['direccion'],
               
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
            $sql = 'DELETE FROM personas WHERE id = :id';

            $prepare = $this->database->conexion()->prepare($sql);
            $query = $prepare->execute([
                'id'        => $id
            ]);
            if ($query) {
                 return true;
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
}
