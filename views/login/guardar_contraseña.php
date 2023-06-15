<?php
// Guardar_contrasena.php

// Obtén la nueva contraseña y el token desde los datos del formulario
$nueva_contrasena = $_POST['password'];
$token = $_POST['token'];

// Verifica si el token es válido en tu base de datos o sistema de usuarios
// Realiza la lógica necesaria para validar el token

if ($token_valido) {
  // Actualiza la contraseña del usuario en tu base de datos o sistema de usuarios utilizando el token como referencia
  // Realiza la lógica necesaria para guardar la nueva contraseña

  // Muestra un mensaje al usuario indicando que la contraseña se ha restablecido correctamente
  echo "Tu contraseña se ha restablecido correctamente.";
} else {
  // Muestra un mensaje de error si el token no es válido
  echo "El token de restablecimiento de contraseña es inválido o ha expirado.";
}
?>
