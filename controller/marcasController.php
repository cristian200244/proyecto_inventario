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
        header("Location: ../views/marcas/index.php?id_marca=" . $id);
    }
    public function delete()
    {
        $this->marca->delete($_REQUEST['id_marca']);
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
            header("Location: ../views/marcas/index.php");
            exit();
        }
        return $result;
    }
}
