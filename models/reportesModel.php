<?php
include_once dirname(__FILE__) . '../../Config/config.example.php';
require_once 'conexionModel.php';



class ReportModel
{
    private $database;
    private $fecha;
    private $anio;
    private $mes;
    private $total;

    public function __construct()
    {
        $this->database = new Database();
    }

    public function getAll()
    {
        $items = [];

        try {
            $sql = "SELECT YEAR(fecha) AS anio, DATE_FORMAT(fecha, '%M') AS mes, SUM(total) AS total
            FROM facturas
            GROUP BY YEAR(fecha), DATE_FORMAT(fecha, '%M')
            ORDER BY  YEAR(fecha) DESC,DATE_FORMAT(fecha, '%M') DESC";
            $query = $this->database->conexion()->query($sql);

            while ($row = $query->fetch()) {
                $item =       new ReportModel();
                $item->anio  = $row['anio'];
                $item->mes   = $row['mes'];
                $item->total = $row['total'];

                array_push($items, $item);
            }

            return $items;
        } catch (PDOException $e) {
            return ['mensaje' => $e];
        }
    }
    

    public function getFecha()
    {
        return $this->fecha;
    }
    public function getTotal()
    {
        return $this->total;
    }
    public function getAnio()
    {
        return $this->anio;
    }
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }
    public function setTotal($total)
    {
        $this->total = $total;
    }

    public function setAnio($anio)
    {
        $this->fecha = $anio;
    }
    public function getMes()
    {
        return $this->mes;
    }
    public function setMes($mes)
    {
        $this->fecha = $mes;
    }
    
   

}
