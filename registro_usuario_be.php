<?php
include 'config/config.example.php';
$nombre_completo = $_POST['primer_nombre'];
$correo = $_POST['correo'];
$contraseña= $_POST['password'];

$query = "INSERT INTO personas(primer_nombre, correo,contraseña
VALUE ('$nombre_completo','$correo','$contraseña')";

//verifica que el correo no se repita en la base de datos
$verificar_correo =mysqli_query($conexion, "SELECT * FROM personas WHERE correo='$correo'");

if (mysqli_num_rows($verificar_correo)> 0) {
    echo' <script>
    alert("Este correo ya esta registrado, intenta con otro diferente");
    window.location = "register.php"
    </script>'; 
   
}