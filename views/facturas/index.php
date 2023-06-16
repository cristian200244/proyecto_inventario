<?php
include_once(__DIR__ . "../../../config/config.php");
include_once(BASE_DIR . '../../views/main/partials/header.php');
require_once '../../models/facturaModel.php';

$datos = new Factura();
$registro = $datos->getAll();

?>
<!-- facturas -->
<!-- Begin Page Content -->
<div class="container-fluid">

    <button type="button" class="btn  border-primary float-right mr-5  ">
        <a href="<?= BASE_URL ?>./views/facturas/create.php"> <i class="bi bi-person-plus" style="font-size: 1.2rem; "></i></a></button>
    <h1 class="h3 mb-4 text-gray-800 ">Facturas Relizadas
    </h1>

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Cliente</th>
                <th scope="col">codigo</th>
                <th scope="col">Dispositivo</th>
                <th scope="col">Servicio</th>
                <th scope="col">fecha</th>
                <th scope="col">total</th>
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

                        <td><?= $row->getPersona() ?></td>
                        <td><?= $row->getCodigo() ?></td>
                        <td><?= $row->getTipoDispositivo() ?></td>
                        <td><?= $row->getTipoServicio() ?></td>
                        <td><?= $row->getFecha() ?></td>
                        <td><?= number_format( $row->getTotal()) ?></td>
                
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