<?php

$email = $_POST['userEmail'];


if ($email_valido) {
    // Generar un token único para el restablecimiento de contraseña
    $token = uniqid();

    // Enviar un correo electrónico al usuario con un enlace para restablecer la contraseña
    $enlace_reset = "https://tu_sitio_web.com/reset_password.php?email=$email&token=$token";
    $mensaje = "Hola,\n\nPara restablecer tu contraseña, haz clic en el siguiente enlace: $enlace_reset";
    $asunto = "Restablecimiento de contraseña";
    $headers = "From: tu_correo@tudominio.com";

    // Envía el correo electrónico usando la función mail() de PHP
    mail($email, $asunto, $mensaje, $headers);

    echo "Se ha enviado un correo electrónico con instrucciones para restablecer tu contraseña.";
} else {
    echo "El correo electrónico ingresado no existe en nuestra base de datos.";
}
?>
   
    
    

