<?php
include_once(__DIR__ . "../../../config/config.example.php");
include_once(BASE_DIR . '../../views/main/partials/header.php');
require_once '../../models/clienteModel.php';
$r = rand(0, 999999999);

$datos = new Cliente();
$registro = $datos->getAll();



foreach  ($registro as $cliente){
    $primer_nombre       = $cliente->getPrimerNombre();
    $segundo_apellido    = $cliente->getSegundoApellido();
    $direccion           = $cliente->getDireccion();
}
?>

<!-- Begin Page Content -->
<div class="container-fluid">



    <body>
        <center>
            <h2 class="title">Sistema de facturación</h2>
        </center>
        <div class="container">
            <div class="row">

                <hr>

                <div class="col-6">
                    <div class="titulo" id="Nombre_completo">NOMBRE COMPLETO: </div>
                   <?=$primer_nombre ?> <?= $segundo_apellido ?>
                    
                </div>
                <div class="col-6">
                    <div class="titulo" id="tipo_servicio">TIPO DE SERVICIO: </div>
                    <input class="form-control" type="number">
                </div>

                <div class="col-6">
                    <div class="titulo" id="fecha">FECHA: </div>
                    <input type="datetime-local" name="" id="">
                </div>

                <div class="col-6">
                    <div class="titulo" id="direccion">PRECIO:</div>
                    <input class="form-control" type="text"  value="<?= $direccion ?>">
                </div>


                <p>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>
                                <h4 class="titulo">&nbsp;&nbsp;&nbsp;Codigo&nbsp;&nbsp;&nbsp;</h4>
                            </th>
                            <th>
                                <h4 class="titulo">&nbsp;&nbsp;&nbsp;Cant.&nbsp;&nbsp;&nbsp;</h4>
                            </th>
                            <th>
                                <h4 class="titulo">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Subtotal&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h4>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?= $r ?></td>
                            <td>cantidad total</td>
                            <td>valor total</td>
                        </tr>
                    </tbody>
                </table>
                <div class="row sinespacio">

                    <div class="col-xs-3">
                        <div>Valor a Pagar: </div>
                       
                    </div>
                    <p>
                    <p><button type="submit"  class="  col-auto btn btn-outline-info" >Crear</button>
                </div>
            </div>
    </body>

</div>
<!-- /.container-fluid -->

<?php
include_once(BASE_DIR . '../../views/main/partials/footer.php');
?>