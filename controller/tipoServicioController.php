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
        header("Location: ../views/tipo_servicio/index.php?id__tipo_servicio=".$id);
    }
    public function delete()
    {
        
        $servicios = $_REQUEST['id_tipo_servicio'];
        $result= $this->servicio->delete($servicios);
        if($result){
            header("Location: ../views/tipo_servicio/index.php");
            exit();
        }
    }
    public function update()
    {
        $datos = [
            'id_tipo_servicio' => $_REQUEST['id_tipo_servicio'],
            'servicio' => $_REQUEST['servicio']
        ];
        $result = $this->servicio->update($datos);

        if ($result) {
            echo json_encode(array('succes' => 1, 'servicio'=>$datos['servicio']));
        }
         
    }
}
