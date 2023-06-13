<?php
include_once(__DIR__ . "../../../config/config.example.php");
include_once(BASE_DIR . '../../views/main/partials/header.php');
require_once '../../models/servicioModel.php';

$datos = new ServiciosModel();
$registro = $datos->getAll();

?>

<!-- Begin Page Content -->
<div class="container-fluid">


    <a type="button" class="btn btn-outline-primary float-right mr-5  " href="<?= BASE_URL ?>./views/servicios/create.php"> <i class="bi bi-person-plus" style="font-size: 1.2rem; "></i></a>
    <h1 class="h3 mb-4 text-dark">Servicios
        <form class="d-flex float-end" role="search">
            <input class="form-control me-1" type="search" placeholder="buscar " aria-label="Search">
            <button class="btn btn-outline-success me-2" type="submit">Search</button>
        </form>
    </h1>

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Código</th>
                <th scope="col">Cliente</th>
                <th scope="col">Dispositivo</th>
                <th scope="col">Servicio</th>
                <th scope="col">Marca</th> 
                <th scope="col">Fecha</th>
                <th scope="col">Falla</th> 
                <th scope="col">Estado</th> 
                <th scope="col">Actualizar</th> 
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
                         <td><?= $row->getFecha() ?></td>
                        <td><?= $row->getFalla() ?> </td>
                        <td><?= $row->getEstadoProducto() ?> </td> 
                         <td  class="text-center">
                            <a type="button" href="../../controller/servicioController.php?c=2&id_servicio=<?= $row->getId() ?>" class="btn btn-outline-warning">
                                <i class="bi bi-pencil-square" style="font-size: 1.3rem; "></i></a>
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
<script>
    document.getElementById("myButton").addEventListener("click", function() {
        var button = document.getElementById("myButton");

        // Obtener el estado actual del botón desde la base de datos utilizando Axios
        axios.get('obtener_estado.php')
            .then(function(response) {
                if (response.data.estado === 'pendiente') {
                    button.classList.remove("btn-danger");
                    button.classList.add("btn-success");
                    button.textContent = "No pendiente";

                    // Actualizar el estado en la base de datos utilizando Axios
                    axios.post('actualizar_estado.php', {
                            estado: 'no pendiente'
                        })
                        .then(function(response) {
                            console.log(response.data);
                        })
                        .catch(function(error) {
                            console.error(error);
                        });
                } else {
                    button.classList.remove("btn-success");
                    button.classList.add("btn-danger" );
                    button.textContent = "Pendiente";

                    // Actualizar el estado en la base de datos utilizando Axios
                    axios.post('actualizar_estado.php', {
                            estado: 'pendiente'
                        })
                        .then(function(response) {
                            console.log(response.data);
                        })
                        .catch(function(error) {
                            console.error(error);
                        }
                    );
                }
            })
            .catch(function(error) {
                console.error(error);
            }
        );
    });
</script>