<?php

require_once '../models/usuarioModel.php';

$controller = new UsuarioController;

class UsuarioController
{

    private $usuario;

    public function __construct()
    {

        $this->usuario = new Usuario;

        if (isset($_REQUEST['c'])) {
            switch ($_REQUEST['c']) {
                case '1': //Almacenar en la base de datos
                    self::store();
                    break;
                case '2': //ver usuario
                    self::show();
                    break;
                case '3': //Actualizar el registro
                    self::update();
                    break;
                case '4': //eliminar el registro
                    self::delete();
                    break;
                default:
                    self::index();
                    break;
            }
        }
    }
    
    public function index()
    {
        return  $this->usuario->getAll();
    }
    public function store()
    {
        $datos = [
            'rol'               => $_REQUEST['rol'],
            'id_tipo_documento' => $_REQUEST['id_tipo_documento'],
            'numero_documento'  => $_REQUEST['numero_documento'],
            'primer_nombre'     => $_REQUEST['primer_nombre'],
            'segundo_nombre'    => $_REQUEST['segundo_nombre'],
            'primer_apellido'   => $_REQUEST['primer_apellido'],
            'segundo_apellido'  => $_REQUEST['segundo_apellido'],
            'sexo'              => $_REQUEST['sexo'],
            'ciudad'            => $_REQUEST['ciudad'],
            'email'             => $_REQUEST['email'],
            'direccion'         => $_REQUEST['direccion'],
        ];
        $result = $this->usuario->store($datos);
        if ($result) {
            header("Location: ../views/clientes/index.php");
            exit();
        } else {
            echo $error = "Ocurrió un error";
        }
    }
    public function show()
    {
        $id = $_REQUEST['id'];
        header("Location: ../views/clientes/calculadora/consult.php?id=" . $id);
    }
    public function delete()
    {
        $this->usuario->delete($_REQUEST['id']);
        header("Location: ../views/clientes/show.php");
    }
    public function update()
    {
        $datos = [

            'rol'              => $_REQUEST['rol'],
            'tipo_documento'   => $_REQUEST['tipo_documento'],
            'numero_documento' => $_REQUEST['numero_documento'],
            'primer_nombre'    => $_REQUEST['primer_nombre'],
            'segundo_nombre'   => $_REQUEST['segundo_nombre'],
            'primer_apellido'  => $_REQUEST['primer_apellido'],
            'segundo_apellido' => $_REQUEST['segundo_apellido'],
            'sexo'             => $_REQUEST['sexo'],
            'ciudad'           => $_REQUEST['ciudad'],
            'email'            => $_REQUEST['email'],
            'direccion'        => $_REQUEST['direccion'],
            
        ];

        $result = $this->usuario->update($datos);

        if ($result) {
            header("Location: ../views/clientes/show.php");
            exit();
        }

        return $result;
    }
}
