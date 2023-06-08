<?php
include_once(__DIR__ . "../../../config/config.example.php");
include_once(BASE_DIR . '../../views/main/partials/header.php');
require_once '../../models/clienteModel.php';

$datos = new Cliente();
$registro = $datos->getAll();

?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800 text-center">Clientes <button type="button" class="btn  border-primary float-right mr-5">
            <a href="<?= BASE_URL ?>./views/clientes/create.php"> <i class="bi bi-person-plus" style="font-size: 1.5rem; "></i></a></button></h1>
    <table class="table table-striped ">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Primer Nombre</th>
                <th scope="col">Primer Apellido</th>
                <th scope="col">Ciudad De Residencia</th>
                <th scope="col">Direccion</th>
                <th scope="col">Telefono</th>
                <th scope="col" colspan="3">Opciones</th>
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
                        <td><?= $row->getPrimerNombre() ?></td>
                        <td><?= $row->getPrimerApellido() ?></td>
                        <td><?= $row->getCiudad() ?></td>
                        <td><?= $row->getDireccion() ?></td>
                        <td><?= $row->getTelefono() ?></td>
                        <td> <a href="show.php?id_persona=<?= $row->getId() ?>" class="btn btn-outline-info ">
                                <i class="bi bi-eye-fill" style="font-size: 1.3rem; "></i></a>

                            <a href="../../controller/clienteController.php?c=2&id_persona=<?= $row->getId() ?>" class="btn btn-outline-warning">
                                <i class="bi bi-pencil-square" style="font-size: 1.3rem; "></i></a>

                            <a onclick="AlertDelete('<?= $row->getId() ?>')" class="btn btn-sm btn-outline-danger">
                                <i class="bi bi-trash3-fill" style="font-size: 1.3rem; "></i></a>


                        </td>

                    </tr>
                <?php
                    $pos++;
                }
            } else {
                ?>
                <tr>
                    <td colspan="7" class="text-center">No hay datos</td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>


<?php
include_once(BASE_DIR . '../../views/main/partials/footer.php');
?>