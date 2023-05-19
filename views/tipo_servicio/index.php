<?php
include_once(__DIR__ . "../../../config/config.example.php");
include_once(BASE_DIR . '../../views/main/partials/header.php');
require_once '../../models/tipoServicioModel.php';

$datos_servicio = new Servicios();
$registro = $datos_servicio->getAll();

foreach ($registro as $servicios) {
    $id= $servicios->getId();
    $servicio= $servicios->getServicio();
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
            <button type="button" class="btn btn-outline-primary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                <i class="bi bi-plus-circle-fill" style="font-size: 1.5rem; "></i>
            </button>
        </h1>
        <div class="row">
            <div class="col">
                <div class="collapse" id="collapseExample">
                    <div class="card card-body">
                        <div class="mb-3">
                            <form action="../../controller/tipoServicioController.php" method="POST">
                                <input type="hidden" name="c" value="1">
                                <div class="input-group ">
                                    <input type="text" class="form-control" id="servicio" name="servicio" placeholder="Ingrese un nuevo tipo de documento">
                                    <button type="submit" class="btn btn-outline-primary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-send-plus-fill" viewBox="0 0 16 16">
                                            <path d="M15.964.686a.5.5 0 0 0-.65-.65L.767 5.855H.766l-.452.18a.5.5 0 0 0-.082.887l.41.26.001.002 4.995 3.178 1.59 2.498C8 14 8 13 8 12.5a4.5 4.5 0 0 1 5.026-4.47L15.964.686Zm-1.833 1.89L6.637 10.07l-.215-.338a.5.5 0 0 0-.154-.154l-.338-.215 7.494-7.494 1.178-.471-.47 1.178Z" />
                                            <path d="M16 12.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Zm-3.5-2a.5.5 0 0 0-.5.5v1h-1a.5.5 0 0 0 0 1h1v1a.5.5 0 0 0 1 0v-1h1a.5.5 0 0 0 0-1h-1v-1a.5.5 0 0 0-.5-.5Z" />
                                        </svg>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- registro -->
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Actualizar Registro </h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="../../controller/tipoServicioController.php?c=3&id_tipo_servicio=<?= $id ?>" method="POST">
                                    <div class="input-group ">
                                        <input type="text" class="form-control" id="servicio" name="servicio" value="<?= $servicio ?>">

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
                                    <td><?= $servicios->getServicio() ?></td>
                                    <td>
                                        <a class="btn btn-sm btn-outline-warning" data-bs-toggle="modal" data-bs-target="#staticBackdrop" href="../../controller/tipoServicioController.php?c=2&id_tipo_servicio=<?= $servicios->getId() ?>">Actualizar</a>
                                        <a class="btn btn-sm btn-outline-danger" href="../../controller/tipoServicioController.php?c=4&id_tipo_servicio=<?= $servicios->getId() ?>">Eliminar</a>
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