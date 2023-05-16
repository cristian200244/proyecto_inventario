<?php
include_once(__DIR__ . "../../../config/config.example.php");
include_once(BASE_DIR . '../../views/main/partials/header.php');
require_once '../../models/clienteModel.php';


?>



    <div class="container-fluid">
        <div class="row">

            <div class="col-md-3 offset-md-0"><input class="form-control " type="text" placeholder="CONSULTAR DISPOSITIVOS" id="numero_documento"></div>
            <div class="col-4">
                <p><button class=" col-auto btn btn-outline-success" type="submit">buscar</button>
            </div>
        </div>


        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Nombre completo</th>
                    <th scope="col">codigo</th>
                    <th scope="col">Estado</th>

                </tr>
            </thead>
        </table>

</div>











<?php
include_once(BASE_DIR . '../../views/main/partials/footer.php');
?>
 