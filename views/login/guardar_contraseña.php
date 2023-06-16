<?php
// Guardar_contrasena.php
$nueva_contrasena = $_POST['password'];
$token = $_POST['token'];

if ($token_valido) {
  // Actualiza la contraseña del usuario en tu base de datos o sistema de usuarios utilizando el token como referencia
  
  // Muestra un mensaje al usuario indicando que la contraseña se ha restablecido correctamente
  echo "Tu contraseña se ha restablecido correctamente.";
} else {
  // Muestra un mensaje de error si el token no es válido
  echo "El token de restablecimiento de contraseña es inválido o ha expirado.";
}
?>





