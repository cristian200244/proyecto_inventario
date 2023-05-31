<?php
include_once(__DIR__ . "../../../config/config.example.php");
include_once(BASE_DIR . '../../views/main/partials/header.php');
require_once '../../models/servicioModel.php';

$datos = new ServiciosModel();
$registro = $datos->getAll();

?>

<!-- Begin Page Content -->
<div class="container-fluid">


    <h1 class="h3 mb-4 text-gray-800 ">Servicios Relizados
        <form class="d-flex float-end" role="search">
            <input class="form-control me-2" type="search" placeholder="buscar " aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
    </h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Codigo</th>
                <th scope="col">Cliente</th>
                <th scope="col">Dispositivo</th>
                <th scope="col">Servicio</th>
                <th scope="col">marca</th>
                <th scope="col">estado</th>
                <th scope="col">fecha</th>
                <th scope="col">falla</th>
                <th scope="col">Opciones</th>
            </tr>
        </thead>
        <tbody>
            <?php

            if ($registro) {

                $pos = 1;

                foreach ($registro as $row) {
            ?>
                    <tr>
                        <th><?= $pos ?></th>
                        <td><?= $row->getCodigo() ?></td>
                        <td><?= $row->getPersona() ?></td>
                        <td><?= $row->getTipoDispositivo() ?></td>
                        <td><?= $row->getTipoServicio() ?></td>
                        <td><?= $row->getMarca() ?></td>
                        <td><?= $row->getEstadoProducto() ?></td>
                        <td><?= $row->getFecha() ?></td>
                        <td><?= $row->getFalla() ?></td>
                        <td>
                        <button type="button" class="btn btn-outline-warning"><a href="../../controller/servicioController.php?c=2&id_servicio=<?= $row->getId() ?>">
                                    <i class="bi bi-pencil-square" style="font-size: 1.3rem; "></i></a>
                            </button>
                        </td>
                    </tr>
                <?php
                    $pos++;
                }
            } else {
                ?>
                <td colspan="10" class="text-center">Sin Registros</td>
            <?php
            }
            ?>
        </tbody>
    </table>

</div>
<!-- /.container-fluid -->

<?php
include_once(BASE_DIR . '../../views/main/partials/footer.php');
?>