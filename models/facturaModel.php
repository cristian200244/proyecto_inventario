<?php
include_once dirname(__FILE__) . '../../Config/config.example.php';
require_once 'conexionModel.php';




class Factura{
   private $id;
   private $persona;
   private $dispositivo;
   private $tipo_servicio;
   private $fecha;
   private $hora;
   private $precio;
   private $total;
   private $database;
   public function __construct()
   {
       $this->database = new Database();
   }
   public function getId()
   {
       return $this->id;
   }
   public function getById($id)
        {
            $factura = [];
            try {
                $sql = 'SELECT * FROM facturas WHERE id_factura = :id_factura';
                $query = $this->database->conexion()->prepare($sql);
                $query->execute(['id_factura' => $id]);

                while ($row = $query->fetch()) {
                    $datos = new Factura();
                    $datos->persona      = $row['id_persona'];
                    $datos->tipo_servicio = $row['id_tipo_servicio'];
                    $datos->dispositivo  = $row['id_tipo_dispositivo'];
                    $datos->fecha        = $row['fecha'];
                    $datos->hora         = $row['hora'];
                    $datos->precio       = $row['precio'];
                    $datos->total        = $row['total'];
                    array_push($factura, $datos);
                }
                return $factura;
            } catch (PDOException $e) {
                return ['mensaje' => $e];
            }
        }
        public function getAll()
        {
            $items = [];

            try {
                $sql = 'SELECT f.id_factura,
                CONCAT(p.primer_nombre, " ", segundo_nombre, " ", primer_apellido, " ", segundo_apellido) AS persona, td.nombre , f.fecha, f.hora, f.precio,f.total
                FROM facturas AS f
                JOIN personas AS p ON p.id_persona = f.id_persona
                JOIN servicios AS s ON s.id_servicio = f.id_servicio
                JOIN tipo_dispositivos AS td ON  td.id_tipo_dispositivo = f.id_tipo_dispositivo
                ORDER BY  id_factura DESC';
                $query = $this->database->conexion()->query($sql);

                while ($row = $query->fetch()) {
                    $item =            new Factura();
                    $item->id            = $row['id_servicio'];
                    $item->persona       = $row['nombre_persona'];
                    $item->dispositivo   = $row['nombre_tipo_dispositivo'];
                    $item->tipo_servicio = $row['nombre_tipo_servicio'];
                    $item->fecha         = $row['fecha'];
                    $item->hora         = $row['hora'];
                    $item->precio         = $row['precio'];
                    $item->total         = $row['total'];
                    array_push($items, $item);
                }

                return $items;
            } catch (PDOException $e) {
                return ['mensaje' => $e];
            }
        }
   public function store($datos)
        {

            try {
                $sql = 'INSERT INTO facturas(id_factura ,id_persona ,id_servicio ,id_tipo_servicio ,fecha ,hora ,precio ,total )
                 VALUES  (:id_factura ,:id_persona ,:id_tipo_dispositivo ,:id_tipo_servicio ,:fecha ,:hora ,:precio ,:total)';
                $prepare = $this->database->conexion()->prepare($sql);
                $query = $prepare->execute([

                    'id'                 => $datos['id_persona'],
                    'tipo_dispositivo'   => $datos['id_tipo_dispositivo'],
                    'tipo_servicio'      => $datos['id_tipo_servicio'],
                    'fecha'              => $datos['fecha'],
                    'hora'               => $datos['hora'],
                    'precio'             => $datos['precio'],
                    'total'              => $datos['total']
                ]);
                if ($query) {
                    return true;
                }
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }
  public function crearFactura($tipo_servicio, $persona, $total) {
    $fecha = date('Y-m-d');

    $sql = "INSERT INTO facturas (id_factura, id_persona,id_servicio,precio, total, fecha) VALUES (:id_persona, :id_tipo_dispositivo, :id_tipo_servicio, :fecha,:precio,:total,:hora)";
    $result = $this->database->conexion()->prepare($sql);

    if ($result) {
      return true;
    } else {
      return false;
    }
  }
  public function getPersona()
        {
            return $this->persona;
        }
        public function getTipoDispositivo()
        {
            return $this->dispositivo;
        }
        public function getTipoServicio()
        {
            return $this->tipo_servicio;
        }
        public function getFecha()
        {
            return $this->fecha;
        }
        public function setPersona($persona)
        {
            return $this->persona;
        }
        public function setTipoDispositivo($dispositivo)
        {
            return $this->dispositivo;
        }
        public function setTipoServicio($tipo_servicio)
        {
            return $this->tipo_servicio;
        }
        public function setFecha($fecha)
        {
            return $this->fecha;
        }

 
}
