<?php
include_once(__DIR__ . "../../../config/config.example.php");
include_once(BASE_DIR . '../../views/main/partials/header.php');
require_once '../../models/ciudadModel.php';
require_once '../../models/documentoModel.php';
require_once '../../models/clienteModel.php';

$ciudad = new Ciudad();
$data = $ciudad->getAll();

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

    <form method="POST" action="../../controller/clienteController.php">
        <input type="hidden" name="c" value="3">
        <input type="hidden" name="id" value="<?= $id ?>">
        <div class="container text-center">
            <h1 class="h2 mb-4  text-center"> Actualizar Cliente</h1>
            <hr class="bg-info">
            <div class="row text-start">
                <div class="col">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Tipo de documento</label>
                        <select class="form-select" aria-label="Default select example" name="id_tipo_documento" id="id_tipo_documento" value="<?= $id ?>">
                            <option selected>Seleccionar Documento</option>
                            <option value="0"></option>
                            <option value="1">CC</option>
                            <option value="2">TI</option>
                            <option value="3">CE</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Primer Nombre</label>
                        <input type="text" class="form-control" id="primer_nombre" name="primer_nombre" value="<?= $primer_nombre ?>">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Primer Apellido</label>
                        <input type="text" class="form-control" id="primer_apellido" name="primer_apellido" value="<?= $primer_apellido ?>">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">sexo</label>
                        <select class="form-select" aria-label="Default select example" id="sexo" name="sexo" value="<?= $sexo ?>">
                            <option selected>Seleccionar Sexo</option>
                            <option value="2">Masculino</option>
                            <option value="3">Femenino</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label ">Direccion</label>
                        <input type="text" class="form-control" id="direccion" name="direccion" value="<?= $direccion ?>">
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">N° de documento</label>
                        <input type="number" class="form-control" id="numero_documento" value="<?= $numero_documento ?>">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Segundo Nombre</label>
                        <input type="text" class="form-control" id="segundo_nombre" name="segundo_nombre" value="<?= $segundo_nombre ?>">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Segundo Apellido</label>
                        <input type="text" class="form-control" id="segundo_apellido" name="segundo_apellido" value="<?= $segundo_apellido ?>">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Ciudad</label>
                        <select class="form-select" aria-label="Default select example" id="ciudad" name="ciudad" value="<?= $ciudad ?>">

                            <option selected>Seleccionar</option>
                            <?php
                            foreach ($data as $valores) {
                                echo '<option value="' . $valores->getId() . '">' . $valores->getCiudad() . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Telefono</label>
                        <input type="tel" class="form-control" id="exampleFormControlInput1" id="telefono" name="telefono" value="<?= $telefono ?>">
                    </div>
                </div>

            </div>
            <button type="submit" class="btn btn-outline-info ml-0">Actualizar Cliente</button>
        </div>
    </form>

</div>
<!-- /.container-fluid -->

<?php
include_once(BASE_DIR . '../../views/main/partials/footer.php');
?>