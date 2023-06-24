<?php

session_start();
if (!isset($_SESSION['id'])) {
    header("Location:../../index.php");
}

include_once(__DIR__ . "../../../config/config.php");
include_once(BASE_DIR . '../../views/main/partials/header.php');
require_once '../../models/ciudadModel.php';
require_once '../../models/documentoModel.php';
// require_once '../../models/usuarioModel.php';
require_once '../../models/clienteModel.php';
require_once '../../models/sexoModel.php';

$ciudad = new Ciudad();
$data = $ciudad->getAll();

$datos_sexo = new Sexo();
$registro_sexo = $datos_sexo->getAll();

$datos_documento = new TipoDocumento();
$registros = $datos_documento->getAll();

$datos = new Cliente();
$registro = $datos->getById($_REQUEST['id_persona']);


foreach ($registro as $usuario) {
    $id_persona         = $usuario->getId();
    $tipo_documento     = $usuario->getTipoDocumento();
    $numero_documento   = $usuario->getNumeroDocumento();
    $primer_nombre      = $usuario->getPrimerNombre();
    $segundo_nombre     = $usuario->getSegundoNombre();
    $primer_apellido    = $usuario->getPrimerApellido();
    $segundo_apellido   = $usuario->getSegundoApellido();
    $sexo               = $usuario->getSexo();
    $ciudad             = $usuario->getCiudad();
    $correo             = $usuario->getCorreo();
    $direccion          = $usuario->getDireccion();
    $telefono           = $usuario->getTelefono();
}


?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <form method="POST" action="../../controller/usuarioController.php?c=3&id_persona=<?= $id_persona ?>">
        <div class="container text-center">
            <h1 class="h2 mb-4  text-center">Actualizar del administrador</h1>
            <hr class="bg-info">
            <div class="row text-start">
                <div class="col-6 mb-2">
                    <label for="id_tipo_documento" class="form-label">Tipo de documento</label>
                    <select class="form-select" aria-label="Default select example" name="id_tipo_documento" id="id_tipo_documento" value="<?= $tipo_documento?>">
                        <option selected>Seleccionar</option>
                        <?php
                        foreach ($registros  as $tipo_documento) {
                            echo '<option value="' . $tipo_documento->getId() . '">' . $tipo_documento->getTipoDocumento() . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="col-6 mb-2">
                    <label for="numero_documento" class="form-label">N° de documento</label>
                    <input type="number" class="form-control" id="numero_documento" name="numero_documento" value="<?= $numero_documento ?>">
                </div>
                <div class="col-6 mb-2">
                    <label for="primer_nombre" class="form-label">Primer Nombre</label>
                    <input type="text" class="form-control" id="primer_nombre" name="primer_nombre" value="<?= $primer_nombre ?>">
                </div>
                <div class="col-6 mb-2">
                    <label for="segundo_nombre" class="form-label">Segundo Nombre</label>
                    <input type="text" class="form-control" id="segundo_nombre" name="segundo_nombre" value="<?= $segundo_nombre ?>">
                </div>
                <div class="col-6 mb-2">
                    <label for="primer_apellido" class="form-label">Primer Apellido</label>
                    <input type="text" class="form-control" id="primer_apellido" name="primer_apellido" value="<?= $primer_apellido ?>">
                </div>
                <div class="col-6 mb-2">
                    <label for="segundo_apellido" class="form-label">Segundo Apellido</label>
                    <input type="text" class="form-control" id="segundo_apellido" name="segundo_apellido" value="<?= $segundo_apellido ?>">

                </div>
                <div class="col-3 mb-2">
                    <label for="sexo" class="form-label">Sexo</label>
                    <select class="form-select" aria-label="Default select example" id="id_sexo" name="id_sexo" value="<?= $sexo ?>">
                        <option selected>Seleccionar</option>
                        <?php
                        foreach ($registro_sexo as $sexo) {
                            echo '<option value="' . $sexo->getId() . '">' . $sexo->getSexo() . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="col-3 mb-2">
                    <label for="telefono" class="form-label">Telefono</label>
                    <input type="tel" class="form-control" id="telefono" name="telefono" value="<?= $telefono ?>">
                </div>
                <div class="col-6 mb-2">
                    <label for="id_ciudad" class="form-label">Ciudad</label>
                    <select class="form-select" aria-label="Default select example" id="id_ciudad" name="id_ciudad" value="<?= $ciudad ?>">
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
                    <input type="text" class="form-control" id="direccion" name="direccion" value="<?= $direccion ?>">
                </div>
                <div class="col-6 mb-2">
                    <label for="correo" class="form-label ">E-mail</label>
                    <input type="text" class="form-control" id="correo" name="correo" value="<?= $correo ?>">
                </div>
            </div>
            <br>
            <button type="submit" class="btn btn-outline-info ml-2">Actualizar </button>
        </div>

    </form>

</div>
<!-- /.container-fluid -->

<?php
include_once(BASE_DIR . '../../views/main/partials/footer.php');
?>