<?php
include_once(__DIR__ . "../../../config/config.php");
include_once(BASE_DIR . '../../views/main/partials/header.php');
require_once '../../models/clienteModel.php';

$datos = new Cliente();
$registro = $datos->getAll();

?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Clientes</h1>
    <table class="table table-striped ">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">ver</th>
                <th scope="col">primer Nombre</th>
                <th scope="col">Primer Apellido</th>
                <th scope="col">Ciudad</th>
                <th scope="col">Direccion</th>
                <th scope="col">Telefono</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($registro) {
                foreach ($registro as $row) {
            ?>
                    <tr>
                        <th><?= $row->id ?></th>
                        <td><button type="button" class="btn btn-outline-info"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                    <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                    <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                                </svg><a href="show.php"></a>
                            </button>
                        </td>
                        <td><?= $row->primer_nombre ?></td>
                        <td><?= $row->primer_apellido ?></td>
                        <td><?= $row->ciudad ?></td>
                        <td><?= $row->direccion ?></td>
                        <td><?= $row->telefono ?></td>

                    </tr>
            <?php
                }
            }
            ?>
        </tbody>
    </table>
</div>


<?php
include_once(BASE_DIR . '../../views/main/partials/footer.php');
?>