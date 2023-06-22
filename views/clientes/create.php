<?php
include_once(__DIR__ . "../../../config/config.php");
include_once(BASE_DIR . '../../views/main/partials/header.php');
require_once '../../models/ciudadModel.php';
require_once '../../models/documentoModel.php';
require_once '../../models/sexoModel.php';

$ciudad = new Ciudad();
$data = $ciudad->getAll();

$datos_documento = new TipoDocumento();
$registro = $datos_documento->getAll();

$datos_sexo = new Sexo();
$registro_sexo = $datos_sexo->getAll();
?>

<div class="container-fluid">

    <form method="POST" action="../../controller/clienteController.php?c=1">
        <div class="container text-center">
            <h1 class="h2 mb-4  text-center">Crear Cliente</h1>
            <hr class="bg-info">
            <div class="row text-start">
                <div class="col-6 mb-2">
                    <label for="id_tipo_documento" class="form-label">Tipo de documento</label>
                    <select class="form-select" aria-label="Default select example" name="id_tipo_documento" id="id_tipo_documento" required="required">
                        <option selected value="">Seleccionar</option>
                        <?php
                        foreach ($registro as $datos) {
                            echo '<option value="' . $datos->getId() . '">' . $datos->getTipoDocumento() . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="col-6 mb-2">
                    <label for="numero_documento" class="form-label">N° de documento</label>
                    <input type="text" class="form-control" id="numero_documento" name="numero_documento" oninput="restrictNumberInput(event)" onchange="myFunction()" maxlength="10" required>
                </div>
                <div class="col-6 mb-2">
                    <label for="primer_nombre" class="form-label">Primer Nombre</label>
                    <input type="text" class="form-control" id="primer_nombre" name="primer_nombre" oninput="restricForm(event)" maxlength="20" required>

                </div>
                <div class="col-6 mb-2">
                    <label for="segundo_nombre" class="form-label">Segundo Nombre</label>
                    <input type="text" class="form-control" id="segundo_nombre" name="segundo_nombre" oninput="restricForm(event)" maxlength="20">
                </div>
                <div class="col-6 mb-2">
                    <label for="primer_apellido" class="form-label">Primer Apellido</label>
                    <input type="text" class="form-control" id="primer_apellido" name="primer_apellido" oninput="restricForm(event)" maxlength="30" required>

                </div>
                <div class="col-6 mb-2">
                    <label for="segundo_apellido" class="form-label">Segundo Apellido</label>
                    <input type="text" class="form-control" id="segundo_apellido" name="segundo_apellido" oninput="restricForm(event)" maxlength="30">

                </div>
                <div class="col-3 mb-2">
                    <label for="sexo" class="form-label">Sexo</label>
                    <select class="form-select" aria-label="Default select example" id="id_sexo" name="id_sexo" required="required">
                        <option selected value="">Seleccionar</option>
                        <?php
                        foreach ($registro_sexo as $sexo) {
                            echo '<option value="' . $sexo->getId() . '">' . $sexo->getSexo() . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="col-3 mb-2">
                    <label for="telefono" class="form-label">Telefono</label>
                    <input type="tel" class="form-control" id="telefono" name="telefono" oninput="restrictNumberInput(event)" maxlength="10" required>
                </div>
                <div class="col-6 mb-2">
                    <label for="id_ciudad" class="form-label">Ciudad De Residencia</label>
                    <select class="form-select" aria-label="Default select example" id="id_ciudad" name="id_ciudad" required="required">
                        <option selected value="">Seleccionar</option>
                        <?php
                        foreach ($data as $valores) {
                            echo '<option value="' . $valores->getId() . '">' . $valores->getCiudad() . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="col-6 mb-2">
                    <label for="direccion" class="form-label ">Dirección</label>
                    <input type="text" class="form-control" id="direccion" name="direccion" oninput="restrictAddres(event)" maxlength="140" required>
                </div>
                <div class="col-6 mb-2">
                    <label for="correo" class="form-label ">E-mail</label>
                    <input type="email" class="form-control" id="correo" name="correo">
                </div>
            </div>

            <button type="submit" class="btn btn-outline-info ml-2">Guardar Cliente</button>
        </div>

    </form>
</div>

<?php
include_once(BASE_DIR . '../../views/main/partials/footer.php');
?>
