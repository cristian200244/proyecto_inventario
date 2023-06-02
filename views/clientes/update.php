<?php
include_once(__DIR__ . "../../../config/config.example.php");
include_once(BASE_DIR . '../../views/main/partials/header.php');
require_once '../../models/ciudadModel.php';
require_once '../../models/documentoModel.php';
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


foreach ($registro as $cliente) {
    $id_persona         = $cliente->getId();
    $tipo_documento     = $cliente->getTipoDocumento();
    $numero_documento   = $cliente->getNumeroDocumento();
    $primer_nombre      = $cliente->getPrimerNombre();
    $segundo_nombre     = $cliente->getSegundoNombre();
    $primer_apellido    = $cliente->getPrimerApellido();
    $segundo_apellido   = $cliente->getSegundoApellido();
    $sexo               = $cliente->getSexo();
    $ciudad             = $cliente->getCiudad();
    $correo             = $cliente->getCorreo();
    $direccion          = $cliente->getDireccion();
    $telefono           = $cliente->getTelefono();
}
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <form method="POST" action="../../controller/clienteController.php?c=3&id_persona=<?= $id_persona ?>">
        <div class="container text-center">
        <a type="button" class="btn  border-primary float-start" href="index.php"><i class="bi bi-arrow-return-left"></i></a>
            <h1 class="h2 mb-4  text-center">Actualizar Datos Del Cliente </h1>
            <hr class="bg-info">
            <div class="row text-start">
                <div class="col-6 mb-2">
                    <label for="id_tipo_documento" class="form-label">Tipo de documento</label>
                    <select class="form-select" aria-label="Default select example" name="id_tipo_documento" id="id_tipo_documento" >
                    <?php foreach ($registros as $documento) : ?>
                            <option value="<?= $documento->getId() ?>" <?= $documento->getId() == $cliente->getTipoDocumento() ? 'selected' :  "" ?>><?= $documento->getTipoDocumento() ?></option>
                        <?php endforeach ?>
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
                    <select class="form-select" aria-label="Default select example" id="id_sexo" name="id_sexo">
                        <?php foreach ($registro_sexo as $sexo) : ?>
                            <option value="<?= $sexo->getId() ?>" <?= $sexo->getId() == $cliente->getSexo() ? 'selected' :  "" ?>><?= $sexo->getSexo() ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="col-3 mb-2">
                    <label for="telefono" class="form-label">Telefono</label>
                    <input type="tel" class="form-control" id="telefono" name="telefono" value="<?= $telefono ?>">
                </div>
                <div class="col-6 mb-2">
                    <label for="id_ciudad" class="form-label">Ciudad</label>
                    <select class="form-select" aria-label="Default select example" id="id_ciudad" name="id_ciudad" >
                    <?php foreach ($data as $valores) : ?>
                            <option value="<?= $valores->getId() ?>" <?= $valores->getId() == $cliente->getCiudad() ? 'selected' :  "" ?>><?= $valores->getCiudad() ?></option>
                        <?php endforeach ?>
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
            <button type="submit" class="btn btn-outline-info ml-2 float-center">Actualizar Cliente</button>
        </div>

    </form>
</div>
<!-- /.container-fluid -->

<?php
include_once(BASE_DIR . '../../views/main/partials/footer.php');
?>