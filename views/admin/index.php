<?php
include_once(__DIR__ . "../../../config/config.example.php");
include_once(BASE_DIR . '../../views/main/partials/header.php');
require_once '../../models/usuarioModel.php';


$datos = new Usuario();
$registro = $datos->getAll();


?>
<link rel="stylesheet" href="">

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Administrador <button type="button" class="btn btn-outline-primary float-right mr-5"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person-add" viewBox="0 0 16 16">
                <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0Zm-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Z" />
                <path d="M8.256 14a4.474 4.474 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10c.26 0 .507.009.74.025.226-.341.496-.65.804-.918C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4s1 1 1 1h5.256Z" />
            </svg><a href="create.php"></a></button></h1>
    <table class="table table-striped ">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Primer Nombre</th>
                <th scope="col">Primer Apellido</th>
                <th scope="col">Ciudad</th>
                <th scope="col">Dirección</th>
                <th scope="col">Teléfono</th>
                <th scope="col">sexo</th>
                <th scope="col">Correo electrónico</th>
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
                        <td><?= $row->getSexo() ?></td>


                        <td><?= $row->getCorreo() ?></td>
                        <td><button type="button" class="btn btn-outline-info"><a href="show.php?id_persona=<?= $row->getId() ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                        <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                        <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                                    </svg></a>
                            </button>
                            
                           

                        </td>

                    </tr>
            <?php
                    $pos++;
                }
            }
            ?>
        </tbody>

    </table>

    </form>
</div>
<?php
include_once(BASE_DIR . '../../views/main/partials/footer.php');
?>
</div>

</div>


</div>


<!-- /.container-fluid -->

