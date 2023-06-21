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
                header('Location:../Views/servicios/create.php');
            } else {
                echo $message = '¡El nombre de usuario o correo electr&oacute;nico no existe' . '<br>' .
                    '<div class="alert-danger"> ¡Error al Digtar o Usuario no existe!</div>
                    <br>
                    <a   button href="../login.php"  type="button" class="link-primary">Atras</a>';
            }
        }
        
        if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
  header("location: ../Views/servicios/create.php");
  exit;
}
 
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Por favor ingrese su usuario.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Por favor ingrese su contraseña.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id, username, password FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            
                            
                            // Redirect user to welcome page
                            header("location: welcome.php");
                        } else{
                            // Display an error message if password is not valid
                            $password_err = "La contraseña que has ingresado no es válida.";
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $username_err = "No existe cuenta registrada con ese nombre de usuario.";
                }
            } else{
                echo "Algo salió mal, por favor vuelve a intentarlo.";
            }
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
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
            header("Location:../login.php");
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
            'password'            => $_REQUEST['password'],


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
        header("Location: ../index.php");
    }

    
}
