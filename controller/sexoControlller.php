<?php

require_once '../models/sexoModel.php';
$controller = new SexoController;
class SexoController
{
    private $sexo;

    public function __construct()
    {
        $this->sexo = new Sexo();

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
        return $this->sexo->getAll();
    }
    public function store()
    {
        $datos = [
            'nombre' => $_REQUEST['nombre']
        ];
         $result = $this->sexo->store($datos);
        if ($result) {
            header('Location: ../views/sexo/index.php');
            exit();
        } else {
            echo $error = 'ocurrio un error';
        }
    }
    public function show()
    {
        $id = $_REQUEST['id_sexo'];
        header("Location: ../views/sexo/index.php");
    }
    public function delete()
    {
        $this->sexo->delete($_REQUEST['id']);
        header('Location: ../views/sexo/index.php');
    }
    public function update()
    {
        $datos = [
            'id_marca' => $_REQUEST['id_marca'],
            'nombre' => $_REQUEST['nombre']

        ];
        $result = $this->sexo->update($datos);

        if ($result) {
            header("Location: ../views/sexo/update.php");
            exit();
        }
        return $result;
    }
}



