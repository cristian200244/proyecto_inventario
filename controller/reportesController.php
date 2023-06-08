<?php
require_once '../models/reportesModel.php';


$controller = new ReportController;



class ReportController {

    private $reportes;


   public function __construct()
    {
        $this->reportes = new ReportModel();

        if (isset($_REQUEST['c'])) {
            switch ($_REQUEST['c']) {
                case '1': //ver usuario
                    self::index();
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

}