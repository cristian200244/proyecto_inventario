<?php
include_once(__DIR__ . "/config/config.example.php");

// include_once(BASE_DIR . '../../views/main/partials/header.php');
require_once 'models/ciudadModel.php';
require_once 'models/rolesModel.php';
require_once 'models/sexoModel.php';

$ciudad = new Ciudad();
$data = $ciudad->getAll();

$sexo = new Sexo();
$data_sexo = $sexo->getAll();


$roles = new Roles();
$data_rol = $roles->getAll();




?>
<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <title>Registro</title>

    <link href="<?= BASE_URL ?> ../public/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-light">

    <div class="container-fluid">

        <!-- Page Heading -->

        <form action="controller/usuarioController.php" id="correo" method="POST">
            <input type="hidden" name="c" value="1">
            <div class="container text-center">
                <h1 class="h2 mb-4  text-center">Crear Usuario</h1>
                <hr class="bg-info">
                <div class="row text-start">
                    <div class="col-6 mb-2">
                        <label for="id_tipo_documento" class="form-label">Tipo de documento</label>
                        <select class="form-select" aria-label="Default select example" name="id_tipo_documento" id="id_tipo_documento" required="required">
                            <option>Seleccionar Documento</option>
                            <option value="1">CC</option>
                            <option value="2">TI</option>
                            <option value="3">CE</option>
                        </select>
                    </div>
                    <div class="col-6 mb-2">
                        <label for="numero_documento" class="form-label">N° de documento</label>
                        <input type="number" class="form-control" id="numero_documento" name="numero_documento">
                    </div>

                    <div class="col-6 mb-2">
                        <label for="primer_nombre" class="form-label">Primer Nombre</label>
                        <input type="text" class="form-control" id="primer_nombre" name="primer_nombre">
                    </div>

                    <div class="col-6 mb-2">
                        <label for="segundo_nombre" class="form-label">Segundo Nombre</label>
                        <input type="text" class="form-control" id="segundo_nombre" name="segundo_nombre">
                    </div>

                    <div class="col-6 mb-2">
                        <label for="primer_apellido" class="form-label">Primer Apellido</label>
                        <input type="text" class="form-control" id="primer_apellido" name="primer_apellido">
                    </div>

                    <div class="col-6 mb-2">
                        <label for="segundo_apellido" class="form-label">Segundo Apellido</label>
                        <input type="text" class="form-control" id="segundo_apellido" name="segundo_apellido">

                    </div>


                    <div class="col-3 mb-2">
                        <label for="id_sexo" class="form-label">Sexo</label>
                        <select class="form-select" aria-label="Default select example" id="id_sexo" name="id_sexo" required="required">
                            <option selected>Seleccionar Sexo</option>
                            <?php
                            foreach ($data_sexo as $valores) {
                                echo '<option value="' . $valores->getId() . '">' . $valores->getSexo() . '</option>';
                            }
                            ?>
                           
                        </select>
                    </div>

                    <div class="col-3 mb-2">
                        <label for="telefono" class="form-label">Telefono</label>
                        <input type="tel" class="form-control" id="telefono" name="telefono">
                    </div>

                    <div class="col-6 mb-2">
                        <label for="id_ciudad" class="form-label">Ciudad</label>
                        <select class="form-select" aria-label="Default select example" id="id_ciudad" name="id_ciudad" required="required">
                            <option selected>Seleccionar</option>
                            <?php
                            foreach ($data as $valores) {
                                echo '<option value="' . $valores->getId() . '">' . $valores->getCiudad() . '</option>';
                            }
                            ?>
                        </select>
                    </div>

                    <div class="col-6 mb-2">
                        <label for="direccion" class="form-label ">Dirección</label>
                        <input type="text" class="form-control" id="direccion" name="direccion">

                    </div>

                    <div class="col-6 mb-2">
                        <label for="correo" class="form-label ">E-mail</label>
                        <input type="text" class="form-control" id="correo" name="correo">

                    </div>

                    <!-- <div class="col-6 mb-2">
                        <label for="id_rol" class="form-label">Roles</label>
                        <select class="form-select" aria-label="Default select example" id="id_rol" name="id_rol" required="required">
                            <option selected>Seleccionar</option>
                            
                            foreach ($data_rol as $valores) {
                                echo '<option value="' . $valores->getId() . '">' . $valores->getRol() . '</option>';
                            }
                            ?>
                        </select>
                    </div> -->


                    <!-- <div class="col-6 mb-2">
                        <label for="password" class="form-label ">Contraseña</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div> -->

                </div>
                <br>
                <button type="submit" class="btn btn-outline-info ml-2">Guardar Usuario</button>
            </div>
        </form>

    </div>
</body>

</html>