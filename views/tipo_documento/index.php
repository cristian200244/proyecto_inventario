    <?php
    include_once(__DIR__ . "../../../config/config.example.php");
    include_once(BASE_DIR . '../../views/main/partials/header.php');
    require_once '../../models/documentoModel.php';

    $datos_documento = new TipoDocumento();
    $registro = $datos_documento->getAll();

    foreach ($registro as $documento) {
        $id = $documento->getId();
        $tipo_documento = $documento->getTipoDocumento();
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
            <h1 class="h3 mb-4 text-gray-800 text-left">Tipos De Documento
                <a type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                    <i class="bi bi-plus-circle-fill" style="font-size: 1.5rem; "></i>
                </a>
            </h1>
            <div class="row">
                <div class="col">
                    <div class="collapse" id="collapseExample">
                        <div class="card card-body">
                            <div class="mb-3">
                                <form action="../../controller/documentoController.php" method="POST"  >
                                    <input type="hidden" name="c" value="1">
                                    <div class="input-group ">
                                        <input type="text" class="form-control" id="tipo" name="tipo" placeholder="Ingrese un nuevo tipo de documento" oninput="restrictInput(event)" maxlength="30" required>
                                        <button type="submit" class="btn btn-outline-primary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                            <i class="bi bi-send-plus-fill" style="font-size: 1.0rem; "></i>
                                        </button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>

                    <br>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tipo</th>
                                <th scope="col" colspan="2">opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($registro) {
                                $pos = 1;
                                foreach ($registro as $documento) {
                            ?>
                                    <tr>
                                        <td><?= $pos ?></td>
                                        <td>
                                            <span id="documento<?= $documento->getId() ?>"> <?= $documento->getTipoDocumento() ?> </span>
                                        </td>
                                        <td>
                                            <a class="btn btn-sm btn-outline-warning" data-bs-toggle="modal" data-bs-target="#staticBackdrop" id="id_documento_<?= $documento->getId() ?>" onclick="update(<?= $documento->getId() ?>)">Actualizar</a>
                                            <a class="btn btn-sm btn-outline-danger" href="../../controller/documentoController.php?c=4&id_tipo_documento=<?= $documento->getId() ?>">Eliminar</a>
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
                                                        <input type="text" class="form-control" id="tipo_actualizado" name="tipo">

                                                    </div>
                                                    <div class="modal-footer">
                                                        <a class="btn btn-outline-success" data-bs-dismiss="modal" onclick="recarga(<?= $documento->getId() ?>)">Actualizar</a>
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
            let elemento = document.getElementById(`documento${id}`);
            let documento = elemento.textContent

            document.getElementById('tipo_actualizado').value = documento
        }

        function recarga(id) {

            let elemento = document.getElementById("tipo_actualizado");
            let documento = elemento.value

            axios.post(`../../controller/documentoController.php?c=3&id_tipo_documento=${id}&tipo=${ documento }`)
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