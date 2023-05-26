<?php
require_once '../models/loginModel.php';

session_start();

// Comprobar si el usuario ya inició sesión
if (isset($_SESSION['user'])) {
    header('Location: views/main/index.php'); // Redirigir al usuario a la página principal
    exit();
}

// Comprobar si se envió el formulario de inicio de sesión
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['correo'];
    $password = $_POST['password'];

    // Crear una instancia del modelo de usuario
    $userModel = new User();

    // Verificar las credenciales
    $user = $userModel->verifyCredentials($username, $password);

    if ($user) {
        $_SESSION['user'] = $user;
        header('Location: views/main/index.php'); // Redirigir al usuario a la página principal
        exit();
    } else {
        $errorMessage = 'Credenciales inválidas. Por favor, inténtalo de nuevo.';
    }
}
?>
