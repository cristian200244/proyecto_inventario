<?php

require_once '../models/clienteModel.php';

$controller = new ClienteController;

class ClienteController
{

    private $cliente;

    public function __construct()
    {

        $this->cliente = new Cliente();

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
        return  $this->cliente->getAll();
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
            'id_sexo'           => $_REQUEST['id_sexo'],
            'id_ciudad'         => $_REQUEST['id_ciudad'],
            'telefono'          => $_REQUEST['telefono'],
            'correo'            => $_REQUEST['correo'],
            'direccion'         => $_REQUEST['direccion'],
        ];
        $result = $this->cliente->store($datos);
        if ($result) {
            header("Location: ../views/clientes/index.php");
            exit();
        } else {
            echo $error = "Ocurrió un error";
        }
    }

    public function show()
    {
        $id_persona = $_REQUEST['id_persona'];
        header("Location: ../views/clientes/show.php?id_persona=" . $id_persona);
    }

    public function delete()
    {
        $this->cliente->delete($_REQUEST['id_persona']);
        header("Location: ../views/clientes/index.php");
    }

    public function update()
    {
    
        $datos = [
            'id'        => $_REQUEST['id'],
            'id_tipo_documento' => $_REQUEST['id_tipo_documento'],
            'numero_documento'  => $_REQUEST['numero_documento'],
            'primer_nombre'     => $_REQUEST['primer_nombre'],
            'segundo_nombre'    => $_REQUEST['segundo_nombre'],
            'primer_apellido'   => $_REQUEST['primer_apellido'],
            'segundo_apellido'  => $_REQUEST['segundo_apellido'],
            'id_sexo'              => $_REQUEST['id_sexo'],
            'telefono'          => $_REQUEST['telefono'],
            'id_ciudad'         => $_REQUEST['id_ciudad'],
            'correo'            => $_REQUEST['correo'],
            'direccion'         => $_REQUEST['direccion'],

        ];
         

        $result = $this->cliente->update($datos);

        if ($result) {
            header("Location: ../views/clientes/index.php");
            exit();
        }

        return $result;
    }
}
