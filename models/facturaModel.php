<?php
include_once dirname(__FILE__) . '../../Config/config.example.php';
require_once 'conexionModel.php';




class Factura{

    public $id_persona;
    private $database;
    public $total;
    public $fecha;


public function __construct()
{
    $this->database = new Database();
}
public function getId()
{

    return $this->id_persona;
}


  public function crearFactura($servicio, $id_persona, $total) {
    $fecha = date('Y-m-d');
    // Obtiene la fecha actual en formato 'YYYY-MM-DD'

    $sql = "INSERT INTO facturas (servicio, id_persona, total, fecha) VALUES ('$servicio', '$id_persona', '$total', '$fecha')";
    $result = $this->database->conexion()->prepare($sql);

    if ($result) {
      return true;
    } else {
      return false;
    }
  }

 
}
