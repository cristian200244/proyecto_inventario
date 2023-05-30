<?php
// Archivo de procesamiento del formulario de actualización de perfil

// Obtener los valores ingresados por el usuario
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$email = $_POST['email'];
$contrasena = $_POST['contrasena'];

// Conexión a la base de datos (reemplaza los valores por los correspondientes a tu configuración)
$conexion = mysqli_connect("localhost", "usuario_db", "contrasena_db", "nombre_db");

// Verificar si la conexión fue exitosa
if (!$conexion) {
    die("Error al conectar a la base de datos: " . mysqli_connect_error());
}

// Consulta para actualizar los datos del usuario en la base de datos
$sql = "UPDATE usuarios SET nombre = '$nombre', apellido = '$apellido', email = '$email', contrasena = '$contrasena' WHERE id = 'ID_DEL_USUARIO'";
$resultado = mysqli_query($conexion, $sql);

// Verificar si la actualización fue exitosa
if ($resultado) {
    echo "Perfil actualizado correctamente";
} else {
    echo "Error al actualizar el perfil: " . mysqli_error($conexion);
}

// Cerrar la conexión a la base de datos
mysqli_close($conexion);
?>
