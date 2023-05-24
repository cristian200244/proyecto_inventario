<?php
require_once '../models/documentoModel.php';
$controller = new TipoDocumentoController;
class TipoDocumentoController
{
    private $documento;
    public function __construct()
    {
        $this->documento = new TipoDocumento();
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
        return $this->documento->getAll();
    }

    public function store()
    {
        $datos = [
            'tipo' => $_REQUEST['tipo']
        ];
        $result = $this->documento->store($datos);
         if ($result) {
            header("Location: ../views/tipo_documento/index.php ");
            exit();
        }else{
            echo $error = "ocurrio un error";
        }
    }

    public function show()
    {
        $id = $_REQUEST['id_tipo_documento'];
        header("Location: ../views/tipo_documento/index.php?id_tipo_documento=" .$id);
    }
    public function delete()
    {
        $this->documento->delete($_REQUEST['id_tipo_documento']);
        header("Location: ../views/tipo_documento/index.php");
    }
    public function update()
    {
        $datos = [
            'id_tipo_documento' => $_REQUEST['id_tipo_documento'],
            'tipo' => $_REQUEST['tipo']
        ];
        $result = $this->documento->update($datos);

        if ($result) {
            echo json_encode(array('succes' => 1, 'tipo'=>$datos['tipo']));
        }
        
    }
}
