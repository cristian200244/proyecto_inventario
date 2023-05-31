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
                case '2': //ver usuario
                    self::show();
                    break;
                case '3': //Actualizar el registro
                    self::update();
                    break;

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
            'codigo'                => $_REQUEST['codigo'],
            'id_estado_producto'    => $_REQUEST['id_estado_producto'],
            'falla'                 => $_REQUEST['falla'],
            'fecha'                 => $_REQUEST['fecha'],
        ];
        $result = $this->servicios->store($datos);
        if ($result) {
            header("Location: ../views/servicios/index.php");
            exit();
        } else {
            echo $error = "ocurrio un me mensaje";
        }
    }
    public function show()
    {
        $id = $_REQUEST['id_servicio'];
        header("Location: ../views/servicios/update.php?id_servicio=". $id);
    }
    public function update()
    {
        $datos = [
            'id_servicio'           => $_REQUEST['id_servicio'],
            'id_persona'            => $_REQUEST['id_persona'],
            'id_tipo_dispositivo'   => $_REQUEST['id_tipo_dispositivo'],
            'id_marca'              => $_REQUEST['id_marca'],
            'id_tipo_servicio'      => $_REQUEST['id_tipo_servicio'],
            'codigo'                => $_REQUEST['codigo'],
            'id_estado_producto'    => $_REQUEST['id_estado_producto'],
            'falla'                 => $_REQUEST['falla'],
            'fecha'                 => $_REQUEST['fecha'],

        ];

        $result = $this->servicios->update($datos);

        if ($result) {
            header("Location: ../views/servicios/index.php");
            exit();
        }

        return $result;
    }
}
