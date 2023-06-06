<?php
include_once(__DIR__ . "../../../config/config.example.php");
include_once(BASE_DIR . '../../views/main/partials/header.php');
require_once '../../models/clienteModel.php';
require_once '../../models/tipoServicioModel.php';
require_once '../../models/TipoDispositivosModel.php';


$cliente = new Cliente();
$nombre = $cliente->getAll();

$servicio  = new Servicios();
$registro_servicios = $servicio->getAll();

$tipo_dispositivos = new Dispositivos();
$registro_tipo_dispositivos = $tipo_dispositivos->getAll();

$fecha = date('d-M-Y');
?>
<div class="container-fluid">



    <body>
        <center>
            <h2 class="title">Sistema de facturación</h2>
        </center>
        <div class="container">
            <div class="row">
             
                <hr>
         <form class="row g-3" action="../../controller/facturaController.php?c=1" method="post">
                <div class="col-6">
                    <div class="titulo" id="id_persona">NOMBRE COMPLETO: </div>
                    <select class="form-select persona" aria-label="Default select example" name="id_persona" id="id_persona">
                            <?php
                            foreach ($nombre as $nombreCompleto) {
                                echo '<option value="' . $nombreCompleto->getId() . '">' . $nombreCompleto->NombreCompleto() . '</option>';
                            }
                            ?>
                        </select>
                    
                </div>
                <div class="col-6">
                    <div class="titulo" id="tipo_servicio">TIPO DE SERVICIO: </div>
                    <select class="form-select" aria-label="Default select example" name="id_servicio" id="id_servicio">
                            <option selected>Seleccionar</option>
                            <?php
                            foreach ($registro_servicios as $servicio) {
                                echo '<option value="' . $servicio->getId() . '">' . $servicio->getServicio() . '</option>';
                            }
                            ?>
                        </select>
                </div>

                <div class="col-6">
                    <div class="titulo" id="id_servicio">DISPOSITIVO: </div>
                    <select class="form-select" aria-label="Default select example" name="id_tipo_dispositivo" id="id_tipo_dispositivo">
                            <option selected>Seleccionar</option>
                            <?php
                            foreach ($registro_tipo_dispositivos  as $datos) {
                                echo '<option value="' . $datos->getId() . '">' . $datos->getDispositivo() . '</option>';
                            }
                            ?>
                        </select>
                </div>

                <div class="col-md-4">
                        <label for="fecha" class="form-label">FECHA</label>
                        <input type="text" class="form-control" id="fecha" name="fecha" value="<?= $fecha?>" readonly >
                    </div>

                <div class="col-6">
                    <div class="titulo" id="total">TOTAL:</div>
                    <input class="form-control" name="total"  id="total" type="number" >
                </div>

                <p>


                <div class="col-6">
                        <button type="submit" class="btn btn-outline-info ml-2">Crear</button>
                </div>
                        </div>
             </form>
           </div>
<!-- /.container-fluid -->


<script>
    $(document).ready(function() {
        $('.persona').select2();
    });
</script>

<?php
include_once(BASE_DIR . '../../views/main/partials/footer.php');
?>
