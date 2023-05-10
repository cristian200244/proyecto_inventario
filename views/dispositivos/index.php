<?php
include_once(__DIR__ . "../../../config/config.php");
include_once(BASE_DIR . '../../views/main/partials/header.php');
require_once '../../models/clienteModel.php';


?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<body>
    <h2>CONSULTAR DISPOSITIVOS</h1>

    <form class="d-flex">
    <div class="col-sm-8">
        <input class="form-control me-2" type="text"  aria-label="Search" id="numero_documento" name="numero_documento">
        <button class="btn btn-outline-success" type="submit">buscar</button>
      </form>
      <table class="table table-striped ">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Numero</th>
                <th scope="col">primer Nombre</th>
                <th scope="col">Primer Apellido</th>
        
            </tr>
        </thead>
        <tbody>
            <?php
            if ($registro) {
                foreach ($registro as $row) {
            ?>
                    <tr>
                        <th><?= $row->id ?></th>
                        <td><?= $row->primer_nombre ?></td>
                        <td><?= $row->primer_apellido ?></td>
                        

                    </tr>
            <?php
                }
            }
            ?>
        </tbody>
    </table>

</body>

</html>






























<?php
include_once(BASE_DIR . '../../views/main/partials/footer.php');
?>