<?php
include_once(__DIR__ . "../../../config/config.example.php");
include_once(BASE_DIR . '../../views/main/partials/header.php');
require_once '../../models/estadoProductoModel.php';

$estados = new EstadoProducto();

$registros = $estados->getAll();


foreach ($registros as $estado_producto) {
    $id     = $estado_producto->getId();
    $estado = $estado_producto->getEstado();
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
        <h1 class="h3 mb-4 text-gray-800 text-left">Esatdos Del Dispositivo <a type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                <i class="bi bi-plus-circle-fill" style="font-size: 1.5rem; "></i>
            </a></h1>
        <div class="row">
            <div class="col">
                <div class="collapse" id="collapseExample">
                    <div class="card card-body">
                        <div class="mb-3">
                            <form action="../../controller/estadoProductoController.php" method="POST">
                                <input type="hidden" name="c" value="1">
                                <div class="input-group ">
                                    <input type="text" class="form-control" id="estado" name="estado" placeholder="Ingrese una nueva Estado">
                                    <button type="submit" class="btn btn-outline-primary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                        <i class="bi bi-send-plus-fill" style="font-size: 1.0rem; "></i>
                                    </button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
                <!-- Actualizacion de registro-->

                <br>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Esatdo</th>
                            <th scope="col" colspan="2">opciones</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($registros) {
                            $pos = 1;
                            foreach ($registros as $estado_producto) {

                        ?>
                                <tr>
                                    <th><?= $pos ?></th>
                                    <td>
                                        <span id="estado_dispositivo<?= $estado_producto->getId() ?>"><?= $estado_producto->getEstado() ?></span>
                                    </td>
                                    <td>
                                        <a type="button" class="btn btn-sm btn-outline-warning" data-bs-toggle="modal" data-bs-target="#staticBackdrop" id="id_estado_<?= $estado_producto->getId() ?>" onclick="update(<?= $estado_producto->getId() ?>)">Actualizar</a>
                                        <a type="button" class="btn btn-sm btn-outline-danger" href="../../controller/estadoProductoController.php?c=4&id_estado_producto=<?= $estado_producto->getId() ?>">Eliminar</a>
                                    </td>

                                </tr>
                                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Actualizar Registro </h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="input-group ">
                                                    <input type="text" class="form-control" id="estado_actualizado" name="estado">

                                                </div>
                                                <div class="modal-footer">
                                                    <a class="btn btn-outline-success" data-bs-dismiss="modal" onclick="recarga(<?= $estado_producto->getId() ?>) ">Actualizar</a>
                                                    <!-- <button type="button" class="btn btn-outline-primary">Cancelar</button> -->
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
        let elemento = document.getElementById(`estado_dispositivo${id}`);
        let estado = elemento.textContent

        document.getElementById('estado_actualizado').value = estado
    }

    function recarga(id) {

        let elemento = document.getElementById("estado_actualizado");
        let estado = elemento.value

        axios.post(`../../controller/estadoProductoController.php?c=3&id_estado_producto=${id}&estado=${estado}`)
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