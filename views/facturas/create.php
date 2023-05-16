<?php
include_once(__DIR__ . "../../../config/config.example.php");
include_once(BASE_DIR . '../../views/main/partials/header.php');
$r = rand(10000, 100000);
?>

<!-- Begin Page Content -->
<div class="container-fluid">
   


    <body>
    <center><h2 class="title">Sistema de facturación</h2></center>
        <div class="container">
            <div class="row">

                <hr>

                <div class="col-6">
                    <div class="titulo" id="Nombre_completo">Nombre completo: </div>
                    <input class="form-control" type="text">
                </div>


                <div class="col-6">
                    <div class="titulo" id="numerofactura">Nro. Factura: </div>
                    <input class="form-control" type="number">
                </div>





                <div class="col-6">
                    <div class="titulo" id="telefono">Telefono: </div>
                    <input class="form-control" type="number">
                </div>

                <div class="col-6">
                    <div class="titulo" id="direccion">Direccion:</div>
                    <input class="form-control" type="number">
                </div>



                <div class="col-6">
                    <div class="titulo" id="id_marca">marca: </div>
                    <input class="form-control" type="number">
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
                            <!-- <td><?= $r ?></td>
              <td><?= $r ?></td> -->
                        </tr>
                    </tbody>
                </table>
                <div class="row sinespacio">

                    <div class="col-xs-3">
                        <div>Valor a Pagar: </div>
                        <input class="form-control" type="number">
                    </div>
                </div>
            </div>
    </body>

    </html>







</div>
<!-- /.container-fluid -->

<?php
include_once(BASE_DIR . '../../views/main/partials/footer.php');
?>