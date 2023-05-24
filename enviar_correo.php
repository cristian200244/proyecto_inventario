<?php
// Verificar si se enviaron los datos del formulario
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST['email'];

    // Verificar si el correo electrónico existe en la base de datos
    $sql = "SELECT * FROM usuarios WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows === 1) {
        // Generar un token único para el restablecimiento de contraseña
        $token = uniqid();

        // Guardar el token en la base de datos junto con el correo electrónico del usuario
        $sql = "UPDATE usuarios SET token='$token' WHERE email='$email'";
        $conn->query($sql);

        // Enviar el correo electrónico al usuario con el enlace de restablecimiento de contraseña
        $resetLink = "http://tu_sitio.com/reset_contrasena.php?email=" . urlencode($email) . "&token=" . urlencode($token);

        $subject = "Restablecimiento de Contraseña";
        $message = "Hola,\n\nPara restablecer tu contraseña, haz clic en el siguiente enlace:\n\n" . $resetLink;

        // Enviar el correo electrónico (ejemplo usando la función mail() de PHP)
        mail($email, $subject, $message);

        echo "Se ha enviado un correo electrónico con instrucciones para restablecer tu contraseña.";
    } else {
        echo "El correo electrónico ingresado no existe en nuestra base de datos.";
    }
}
?>
