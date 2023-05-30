 <?php
    include_once dirname(__FILE__) . '../../Config/config.example.php';
    include_once 'conexionModel.php';

    class ServiciosModel
    {
        private $id;
        private $persona;
        private $dispositivo;
        private $marca;
        private $tipo_servicio;
        private $codigo;
        private $estado;
        private $falla;
        private $fecha;
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
            $servicio = [];
            try {
                $sql = 'SELECT * FROM servicios WHERE id_servicio = :id_servicio';
                $query = $this->database->conexion()->prepare($sql);
                $query->execute(['id_servicio' => $id]);

                while ($row = $query->fetch()) {
                    $datos = new ServiciosModel();
                    $datos->persona     = $row['id_persona'];
                    $datos->dispositivo = $row['id_tipo_dispositivo'];
                    $datos->marca       = $row['id_marca'];
                    $datos->tipo_servicio = $row['id_tipo_servicio'];
                    $datos->codigo       = $row['codigo'];
                    $datos->estado       = $row['id_estado_producto'];
                    $datos->falla        = $row['falla'];
                    $datos->fecha        = $row['fecha'];

                    array_push($servicio, $datos);
                }
                return $servicio;
            } catch (PDOException $e) {
                return ['mensaje' => $e];
            }
        }
        public function getAll()
        {
            $items = [];

            try {
                $sql = 'SELECT * FROM servicios ORDER BY  id_servicio ASC';
                $query = $this->database->conexion()->query($sql);

                while ($row = $query->fetch()) {
                    $item =            new ServiciosModel();
                    $item->id            = $row['id_servicio'];
                    $item->persona       = $row['id_persona'];
                    $item->dispositivo   = $row['id_tipo_dispositivo'];
                    $item->marca         = $row['id_marca'];
                    $item->tipo_servicio = $row['id_tipo_servicio'];
                    $item->codigo        = $row['codigo'];
                    $item->estado        = $row['id_estado_producto'];
                    $item->falla         = $row['falla'];
                    $item->fecha         = $row['fecha'];

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
                $sql = 'INSERT INTO servicios(id_persona, id_tipo_dispositivo, id_marca, id_tipo_servicio, codigo, id_estado_producto, falla, fecha)
                 VALUES  (:id_persona, :id_tipo_dispositivo, :id_marca, :id_tipo_servicio, :codigo, :id_estado_producto, :falla, :fecha)';
                $prepare = $this->database->conexion()->prepare($sql);
                $query = $prepare->execute([

                    'id_persona'            => $datos['id_persona'],
                    'id_tipo_dispositivo'   => $datos['id_tipo_dispositivo'],
                    'id_marca'              => $datos['id_marca'],
                    'id_tipo_servicio'      => $datos['id_tipo_servicio'],
                    'codigo'                => $datos['codigo'],
                    'id_estado_producto'    => $datos['id_estado_producto'],
                    'falla'                 => $datos['falla'],
                    'fecha'                 => $datos['fecha']
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
        public function getTipoDispositivo()
        {
            return $this->dispositivo;
        }
        public function getMarca()
        {
            return $this->marca;
        }
        public function getTipoServicio()
        {
            return $this->tipo_servicio;
        }
        public function getCodigo()
        {
            return $this->codigo;
        }
        public function getEstadoProducto()
        {
            return $this->estado;
        }
        public function getFalla()
        {
            return $this->falla;
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
        public function setMarca($marca)
        {
            return $this->marca;
        }
        public function setTipoServicio($tipo_servicio)
        {
            return $this->tipo_servicio;
        }
        public function setCodigo($codigo)
        {
            return $this->codigo;
        }
        public function setEstadoProducto($estado)
        {
            return $this->estado;
        }
        public function setFalla($falla)
        {
            return $this->falla;
        }
        public function setFecha($fecha)
        {
            return $this->fecha;
        }
    }
