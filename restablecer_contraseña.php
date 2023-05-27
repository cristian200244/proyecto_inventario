<?php
// Restablecer_contrasena.php

// Obtén el token desde el parámetro de la URL
$token = $_GET['token'];

// Verifica si el token existe y es válido en tu base de datos o sistema de usuarios
// Realiza la lógica necesaria para validar el token

if ($token_valido) {
  // Muestra un formulario HTML donde el usuario pueda ingresar su nueva contraseña
  echo '
  <form action="guardar_contraseña.php" method="POST">
    <label for="contrasena">Nueva contraseña:</label>
    <input type="password" id="contrasena" name="contrasena" required>
    <input type="hidden" name="token" value="'.$token.'">
    <input type="submit" value="Guardar contraseña">
  </form>
  ';
} else {
  // Muestra un mensaje de error si el token no es válido
  echo "El enlace de restablecimiento de contraseña es inválido o ha expirado.";
}
?>
