<?php
// require_once 'usuarioModel.php';
// session_start();

// // Verificar si se enviaron los datos del formulario
// if ($_SERVER["REQUEST_METHOD"] === "POST") {
//     // Obtener los datos del formulario
//     $username = $_POST['correo'];
//     $password = $_POST['password'];

//     // Consulta SQL para verificar las credenciales
//     $sql = "SELECT * FROM usuarios WHERE username='$username' AND password='$password'";
//     $result = $conn->query($sql);

//     if ($result->num_rows === 1) {
//         // Las credenciales son correctas, inicio de sesión exitoso
//         $_SESSION['loggedin'] = true;
//         $_SESSION['username'] = $username;
//         header("Location: views/main/index.php"); // Redirigir al usuario a la página de inicio
//         exit;
//     } else {
//         // Las credenciales son incorrectas, mostrar un mensaje de error
//         echo "Nombre de usuario o contraseña incorrectos";
//     }
// }

// $conn->close();
// ?>
