<?php

require_once '../models/rolesModel.php';
$controller = new RolesController;
class RolesController 
{

    private $roles;

    public function __construct()
    {
        $this->roles = new Roles();

        if (isset($_REQUEST['c'])) {
            switch ($_REQUEST['c']) {
                case '1': //Almacenar en la base de datos
                    self::store(); 
                    break;
                case '2': //ver usuario
                    self::show();
                    break;
               
                    self::index();
                    break;
            }
        }
    }

    public function index()
    {
        return $this->roles->getAll();
    }
    public function store()
    {
        $datos = [
            'nombre'     => $_REQUEST['nombre']
        ];
        $result = $this->roles->store($datos);
        if ($result) {
            header("Location: ../views/roles/index.php");
            exit();
        } else {
            echo $error = "ocurrio un error";
        }
    }
    public function show()
    {
        $id = $_REQUEST['id_rol'];
        header("Location: ../views/roles/index.php");
    }
    
}
