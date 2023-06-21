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
        header("Location: ../views/sexo/index.php?id_sexo=".$id);
    }
    public function delete()
    {
        
        $sexos = $_REQUEST['id_sexo'];
        $result= $this->sexo->delete($sexos);
        if($result){
            header('Location: ../views/sexo/index.php');
            exit();
        }
    }
    public function update()
    {
         $datos = [
            'id_sexo' => $_REQUEST['id_sexo'],
            'nombre' => $_REQUEST['nombre']

        ];
        $result = $this->sexo->update($datos);

        if ($result) {
            header('Location: ../views/sexo/index.php');
            exit();
        }
        return $result;
    }
}



