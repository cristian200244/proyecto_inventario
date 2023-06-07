<?php
require_once '../models/facturaModel.php';

$controller = new ReportController;



class ReportController {

    private $reportes;


   public function __construct()
    {
        $this->reportes = new ReportModel();

        if (isset($_REQUEST['c'])) {
            switch ($_REQUEST['c']) {
                case '1': //Almacenar en la base de datos
                    self::show();
                     break;
                default:
                    self::index();
                    break;
            }
        }
    }
    public function index()
    {
        return $this->reportes->getAll();
    }

    public function show()
    {
        $fecha = $_REQUEST['fecha'];
        header("Location: ../views/reportes/index.php?fecha=" . $fecha);
    }

   // $ventasModel = new ReportModel();
   // $fechaVenta = $ventasModel->();
}