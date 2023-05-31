<?php
include_once(__DIR__ . "../../../config/config.example.php");
include_once(BASE_DIR . '../../views/main/partials/header.php');
require_once '../../models/marcasModel.php';

$marcas = new Marcas();

$registros = $marcas->getAll();


foreach ($registros as $marca) {
    $id     = $marca->getId();
    $nombre = $marca->getMarca();
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
        <h1 class="h3 mb-4 text-gray-800 text-left">Marcas <button type="button" class="btn btn-outline-primary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                <i class="bi bi-plus-circle-fill" style="font-size: 1.5rem; "></i>
            </button></h1>
        <div class="row">
            <div class="col">
                <div class="collapse" id="collapseExample">
                    <div class="card card-body">
                        <div class="mb-3">
                            <form action="../../controller/marcasController.php" method="POST">
                                <input type="hidden" name="c" value="1">
                                <div class="input-group ">
                                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese una nueva marca">
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
                                <div class="input-group ">
                                    <input type="text" class="form-control" id="nombre_actualizado" name="nombre">

                                </div>
                                <div class="modal-footer">
                                    <a class="btn btn-outline-success" data-bs-dismiss="modal" onclick="recarga(<?= $marca->getId() ?>)">Actualizar</a>
                                </div>
                            </div>
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
                        if ($registros) {
                            $pos = 1;
                            foreach ($registros as $marca) {

                        ?>
                                <tr>
                                    <th><?= $pos ?></th>
                                    <td>
                                        <span id="nombre_<?= $marca->getId() ?>"> <?= $marca->getMarca() ?> </span>
                                    </td>
                                    <td>
                                        <a type="button" class="btn btn-sm btn-outline-warning" data-bs-toggle="modal" data-bs-target="#staticBackdrop" id="id_marca_<?= $marca->getId() ?>" onclick="update(<?= $marca->getId() ?>)">Actualizar</a>
                                        <a type="button" class="btn btn-sm btn-outline-danger" href="../../controller/marcasController.php?c=4&id_marca=<?= $marca->getId() ?>">Eliminar</a>
                                    </td>

                                </tr>
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
        let elemento = document.getElementById(`nombre_${id}`);
        let nombre = elemento.textContent

        document.getElementById('nombre_actualizado').value = nombre
    }

    function recarga(id) {

        let elemento = document.getElementById("nombre_actualizado");
        let nombre = elemento.value

        axios.post(`../../controller/marcasController.php?c=3&id_marca=${id}&nombre=${nombre}`)
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