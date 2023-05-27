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
                    $datos->codigo       = $row['id_codigo'];
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
                    $item->id          = $row['id_servicios'];
                    $item->persona     = $row['id_persona'];
                    $item->dispositivo = $row['id_tipo_dispositivo'];
                    $item->marca       = $row['id_marca'];
                    $item->tipo_servicio = $row['id_tipo_servicio'];
                    $item->codigo      = $row['id_codigo'];
                    $item->estado      = $row['id_estado_producto'];
                    $item->falla       = $row['falla'];
                    $item->fecha       = $row['fecha'];

                    array_push($items, $item);
                }
                return $item;
            } catch (PDOException $e) {
                return ['mensaje' => $e];
            }
        }
        public function store($datos)
        {

            try {
                $sql = 'INSERT INTO servicios(id_persona, id_tipo_dispositivo, id_marca, id_tipo_servicio, id_codigo, id_estado_producto, falla, fecha)
                 VALUES  (:id_persona, :id_tipo_dispositivo, :id_marca, :id_tipo_servicio, :id_codigo, :id_estado_producto, :falla, :fecha)';
                $prepare = $this->database->conexion()->prepare($sql);
                $query = $prepare->execute([

                    'id_persona'            => $datos['id_persona'],
                    'id_tipo_dispositivo'   => $datos['id_tipo_dispositivo'],
                    'id_marca'              => $datos['id_marca'],
                    'id_tipo_servicio'      => $datos['id_tipo_servicio'],
                    'id_codigo'             => $datos['id_codigo'],
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
    }
