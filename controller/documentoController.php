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
        return $this->documento->getAll();
    }

    public function store()
    {
 
        $datos = ['tipo' => $_REQUEST['tipo']];
        $result = $this->documento->store($datos);
         if ($result) {
            header("Location: ../views/tipo_documento/index.php ");
            exit();
        }else{
            echo $error = "ocurrio un error";
        }
    }

    public function update()
    {
        $datos = [
            'tipo' => $_REQUEST['tipo']
        ];
        $result = $this->documento->update($datos);

        if ($result) {
            header("Location: ../views/tipo_documento/update.php");
            exit();
        }
        return $result;
    }

    public function show()
    {
        $id = $_REQUEST['id_tipo_documento'];
        header("Location: ../views/tipo_documento/index.php");
    }
    public function delete()
    {
        $documentos = $_REQUEST['id_tipo_documento'];
        $result= $this->documento->delete($documentos);
        if($result){
            header("Location: ../views/tipo_documento/index.php");
            exit();
        }
    }
}
