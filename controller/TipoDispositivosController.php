<?php

require_once '../models/TipoDispositivosModel.php';
$controller = new DispositivoController;
class DispositivoController
{

    private $dispositivo;

    public function __construct()
    {
        $this->dispositivo = new Dispositivos();

        if (isset($_REQUEST['c'])) {
            switch ($_REQUEST['c']) {
                case '1': 
                    self::store();
                    break;
                case '2': 
                    self::show();
                    break;
                case '3':
                    self::update();
                    break;
                case '4':
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
        return $this->dispositivo->getAll();
    }
    public function store()
    {
        $datos = [
            'nombre'     => $_REQUEST['nombre']
        ];
        $result = $this->dispositivo->store($datos);
        if ($result) {
            header("Location: ../views/tipo_dispositivos/index.php");
            exit();
        } else {
            echo $error = "ocurrio un error";
        }
    }
    public function show()
    {
        $id = $_REQUEST['id_tipo_dispositivo'];
        header("Location: ../views/tipo_dispositivos/index.php?id_tipo_dispositivo=" . $id);
    }
    public function delete()
    {
        $this->dispositivo->delete($_REQUEST['id_tipo_dispositivo']);
        header("Location: ../views/tipo_dispositivos/index.php");
    }
    public function update()
    {
        $datos = [
            'id_tipo_dispositivo' => $_REQUEST['id_tipo_dispositivo'],
            'nombre' => $_REQUEST['nombre']
        ];
        $result = $this->dispositivo->update($datos);

        if ($result) {
            echo json_encode(array('succes' => 1, 'nombre' => $datos['nombre']));
        }
    }
}
