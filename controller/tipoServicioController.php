<?php 
require_once '../models/tipoServicioModel.php';
$controller = new ServicioController;
class ServicioController 
{

    private $servicio;

    public function __construct()
    {
        $this->servicio = new Servicios();

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
        return $this->servicio->getAll();
    }
    public function store()
    {
        $datos = [
            'servicio'     => $_REQUEST['servicio']
        ];
        $result = $this->servicio->store($datos);
        if ($result) {
            header("Location: ../views/tipo_servicio/index.php");
            exit();
        } else {
            echo $error = "ocurrio un error";
        }
    }
    public function show()
    {
        $id = $_REQUEST['id_tipo_servicio'];
        header("Location: ../views/tipo_servicio/index.php");
    }
    public function delete()
    {
        $this->servicio->delete($_REQUEST['id']);
        header("Location: ../views/tipo_servicio/index.php");
    }
    public function update()
    {
        $datos = [
            'id_tipo_servicio' => $_REQUEST['id_tipo_servicio'],
            'servicio' => $_REQUEST['servicio']
        ];
        $result = $this->servicio->update($datos);

        if ($result) {
            header("Location: ../views/tipo_servicio/update.php");
            exit();
        }
        return $result;
    }
}
