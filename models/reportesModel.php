<?php
include_once dirname(__FILE__) . '../../Config/config.example.php';
require_once 'conexionModel.php';



class ReportModel{
    private $database;
    private $fecha;
    private $total;

    public function __construct()
    {
        $this->database = new Database();
    }


    public function getAll()
    {
        $items = [];

        try {
            $sql = 'SELECT YEAR(fecha) AS anio, MONTH(fecha) AS mes, SUM(total) AS total
            FROM facturas
            GROUP BY YEAR(fecha), MONTH(fecha)
            ORDER BY YEAR(fecha), MONTH(fecha);';
            $query = $this->database->conexion()->query($sql);

            while ($row = $query->fetch()) {
                $item =              new ReportModel();
                $item->fecha         = $row['fecha'];
                $item->total         = $row['total'];
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
    
    public function setFecha($fecha)
    {
        return $this->fecha;
    }
    public function setTotal($total)
    {
        return $this->total;
    }
}