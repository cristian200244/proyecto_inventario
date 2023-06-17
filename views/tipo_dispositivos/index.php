<?php
include_once(__DIR__ . "../../../config/config.php");
include_once(BASE_DIR . '../../views/main/partials/header.php');
require_once '../../models/TipoDispositivosModel.php';

$datos_dispositivos = new Dispositivos();
$registro = $datos_dispositivos->getAll();

foreach ($registro as $dispositivos) {
    $id = $dispositivos->getId();
    $nombre = $dispositivos->getDispositivo();
}


?>

<div class="container-fluid">

    <div class="container text-center">
        <h1 class="h3 mb-4 text-gray-800">Configuración Del Sistema</h1>
        <hr>
        <?php include_once(BASE_DIR . '../../views/main/partials/menu.php'); ?>
        <hr>
        <h1 class="h3 mb-4 text-gray-800 text-left">Dispositivos <a type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                <i class="bi bi-plus-circle-fill" style="font-size: 1.5rem; "></i>
            </a></h1>
        <div class="row">
            <div class="col">
                <div class="collapse" id="collapseExample">
                    <div class="card card-body">
                        <div class="mb-3">
                            <form action="../../controller/TipoDispositivosController.php" method="POST" >
                                <input type="hidden" name="c" value="1">
                                <div class=" input-group ">
                                    <input type=" text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese un nuevo nuevo dispositivo" oninput="restrictInput(event)" maxlength="30" required>
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
                            <th scope="col">Nombre</th>
                            <th scope="col" colspan="2">opciones</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($registro) {
                            $pos = 1;
                            foreach ($registro as $dispositivos) {


                        ?>
                                <tr>
                                    <td><?= $pos ?></td>
                                    <td>
                                        <span id="dispositivo<?= $dispositivos->getId() ?>"> <?= $dispositivos->getDispositivo() ?></span>
                                    </td>
                                    <td>
                                        <a type="button" class="btn btn-sm btn-outline-warning" data-bs-toggle="modal" data-bs-target="#staticBackdrop" id="id_dispositivo_<?= $dispositivos->getId() ?>" onclick="update(<?= $dispositivos->getId() ?>)">Actualizar</a>
                                        <a type="button" class="btn btn-sm btn-outline-danger" href="../../controller/TipoDispositivosController.php?c=4&id_tipo_dispositivo=<?= $dispositivos->getId() ?>">Eliminar</a>

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
                                                    <input type="text" class="form-control" id="dispositivo_actualizado" name="nombre" value="<?= $nombre ?>">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-outline-success" data-bs-dismiss="modal" onclick="recarga(<?= $dispositivos->getId() ?>)">Actualizar</button>
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
        let elemento = document.getElementById(`dispositivo${id}`);
        let nombre = elemento.textContent

        document.getElementById('dispositivo_actualizado').value = nombre
    }

    function recarga(id) {

        let elemento = document.getElementById("dispositivo_actualizado");
        let nombre = elemento.value

        axios.post(`../../controller/tipoDispositivosController.php?c=3&id_tipo_dispositivo=${id}&nombre=${nombre}`)
            .then(function(response) {
                window.location.reload()
            })
            .catch(function(error) {
                console.error(error);
            });
    }
</script>
<?php
include_once(BASE_DIR . '../../views/main/partials/footer.php');
?>