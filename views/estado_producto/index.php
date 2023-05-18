<?php
include_once(__DIR__ . "../../../config/config.example.php");
include_once(BASE_DIR . '../../views/main/partials/header.php');
require_once '../../models/estadoProductoModel.php';

$estado = new EstadoProducto();

$registro = $estado->getAll();

foreach ($registro as $estados) {
    $id     = $estados->getId();
    $estado = $estados->getEstado();
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
        <h1 class="h3 mb-4 text-gray-800 text-left">Estado Del Dispositivo <button type="button" class="btn btn-outline-primary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                <i class="bi bi-plus-circle-fill" style="font-size: 1.5rem; "></i>
            </button></h1>
        <div class="row">
            <div class="col">
                <div class="collapse" id="collapseExample">
                    <div class="card card-body">
                        <div class="mb-3">
                            <form action="../../controller/estadoProductoController.php" method="POST">
                                <input type="hidden" name="c" value="1">
                                <div class="input-group ">
                                    <input type="text" class="form-control" id="estado" name="estado" placeholder="Crear un estado del producto">
                                    <button type="submit" class="btn btn-outline-primary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                        <i class="bi bi-send-plus-fill" style="font-size: 1.0rem; "></i>
                                    </button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
                <!-- Actualizacion de registro-->
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Actualizar Registro </h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="../../controller/estadoProductoController.php?c=3&id_estado_producto ?>" method="POST">
                                    <div class="input-group ">
                                        <input type="text" class="form-control" id="estado" name="estado" value="<?= $estado ?>">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-outline-success" data-bs-dismiss="modal">Actualizar</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
                <br>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Estado</th>
                            <th scope="col" colspan="2">opciones</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($registro) {
                            $pos = 1;
                            foreach ($registro as $estados) {

                        ?>
                                <tr>
                                    <th><?= $pos ?></th>
                                    <td><?= $estados->getEstado() ?></td>
                                    <td>
                                        <a class="btn btn-sm btn-outline-warning" data-bs-toggle="modal" data-bs-target="#staticBackdrop" href="../../controller/estadoProductoController.php?c=2&id_estado_producto=<?= $estados->getId() ?>">Actualizar</a>
                                        <a class="btn btn-sm btn-outline-danger" href="../../controller/estadoProductoController.php?c=4&id_estado_producto=<?= $estados->getId() ?>">Eliminar</a>
                                    </td>

                                </tr>

                        <?php
                                $pos++;
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>

</div>
<!-- /.container-fluid -->

<?php
include_once(BASE_DIR . '../../views/main/partials/footer.php');
?>