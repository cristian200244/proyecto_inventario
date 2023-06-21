<?php
include_once(__DIR__ . "../../../config/config.php");
include_once(BASE_DIR . '../../views/main/partials/header.php');
require_once '../../models/reportesModel.php';

$datos = new ReportModel();
$registro = $datos->getAll();

setlocale(LC_TIME,'UTF-8');

?>

<div class="container-fluid">
    <h1>Reportes</h1>

    <form class="row g-3" action="../../controller/reportesController.php?c=1" method="post">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Año</th>
                    <th scope="col">Mes</th>
                    <th scope="col">Total Reportado</th>

                </tr>
            </thead>
            <tbody>
                <?php

                if ($registro) {
                    $pos = 1;

                    foreach ($registro as $row) {
                ?>
                        <tr>
                            <td><?= $row->getAnio(); ?></td>
                            <td><?= $row->getMes(); ?></td>
                            <td>$<?= number_format($row->getTotal()) ?></td>

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

        </table>
    </form>
</div>
<?php
include_once(BASE_DIR . '../../views/main/partials/footer.php');
?>