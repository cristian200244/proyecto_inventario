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
    <h2>Reportes</h1>
    <div class="container-fluid">
      <table class="table table-striped ">
        <thead>
            <tr>
                <th scope="col">Fecha de creacion</th>
                <th scope="col">Reporte Mensual</th>
                <th scope="col">Total</th>
        
            </tr>
        </thead>
        <tbody>
            
        </tbody>
    </table>
    </div>
</body>

</html>


<?php
include_once(BASE_DIR . '../../views/main/partials/footer.php');
?>