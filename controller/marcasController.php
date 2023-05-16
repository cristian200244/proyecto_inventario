<?php

require_once '../models/marcasModel.php';
$controller = new MarcasController;
class MarcasController
{
    private $marca;

    public function __construct()
    {
        $this->marca = new Marcas();

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
        return $this->marca->getAll();
    }
    public function store()
    {
        $datos = [
            'nombre' => $_REQUEST['nombre']
        ];
         $result = $this->marca->store($datos);
        if ($result) {
            header('Location: ../views/marcas/index.php');
            exit();
        } else {
            echo $error = 'ocurrio un error';
        }
    }
    public function show()
    {
        $id = $_REQUEST['id_marca'];
        header("Location: ../views/marcas/index.php");
    }
    public function delete()
    {
        $this->marca->delete($_REQUEST['id']);
        header('Location: ../views/marcas/index.php');
    }
    public function update()
    {
        $datos = [
            'id_marca' => $_REQUEST['id_marca'],
            'nombre' => $_REQUEST['nombre']

        ];
        $result = $this->marca->update($datos);

        if ($result) {
            header("Location: ../views/marcas/update.php");
            exit();
        }
        return $result;
    }
}
