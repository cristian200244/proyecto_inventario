<?php

require_once '../models/usuarioModel.php';

$controller = new UsuarioController;

class UsuarioController
{

    private $usuario;

    public function __construct()
    {

        $this->usuario = new Usuario();

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
                    case '5': //eliminar el registro
                      
                        
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

            'id_tipo_documento' => $_REQUEST['id_tipo_documento'],
            'numero_documento'  => $_REQUEST['numero_documento'],
            'primer_nombre'     => $_REQUEST['primer_nombre'],
            'segundo_nombre'    => $_REQUEST['segundo_nombre'],
            'primer_apellido'   => $_REQUEST['primer_apellido'],
            'segundo_apellido'  => $_REQUEST['segundo_apellido'],
            'sexo'              => $_REQUEST['sexo'],
            'id_ciudad'         => $_REQUEST['id_ciudad'],
            'telefono'          => $_REQUEST['telefono'],
            'correo'            => $_REQUEST['correo'],
            'direccion'         => $_REQUEST['direccion'],
            'password'         => $_REQUEST['password'],
        ];
        $result = $this->usuario->store($datos);
        if ($result) {
            header("Location: ../views/admin/index.php");
            exit();
        } else {
            echo $error = "Ocurrió un error";
        }
    }

    public function show()
    {
        $id = $_REQUEST['id'];
        header("Location: ../views/admin/show?id=" . $id);
    }

    public function delete()
    {
        $this->usuario->delete($_REQUEST['id']);
        header("Location: ../views/admin/show.php");
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
            'telefono'         => $_REQUEST['telefono'],
            'id_ciudad'        => $_REQUEST['id_ciudad'],
            'correo'           => $_REQUEST['correo'],
            'direccion'        => $_REQUEST['direccion'],
            'password'         => $_REQUEST['password'],

        ];
        var_dump($datos);

        $result = $this->usuario->update($datos);

        if ($result) {
            header("Location: ../views/admin/show.php");
            exit();
        }

        return $result;
    }
}
