    <?php

    require_once '../models/ciudadModel.php';
    $controller = new CiudadController;
    class CiudadController
    {

        private $ciudad;

        public function __construct()
        {
            $this->ciudad = new Ciudad();

            if (isset($_REQUEST['c'])) {
                switch ($_REQUEST['c']) {
                    case '1': //Almacenar en la base de datos
                        self::store();
                        break;
                    case '2': //ver usuario
                        self::show();
                        break;
                    case '3': //Actualizar el registro
                        self::update();
                        break;
                    case '4': //eliminar el registro
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
            return $this->ciudad->getAll();
        }
        public function store()
        {
            $datos = [
                'nombre'     => $_REQUEST['nombre'],
            ];
            $result = $this->ciudad->store($datos);
            if ($result) {
                header("Location: ../views/ciudad/index.php");
                exit();
            } else {
                echo $error = "ocurrio un error";
            }
        }
        public function show()
        {
            $id = $_REQUEST['id_ciudad'];
            header("Location: ../views/ciudad/index.php?id_ciudad=". $id);
        }
        public function delete()
        {
            $this->ciudad->delete($_REQUEST['id_ciudad']);
            header("Location: ../views/ciudad/index.php");
        }
        public function update()
        {
            $datos = [
                'id' => $_REQUEST['id'],
                'nombre' => $_REQUEST['nombre']
            ];
            $result = $this->ciudad->update($datos);

            if ($result) {
                header("Location: ../views/ciudad/index.php");
                exit();
            }
            return $result;
        }
    }
