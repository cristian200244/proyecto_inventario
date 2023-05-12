<?php

include_once dirname(__FILE__) . '../../Config/config.php';
require_once 'conexionModel.php';


class Usuario extends stdClass
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
                $item                   = new Usuario();
                $item->id               = $row['id'];
                $item->tipo_documento   = $row['id_tipo_documento'];
                $item->numero_documento = $row['numero_documento'];
                $item->primer_nombre    = $row['primer_nombre'];
                $item->segundo_nombre   = $row['segundo_nombre'];
                $item->primer_apellido  = $row['primer_apellido'];
                $item->segundo_apellido = $row['segundo_apellido'];
                $item->sexo             = $row['sexo'];
                $item->ciudad           = $row['id_ciudad'];
                $item->telefono         = $row['telefono'];
                $item->email            = $row['email'];
                $item->direccion        = $row['direccion'];

                array_push($datos_usuario,$item);
            }

            return $datos_usuario;
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

            while ($row                 = $query->fetch()) {
                $item                   = new Usuario();
                $item->id               = $row['id'];
                $item->tipo_documento   = $row['id_tipo_documento'];
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

                
                'id_tipo_documento'   => $datos['id_tipo_documento'],
                'numero_documento'    => $datos['numero_documento'],
                'primer_nombre'       => $datos['primer_nombre'],
                'segundo_nombre'      => $datos['segundo_nombre'],
                'primer_apellido'    => $datos['primer_apellido'],
                'segundo_apellido'    => $datos['segundo_apellido'],
                'sexo'                => $datos['sexo'],
                'telefono'            => $datos['telefono'],
                'ciudad'              => $datos['ciudad'],
                'email'               => $datos['email'],
                'direccion'           => $datos['direccion'],
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
              
              id_tipo_documento  =   :id_tipo_documento,
              numero_documento   =   :numero_documento,
              primer_nombre      =   :primer_nombre,
              segundo_nommbre    =   :segundo_nommbre,
              primer_apellido    =   :primer_apellido,
              segundo_apellido   =   :segundo_apellido,
              sexo               =   :sexo,
              ciudad             =   :ciudad,
              email              =   :email,
              direccion          =   :direccion,
              rol WHERE id       =   :id';

            $prepare = $this->database->conexion()->prepare($sql);
            $query = $prepare->execute([
                'id'                  => $datos['id'],
                'id_tipo_documento'   => $datos['id_tipo_documento'],
                'numero_documento'    => $datos['numero_documento'],
                'primer_nombre'       => $datos['primer_nombre'],
                'segundo_nombre'      => $datos['segundo_nombre'],
                'primer_apellido '    => $datos['primer_apellido'],
                'segundo_apellido'    => $datos['segundo_apellido'],
                'sexo'                => $datos['sexo'],
                'ciudad'              => $datos['ciudad'],
                'email'               => $datos['email'],
                'direccion'           => $datos['direccion'],
               
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


//---------------------------------------------------------------//
    // -------------------------------getter------------------------//

    public function getTipoDocumento()
    {
        return $this->tipo_documento;
    }

    public function getNumeroDocumento()
    {
        return $this->numero_documento;
    }

    public function getPrimerNombre()
    {
        return $this->primer_nombre;
    }

    public function getSegundoNombre()
    {
        return $this->segundo_nombre;
    }

    public function getPrimerApellido()
    {
        return $this->primer_apellido;
    }

    public function getSegundoApellido()
    {
        return $this->segundo_apellido;
    }

    public function getSexo()
    {
        return $this->sexo;
    }

    public function getCiudad()
    {
        return $this->ciudad;
    }

    public function getEmail()
    {
        return $this->correo;
    }

    public function getDireccion()
    {
        return $this->direccion;
    }

    public function getTelefono()
    {
        return $this->telefono;
    }

    //---------------------------------------------------------------//
    // -------------------------------setter------------------------//

    public function setTipo_documento($tipo_documento)
    {
        return $this->tipo_documento;
    }
    public function setNumero_documento($numero_documento)
    {
        return $this->numero_documento;
    }
    public function setPrimer_nombre($primer_nombre)
    {
        return $this->primer_nombre;
    }
    public function setSegundo_nombre($segundo_nombre)
    {
        return $this->segundo_nombre;
    }
    public function setPrimer_apellido($primer_apellido)
    {
        return $this->primer_apellido;
    }
    public function setSegundo_apellido($segundo_apellido)
    {
        return $this->segundo_apellido;
    }
    public function setSexo($sexo)
    {
        return $this->sexo;
    }
    public function setCiudad($ciudad)
    {
        return $this->ciudad;
    }
    public function setCorreo($correo)
    {
        return $this->correo;
    }
    public function setDireccion($direccion)
    {
        return $this->direccion;
    }
    public function setTelefono($telefono)
    {
        return $this->telefono;
    }
}