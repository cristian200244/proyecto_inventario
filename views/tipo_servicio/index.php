<?php
include_once(__DIR__ . "../../../config/config.example.php");
include_once(BASE_DIR . '../../views/main/partials/header.php');
require_once '../../models/tipoServicioModel.php';

$datos_servicio = new Servicios();
$registro = $datos_servicio->getAll();

foreach ($registro as $servicios) {
    $id = $servicios->getId();
    $servicio = $servicios->getServicio();
}

?>


<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="container text-center">
        <h1 class="h3 mb-4 text-gray-800">Configuración Del Sistema</h1>
        <hr>
        <?php include_once(BASE_DIR . '../../views/main/partials/menu.php'); ?>
        <hr>
        <h1 class="h3 mb-4 text-gray-800 text-left">Tipo De Servicios
            <a type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                <i class="bi bi-plus-circle-fill" style="font-size: 1.5rem; "></i>
            </a>
        </h1>
        <div class="row">
            <div class="col">
                <div class="collapse" id="collapseExample">
                    <div class="card card-body">
                        <div class="mb-3">
                            <form action="../../controller/tipoServicioController.php" method="POST" onsubmit="submitFormServicio(event)" id="mi_form_servicio">
                                <input type="hidden" name="c" value="1">
                                <div class="input-group ">
                                    <input type="text" class="form-control" id="servicio" name="servicio" placeholder="Ingrese un nuevo tipo de documento" oninput="restrictInput(event)" maxlength="30">
                                     <button type="submit" class="btn btn-outline-primary"  data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                    <i class="bi bi-send-plus-fill" style="font-size: 1.0rem; "></i>
                                </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <br>
                <table class="table ">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Servicio</th>
                            <th scope="col" colspan="2">opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($registro) {
                            $pos = 1;
                            foreach ($registro as $servicios) {
                        ?>
                                <tr>
                                    <td><?= $pos ?></td>
                                    <td>
                                        <span id="tipo_servicio<?= $servicios->getId() ?>"> <?= $servicios->getServicio() ?> </span>
                                    </td>
                                    <td>
                                        <a class="btn btn-sm btn-outline-warning" data-bs-toggle="modal" data-bs-target="#staticBackdrop" id="id_servicio_<?= $servicios->getId() ?>" onclick="update(<?= $servicios->getId() ?>)">Actualizar</a>
                                        <a class="btn btn-sm btn-outline-danger" href="../../controller/tipoServicioController.php?c=4&id_tipo_servicio=<?= $servicios->getId() ?>">Eliminar</a>
                                    </td>
                                </tr>
                                <!-- registro -->
                                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Actualizar Registro </h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="input-group ">
                                                    <input type="text" class="form-control" id="servicio_actualizado" name="servicio">

                                                </div>
                                                <div class="modal-footer">
                                                    <a class="btn btn-outline-success" data-bs-dismiss="modal" onclick="recarga(<?= $servicios->getId() ?>)">Actualizar</a>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php
                                $pos++;
                            }
                        } else {
                            ?>
                            <tr>
                                <td colspan="3" class="text-center">No hay datos</td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>

</div>
<script>
    function update(id) {
        let elemento = document.getElementById(`tipo_servicio${id}`);
        let servicio = elemento.textContent

        document.getElementById('servicio_actualizado').value = servicio
    }

    function recarga(id) {

        let elemento = document.getElementById("servicio_actualizado");
        let servicio = elemento.value


        axios.post(`../../controller/tipoServicioController.php?c=3&id_tipo_servicio=${id}&servicio=${servicio}`)
            .then(function(response) {
                window.location.reload()
            })
            .catch(function(error) {
                console.error(error);
            });
    }
</script>
<!-- /.container-fluid -->

<?php
include_once(BASE_DIR . '../../views/main/partials/footer.php');
?>