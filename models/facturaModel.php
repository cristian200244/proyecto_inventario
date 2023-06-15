<?php
include_once dirname(__FILE__) . '../../Config/config.php';
require_once 'conexionModel.php';




class Factura
{
    private $id;
    private $persona;
    private $codigo;
    private $dispositivo;
    private $tipo_servicio;
    private $fecha;
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
                $datos->persona       = $row['id_persona'];
                $datos->codigo        = $row['codigo'];
                $datos->tipo_servicio = $row['id_servicio'];
                $datos->dispositivo   = $row['id_tipo_dispositivo'];
                $datos->fecha         = $row['fecha'];
                $datos->total         = $row['total'];
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
                CONCAT(p.primer_nombre, " ", segundo_nombre, " ", primer_apellido, " ", segundo_apellido) AS persona,s.codigo,ts.servicio , td.nombre , f.fecha,f.total
                FROM facturas AS f
                JOIN personas AS p ON p.id_persona = f.id_persona
                JOIN servicios AS s ON s.id_servicio = f.id_servicio
                JOIN tipo_dispositivos AS td ON  td.id_tipo_dispositivo = f.id_tipo_dispositivo
                JOIN tipo_servicios AS ts ON ts.id_tipo_servicio = s.id_tipo_servicio
                ORDER BY  id_factura DESC';
            $query = $this->database->conexion()->query($sql);

            while ($row = $query->fetch()) {
                $item =            new Factura();
                $item->id            = $row['id_factura'];
                $item->persona       = $row['persona'];
                $item->codigo        = $row['codigo'];
                $item->dispositivo   = $row['nombre'];
                $item->tipo_servicio = $row['servicio'];
                $item->fecha         = $row['fecha'];
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
            $sql = 'INSERT INTO facturas(id_persona ,id_servicio ,id_tipo_dispositivo ,fecha ,total )
                 VALUES  (:id_persona ,:id_servicio ,:id_tipo_dispositivo ,:fecha ,:total)';
            $prepare = $this->database->conexion()->prepare($sql);
            $query = $prepare->execute([
                'id_persona'            => $datos['id_persona'],
                'id_tipo_dispositivo'   => $datos['id_tipo_dispositivo'],
                'id_servicio'           => $datos['id_servicio'],
                'fecha'                 => $datos['fecha'],
                'total'                 => $datos['total']
            ]);
            if ($query) {
                return true;
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getPersona()
    {
        return $this->persona;
    }
    public function getCodigo()
    {
        return $this->codigo;
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
    public function getTotal()
    {
        return $this->total;
    }
    public function setPersona($persona)
    {
        return $this->persona;
    }
    public function setCodigo($codigo)
    {
        return $this->codigo;
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
    public function setTotal($total)
    {
        return $this->total;
    }
}
