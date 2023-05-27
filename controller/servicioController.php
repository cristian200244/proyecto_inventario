<?php
require_once '../models/servicioModel.php';

$controller = new ServiciosController;
class ServiciosController
{
    private $servicios;
    public function __construct()
    {
        $this->servicios = new ServiciosModel();

        if (isset($_REQUEST['c'])) {
            switch ($_REQUEST['c']) {
                case '1': //Almacenar en la base de datos
                    self::store();
                    break;
                    // case '2': //ver usuario
                    //     self::show();
                    //     break;
                    // case '3': //Actualizar el registro
                    //     self::update();
                    //     break;
                    // case '4': //eliminar el registro
                    //     self::delete();
                    //     break;
                default:
                    self::index();
                    break;
            }
        }
    }
    public function index()
    {
        return $this->servicios->getAll();
    }
    public function store()
    {

        $datos = [
            'id_persona'            => $_REQUEST['id_persona'],
            'id_tipo_dispositivo'   => $_REQUEST['id_tipo_dispositivo'],
            'id_marca'              => $_REQUEST['id_marca'],
            'id_tipo_servicio'      => $_REQUEST['id_tipo_servicio'],
            'id_codigo'             => $_REQUEST['id_codigo'],
            'id_estado_producto'    => $_REQUEST['id_estado_producto'],
            'falla'                 => $_REQUEST['falla'],
            'fecha'                 => $_REQUEST['fecha'],
        ];
        $result = $this->servicios->store($datos);
        if ($result) {
            header("Location: ../views/servicios/create.php");
            exit();
        } else {
            echo $error = "ocurrio un me mensaje";
        }
    }
}
