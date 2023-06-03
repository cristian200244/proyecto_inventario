<?php

require_once '../models/usuarioModel.php';

$controller = new UsuarioController;

class UsuarioController
{

    private $usuario;

    public function __construct()
    {

        $this->usuario = new Usuario();

        if (isset($_REQUEST['c'])) {
            $controlador = $_REQUEST['c'];
            switch ($controlador) {
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
                case '5': //
                    self::InciarSesion();
                    break;

                    case '6':
                        self::CerrarSesion();
                        break;
            }
        }
    }

   

    public function InciarSesion()
    {
        //Lo que llega por REQUEST
        $datos = [
            'correo'   => $_REQUEST['correo'],
            'password' => $_REQUEST['password'],
        ];

        if (empty($datos['correo']) || empty($datos['password'])) {

            return $mensaje = "Nombre de Usuario o contraseña vacio";
        } else {
            $results = $this->usuario->getUser($datos);

            if ($results) {
                session_start();

                $_SESSION['id']     = $results->id;
                $_SESSION['correo'] = $results->correo;

                $message = '¡Bienvenido!';
                header('Location:../Views/main/index.php');
            } else {
                echo $message = '¡Lo sentimos! Los datos ingresados no concuerdan' . '<br>' .
                    '<div class="alert-danger"> ¡Error al Digtar o Usuario no existe!</div>';
            }
        }
    }

    
 


    public function index()
    {
        return  $this->usuario->getAll();
    }

    public function store()
    {

        $datos = [

            'id_tipo_documento' => $_REQUEST['id_tipo_documento'],
            'numero_documento'  => $_REQUEST['numero_documento'],
            'primer_nombre'     => $_REQUEST['primer_nombre'],
            'segundo_nombre'    => $_REQUEST['segundo_nombre'],
            'primer_apellido'   => $_REQUEST['primer_apellido'],
            'segundo_apellido'  => $_REQUEST['segundo_apellido'],
            'id_sexo'              => $_REQUEST['id_sexo'],
            'id_ciudad'         => $_REQUEST['id_ciudad'],
            'telefono'          => $_REQUEST['telefono'],
            'correo'            => $_REQUEST['correo'],
            'direccion'         => $_REQUEST['direccion'],
            'correo'            => $_REQUEST['correo'],
          

        ];
        $result = $this->usuario->store($datos);
        if ($result) {
            header("Location: ../index.php");
            exit();
        } else {
            echo $error = "Ocurrió un error";
           
        }
    }



    public function show()
    {
        $id = $_REQUEST['id_persona'];
        header("Location:  ../views/clientes/show.php?id_persona=" . $id);
    }

    public function delete()
    {
        $this->usuario->delete($_REQUEST['id']);
        header("Location: ../views/clientes/index.php");
    }

    public function update()
    {
        $datos = [

            'rol'              => $_REQUEST['rol'],
            'tipo_documento'   => $_REQUEST['tipo_documento'],
            'numero_documento' => $_REQUEST['numero_documento'],
            'primer_nombre'    => $_REQUEST['primer_nombre'],
            'segundo_nombre'   => $_REQUEST['segundo_nombre'],
            'primer_apellido'  => $_REQUEST['primer_apellido'],
            'segundo_apellido' => $_REQUEST['segundo_apellido'],
            'id_sexo'          => $_REQUEST['id_sexo'],
            'telefono'         => $_REQUEST['telefono'],
            'id_ciudad'        => $_REQUEST['id_ciudad'],
            'correo'           => $_REQUEST['correo'],
            'direccion'        => $_REQUEST['direccion'],


        ];


        $result = $this->usuario->update($datos);

        if ($result) {
            header("Location: ../views/admin/show.php");
            exit();
        }

        return $result;
    }

    public function cerrarSesion()
    {
    //   session_start();
    //   session_unset();
    //   session_destroy();
    //   header('Location: index.php');

    @session_start();
    session_destroy();
    exit();
    header("Location: ../index.php" );

    
      
    }
    
  
   
    
    
}

// $stmt = $pdo->prepare('SELECT COUNT(correo) AS EmailCount FROM personas WHERE correo = :correo');
// $stmt->execute(array('correo' => $_POST['correo']));
// $result = $stmt->fetch(PDO::FETCH_ASSOC);

// if ($result['correo'] == 0) {
//     $stmt = $pdo->prepare('INSERT INTO correo (correo) VALUES (:correo)');
//     $stmt->execute(array('correo' => $_POST['correo']));
//     echo 'Thank you for Submitting. Redirecting back to Home Page';
// } else {
//     echo 'E-mail exists!';
// }




// $correo = $_POST['correo'];
// $contraseña= $_POST['password'];

// $query = "INSERT INTO personas(, correo,contraseña
// VALUE ('$correo','$contraseña')";

// //verifica que el correo no se repita en la base de datos
// $verificar_correo =mysqli_query($conexion, "SELECT * FROM personas WHERE correo='$correo'");

// if (mysqli_num_rows($verificar_correo)> 0) {
//     echo' <script>
//     alert("Este correo ya esta registrado, intenta con otro diferente");
//     window.location = "../register.php"
//     </script>'; 
   
// }


