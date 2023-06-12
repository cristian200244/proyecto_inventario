<?php
require_once '../models/facturaModel.php';

$controller = new facturaControllers;
class facturaControllers
{
  
    private $factura;
    public function __construct()
    {
        $this->factura = new Factura();

        if (isset($_REQUEST['c'])) {
            switch ($_REQUEST['c']) {
                case '1': //Almacenar en la base de datos
                    self::store();
                     break;
                default:
                    self::index();
                    break;
            }
        }
    }
    public function index()
    {
        return $this->factura->getAll();
    }
 public function store()
    {

        $datos = [
        
            'id_persona'           => $_REQUEST['id_persona'],
            'id_tipo_dispositivo'  => $_REQUEST['id_tipo_dispositivo'],
            'id_servicio'          => $_REQUEST['id_servicio'],
            'fecha'                => $_REQUEST['fecha'],
            'total'                => $_REQUEST['total']
        ];
        $result = $this->factura->store($datos);
        if ($result) {
            header("Location: ../views/facturas/index.php");
            exit();
        } else {
            echo $error = "ocurrio un me mensaje";
        }
    }
   
}
