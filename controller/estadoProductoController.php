<?php

require_once '../models/estadoProductoModel.php';
$controller = new EstadoController;
class EstadoController 
{

    private $estado;

    public function __construct()
    {
        $this->estado = new EstadoProducto();

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
        return $this->estado->getAll();
    }
    public function store()
    {
        $datos = [
            'estado'     => $_REQUEST['estado']
        ];
        $result = $this->estado->store($datos);
        if ($result) {
            header("Location: ../views/estado_producto/index.php");
            exit();
        } else {
            echo $error = "ocurrio un error";
        }
    }
    public function show()
    {
        $id = $_REQUEST['id_estado_producto'];
        header("Location: ../views/estado_producto/index.php?id_estado_producto=" . $id);
    }
    public function delete()
    {
        $this->estado->delete($_REQUEST['id_estado_producto']);
        header("Location: ../views/estado_producto/index.php");
    }
    public function update()
    {
        $datos = [
            'id_estado_producto' => $_REQUEST['id_estado_producto'],
            'estado' => $_REQUEST['estado']
        ];
        $result = $this->estado->update($datos);

        if ($result) {
            echo json_encode(array('succes' => 1, 'estado'=>$datos['estado']));

        }
        
    }
}
