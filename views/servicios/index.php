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
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Codigo</th>
                <th scope="col">Cliente</th>
                <th scope="col">Dispositivo</th>
                <th scope="col">Servicio</th>
                <th scope="col" colspan="2">Opciones</th>
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
                        <td>
                            <button type="button" class="btn btn-outline-info"><a href="#">
                                    <i class="bi bi-eye-fill" style="font-size: 1.3rem; "></i></a>
                            </button>
                            <button type="button" class="btn btn-outline-danger"><a href="#">
                                    <i class="bi bi-trash3-fill" style="font-size: 1.3rem; "></i></a>
                            </button>
                        </td>
                    </tr>
                <?php
                    $pos++;
                }
            } else {
                ?>
                <td colspan="6" class="text-center">Sin Registros</td>
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