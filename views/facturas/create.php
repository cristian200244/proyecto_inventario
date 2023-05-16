<?php
include_once(__DIR__ . "../../../config/config.example.php");
include_once(BASE_DIR . '../../views/main/partials/header.php');
require_once '../../models/clienteModel.php';
$r = rand(0,999999999);

$datos = new Cliente();
$registro = $datos->getAll();

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
                    <div class="titulo" id="Nombre_completo">Nombre completo: </div>
                    <?php
                       if ($registro) {
                        $pos = 1;
        
                        foreach ($registro as $row) {
                    ?>
                <tr>
                        
                        <td><?= $row->getPrimerNombre().' '.$row->getPrimerApellido() ?></td>

                </tr>

                <?php
                    $pos++;
                }
            }
            ?>
</div>
                <div class="col-6">
                    <div class="titulo" id="numerofactura">Nro. Factura: </div>
                    <input class="form-control" type="number">
                </div>

                <div class="col-6">
                    <div class="titulo" id="telefono">Telefono: </div>
                   
               <?php
                       if ($registro) {
                        $pos = 1;
        
                        foreach ($registro as $row) {
                    ?>
                <tr>
                        
                        <td><?= $row->getTelefono()?></td>

                </tr>

                <?php
                    $pos++;
                }
            }
            ?>



                </div>

                <div class="col-6">
                    <div class="titulo" id="direccion">Direccion:</div>
                    <?php
                       if ($registro) {
                        $pos = 1;
        
                        foreach ($registro as $row) {
                    ?>
                <tr>
                        
                        <td><?= $row->getDireccion()?></td>

                </tr>

                <?php
                    $pos++;
                }
            }
            ?>
                   
                </div>

                <div class="col-6">
                    <div class="titulo" id="id_marca">marca: </div>
                    <input class="form-control" type="text">
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
                        <input class="form-control" type="number">
                    </div>
                    <p>
                    <p><button type="submit" class=" col-auto btn btn-outline-info">Crear</button>
                </div>
            </div>
    </body>

</div>
<!-- /.container-fluid -->

<?php
include_once(BASE_DIR . '../../views/main/partials/footer.php');
?>