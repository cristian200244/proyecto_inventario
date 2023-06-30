<?php

use App\Database as Db2;

include_once dirname(__FILE__) . '../../Config/config.php';
require_once 'conexionModel.php';
// require_once '../controller/usuarioController.php';

class Usuario extends stdClass
{
    private $id_persona;
    private $tipo_documento;
    private $numero_documento;
    private $primer_nombre;
    private $segundo_nombre;
    private $primer_apellido;
    private $segundo_apellido;
    private $sexo;
    private $ciudad;
    public $correo;
    private $direccion;
    private $telefono;
    private $database;
    private $password;
    



    public function __construct()
    {
        $this->database = new Database();
    }
    public function getId()
    {
        return $this->id_persona;
    }
    public function getById($id_persona)
    {
        $datos_usuario = [];
        try {
            $sql  = 'SELECT * FROM personas WHERE id_persona = id_persona';
            $query = $this->database->conexion()->prepare($sql);
            $query->execute([
                'id_persona' => $id_persona
            ]);

            while ($row = $query->fetch()) {
                $item = new Usuario();
                $item->id_persona       = $row['$id_persona'];
                $item->tipo_documento   = $row['id_tipo_documento'];
                $item->numero_documento = $row['numero_documento'];
                $item->primer_nombre    = $row['primer_nombre'];
                $item->segundo_nombre   = $row['segundo_nombre'];
                $item->primer_apellido  = $row['primer_apellido'];
                $item->segundo_apellido = $row['segundo_apellido'];
                $item->sexo             = $row['id_sexo'];
                $item->ciudad           = $row['id_ciudad'];
                $item->telefono         = $row['telefono'];
                $item->correo           = $row['correo'];
                $item->direccion        = $row['direccion'];


                array_push($datos_usuario, $item);
            }

            return $datos_usuario;
        } catch (PDOException $e) {
            return ['mensaje' => $e];
        }
    }

    //datos del Administrador 
    public function getAll()
    {
        $items = [];

        try {
            $sql = 'SELECT  id_persona, id_tipo_documento, numero_documento , primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, id_sexo, telefono, c.nombre AS id_ciudad, correo, direccion 
            FROM personas AS p
            JOIN ciudades AS c ON  p.id_ciudad = c.id_ciudad
             WHERE id_rol = 1
            ORDER BY id_persona DESC';
            $query = $this->database->conexion()->query($sql);

            while ($row = $query->fetch()) {

                $item                   = new Usuario();
                $item->id_persona               = $row['id_persona'];
                $item->tipo_documento   = $row['id_tipo_documento'];
                $item->numero_documento = $row['numero_documento'];
                $item->primer_nombre    = $row['primer_nombre'];
                $item->segundo_nombre   = $row['segundo_nombre'];
                $item->primer_apellido  = $row['primer_apellido'];
                $item->segundo_apellido = $row['segundo_apellido'];
                $item->sexo             = $row['id_sexo'];
                $item->telefono         = $row['telefono'];
                $item->ciudad           = $row['id_ciudad'];
                $item->correo           = $row['correo'];
                $item->direccion        = $row['direccion'];
                // $item->password        = $row['password'];


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
            $sql = 'INSERT INTO personas( id_tipo_documento, numero_documento, primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, id_sexo, telefono, id_ciudad, correo, direccion ) 
            VALUES(:id_tipo_documento, :numero_documento, :primer_nombre, :segundo_nombre, :primer_apellido, :segundo_apellido, :id_sexo, :telefono, :id_ciudad, :correo, :direccion)';

            $prepare = $this->database->conexion()->prepare($sql);
            $query = $prepare->execute([
              


                'id_tipo_documento' => $datos['id_tipo_documento'],
                'numero_documento'  => $datos['numero_documento'],
                'primer_nombre'     => $datos['primer_nombre'],
                'segundo_nombre'    => $datos['segundo_nombre'],
                'primer_apellido'   => $datos['primer_apellido'],
                'segundo_apellido'  => $datos['segundo_apellido'],
                'id_sexo'              => $datos['id_sexo'],
                'telefono'          => $datos['telefono'],
                'id_ciudad'         => $datos['id_ciudad'],
                'correo'            => $datos['correo'],
                'direccion'         => $datos['direccion'],

               
 
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
               
              id_tipo_documento = :id_tipo_documento,
              numero_documento  = :numero_documento,
              primer_nombre     = :primer_nombre,
              segundo_nombre    = :segundo_nombre,
              primer_apellido   = :primer_apellido,
              segundo_apellido  = :segundo_apellido,
              telefono          = :telefono,
              id_sexo           = :id_sexo,
              id_ciudad         = :id_ciudad,
              correo            = :correo,
              direccion         = :direccion
              WHERE id_persona  = :id_persona';

            $prepare = $this->database->conexion()->prepare($sql);
            $query = $prepare->execute([
                'id_persona'        => $datos['id_persona'],
                'id_tipo_documento' => $datos['id_tipo_documento'],
                'numero_documento'  => $datos['numero_documento'],
                'primer_nombre'     => $datos['primer_nombre'],
                'segundo_nombre'    => $datos['segundo_nombre'],
                'primer_apellido'   => $datos['primer_apellido'],
                'segundo_apellido'  => $datos['segundo_apellido'],
                'telefono'          => $datos['telefono'],
                'id_sexo'           => $datos['id_sexo'],
                'id_ciudad'         => $datos['id_ciudad'],
                'correo'            => $datos['correo'],
                'direccion'         => $datos['direccion']


            ]);
            if ($query) {
                return true;
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function delete($id_persona)
    {
        try {
            $sql = 'DELETE FROM personas WHERE id_persona = :id_persona';

            $prepare = $this->database->conexion()->prepare($sql);
            $query = $prepare->execute([
                'id_persona'        => $id_persona
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

    public function getCorreo()
    {
        return $this->correo;
    }

    public function getPassword()
    {
        return $this->password;
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
        $this->tipo_documento = $tipo_documento;
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
    public function setPassword($password)
    {
        return $this->password;
    }



    public function getUser($datos)
    {

        $correo = $datos["correo"];
        $pass   = md5($datos['password']);

        try {

            $sql = "SELECT id, password, correo FROM usuarios WHERE `correo` = '$correo' AND `password` = '$pass' ";
            require __DIR__ . '/../app/vendor/autoload.php';

            $db = new Db2();

            $stmt = $db->execute($sql);
            $result = $stmt->fetchObject();

            return $result;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function mostrarContraseña()
    {

        $sql = "SELECT id, password FROM usuarios WHERE correo = correo AND PASSWORD = password";
        $query = $this->database->conexion()->query($sql);

        $result = $query->fetchObject();
        return $result;
    }
}
