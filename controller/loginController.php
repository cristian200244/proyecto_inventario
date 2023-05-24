<?php
// Aquí se coloca la lógica del controlador de inicio de sesión
class LoginController {
    public function __construct() {
        // Constructor del controlador
    }

    public function login() {
        // Verificar si se enviaron los datos del formulario
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $username = $_POST['username'];
            $password = $_POST['password'];

            // Realizar las validaciones y la autenticación en la base de datos
            if ($username === "usuario" && $password === "contrasena") {
                // Las credenciales son correctas, inicio de sesión exitoso
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $username;
                header("Location: views/main/index.php"); // Redirigir al usuario a la página de inicio
                exit;
            } else {
                // Las credenciales son incorrectas, mostrar un mensaje de error
                $errorMessage = "Nombre de usuario o contraseña incorrectos";
                // Aquí puedes redirigir a una página de error o mostrar el mensaje en la vista
            }
        }
    }

    public function logout() {
        // Cerrar sesión y redirigir al usuario a la página de inicio
        $_SESSION['loggedin'] = false;
        $_SESSION['username'] = null;
        session_destroy();
        header("Location: index.php");
        exit;
    }
}
?>
