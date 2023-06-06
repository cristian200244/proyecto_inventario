<?php
include_once(__DIR__ . "../../../config/config.example.php");
include_once(BASE_DIR . '../../views/main/partials/header.php');
require_once '../../models/facturaModel.php';

$datos = new Factura();
$registro = $datos->getAll();





$fecha = date('M-Y');
?>

<div class="container-fluid">
    <h1>Reportes</h1>
    <form class="row g-3" action="../../controller/facturaController.php?c=2" method="post">
        <table class="table table-striped">
            <tr>
                <th>FECHA</th>
                <th>Ganancias</th>
            </tr>
            <tr>
                <td><?= $fecha ?></td>
                <td><?php ['GANANCIAS']; ?></td>
            </tr>
        </table>
        </tbody>
        </table>
    </form>
</div>
<?php
include_once(BASE_DIR . '../../views/main/partials/footer.php');
?>