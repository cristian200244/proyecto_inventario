<?php

session_start();
if (!isset($_SESSION['id'])) {
    header("Location:../../index.php");
}

include_once(__DIR__ . "../../../config/config.php");
include_once(BASE_DIR . '../../views/main/partials/header.php');
require_once '../../models/ciudadModel.php';
require_once '../../models/documentoModel.php';
require_once '../../models/sexoModel.php';

require_once '../../models/usuarioModel.php';


$ciudad = new Ciudad();
$data = $ciudad->getAll();

$datos_sexo = new Sexo();
$registro_sexo = $datos_sexo->getAll();

$datos = new Usuario();
$registro = $datos->getById($_REQUEST['id_persona']);

 
foreach ($registro as $usuario) {
    $id_persona         = $usuario->getId();
    $primer_nombre      = $usuario->getPrimerNombre();
    $primer_apellido    = $usuario->getPrimerApellido();
    $sexo_cliente       = $usuario->getSexo();
    $ciudad             = $usuario->getCiudad();
    $correo             = $usuario->getCorreo();
    $direccion          = $usuario->getDireccion();
    $telefono           = $usuario->getTelefono();
}
 
  
 
 
?>

<div class="container-fluid">

    <form>

        <input type="hidden" name="id" value="<?= $id_persona ?>">
        <div class="container text-center">
            <a type="button" class="btn btn-lg btn-outline-primary float-start" href="index.php"><i class="bi bi-arrow-return-left"></i></a>
            <h1 class="h2 mb-4  text-center">Información Completa Del Administrador</h1>
            <hr class="bg-info">
            <div class="row text-start">
                <div class="col-6 mb-2">
                    <label for="id_tipo_documento" class="form-label">Tipo de documento</label>
                    <select class="form-select" aria-label="Default select example" value="<?= $tipo_documento ?>" name="id_tipo_documento" id="id_tipo_documento" disabled>
                        <?php
                        foreach ($registros as $datos) {
                            $selected = ($datos->getId() == $tipo_documento) ? "selected" : "";
                            echo '<option value="' . $datos->getId() . '" ' . $selected . '>' . $datos->getTipoDocumento() . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="col-6 mb-2">
                    <label for="numero_documento" class="form-label">N° de documento</label>
                    <input type="number" class="form-control" id="numero_documento" name="numero_documento" value="<?= $numero_documento ?>" readonly>
                </div>
                <div class="col-6 mb-2">
                    <label for="primer_nombre" class="form-label">Primer Nombre</label>
                    <input type="text" class="form-control" id="primer_nombre" name="primer_nombre" value="<?= $primer_nombre ?>" readonly>
                </div>
                <div class="col-6 mb-2">
                    <label for="segundo_nombre" class="form-label">Segundo Nombre</label>
                    <input type="text" class="form-control" id="segundo_nombre" name="segundo_nombre" value="<?= $segundo_nombre ?>" readonly>
                </div>
                <div class="col-6 mb-2">
                    <label for="primer_apellido" class="form-label">Primer Apellido</label>
                    <input type="text" class="form-control" id="primer_apellido" name="primer_apellido" value="<?= $primer_apellido ?>" readonly>
                </div>
                <div class="col-6 mb-2">
                    <label for="segundo_apellido" class="form-label">Segundo Apellido</label>
                    <input type="text" class="form-control" id="segundo_apellido" name="segundo_apellido" value="<?= $segundo_apellido ?>" readonly>

                </div>
                <div class="col-3 mb-2">
                    <label for="sexo" class="form-label">Sexo</label>
                    <select class="form-select" aria-label="Default select example" id="id_sexo" name="id_sexo" required="required" disabled>
                        <?php
                        foreach ($registro_sexo as $sexo) {
                            $selected = ($sexo->getId() == $sexo_cliente) ? "selected" : "";
                            echo '<option value="' . $sexo->getId() . '" ' . $selected . '>' . $sexo->getSexo() . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="col-3 mb-2">
                    <label for="telefono" class="form-label">Telefono</label>
                    <input type="tel" class="form-control" id="telefono" name="telefono" value="<?= $telefono ?>" readonly>
                </div>
                <div class="col-6 mb-2">
                    <label for="id_ciudad" class="form-label">Ciudad</label>
                    <select class="form-select" aria-label="Default select example" id="id_ciudad" name="id_ciudad" value="<?= $ciudad ?> " disabled>
                        <?php
                        foreach ($data as $valores) {
                            $selected = ($valores->getId() == $ciudad) ? "selected" : "";
                            echo '<option value="' . $valores->getId() . '" ' . $selected . '>' . $valores->getCiudad() . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="col-6 mb-2">
                    <label for="direccion" class="form-label ">Dirección</label>
                    <input type="text" class="form-control" id="direccion" name="direccion" value="<?= $direccion ?>" readonly>
                </div>
                <div class="col-6 mb-2">
                    <label for="correo" class="form-label ">E-mail</label>
                    <input type="text" class="form-control" id="correo" name="correo" value="<?= $correo ?>" readonly>
                </div>
            </div>

        </div>

    </form>

</div>
<!-- /.container-fluid -->

<?php
include_once(BASE_DIR . '../../views/main/partials/footer.php');
?>

   
  


   