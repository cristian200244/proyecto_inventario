<?php
include_once(__DIR__ . "../../../config/config.example.php");
include_once(BASE_DIR . '../../views/main/partials/header.php');
require_once '../../models/estadoProductoModel.php';
require_once '../../models/marcasModel.php';
require_once '../../models/TipoDispositivosModel.php';
require_once '../../models/tipoServicioModel.php';
require_once '../../models/clienteModel.php';

$cliente = new Cliente();
$nombre = $cliente->getAll();

$producto = new EstadoProducto();
$registro = $producto->getAll();

$marca = new Marcas();
$registro_marcas = $marca->getAll();

$tipo_dispositivos = new Dispositivos();
$registro_tipo_dispositivos = $tipo_dispositivos->getAll();

$servicio  = new Servicios();
$registro_servicios = $servicio->getAll();

$codigo = rand(1, 9999999);
$fecha = date('Y-m-d');

?>


<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="container text-center">
                <h1 class="h2 mb-4  text-center">Crear Servicio</h1>
                <hr>
                <form class="row g-3" action="../../controller/servicioController.php?c=1" method="post">

                    <div class="col-12">
                        <label for="id_persona" class="form-label">Nombre Completo Del Cliente</label>
                        <select class="form-select persona" aria-label="Default select example" name="id_persona" id="id_persona" required>
                            <option selected value="">Seleccionar</option>
                            <?php
                            foreach ($nombre as $nombreCompleto) {
                                echo '<option value="' . $nombreCompleto->getId() . '">' . $nombreCompleto->NombreCompleto() . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <hr>

                    <h5 class="text-start">Ingresar Datos Del Dispositivo

                    </h5>
                    <div class="col-md-4">
                        <label for="codigo" class="form-label">codigo</label>
                        <input type="text" class="form-control" id="codigo" name="codigo" value="<?= $codigo ?>" readonly>
                    </div>
                    <div class="col-md-4">
                        <label for="id_tipo_dispositivo" class="form-label">Dispositivo</label>
                        <select class="form-select" aria-label="Default select example" name="id_tipo_dispositivo" id="id_tipo_dispositivo" required>
                            <option selected value="">Seleccionar</option>
                            <?php
                            foreach ($registro_tipo_dispositivos  as $datos) {
                                echo '<option value="' . $datos->getId() . '">' . $datos->getDispositivo() . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="id_marca" class="form-label">Marca</label>
                        <select class="form-select" aria-label="Default select example" name="id_marca" id="id_marca" required>
                            <option selected value="">Seleccionar</option>
                            <?php
                            foreach ($registro_marcas as $datos_marca) {
                                echo '<option value="' . $datos_marca->getId() . '">' . $datos_marca->getMarca() . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="id_estado_producto" class="form-label">Estado</label>
                        <select class="form-select" aria-label="Default select example" name="id_estado_producto" id="id_estado_producto" required>
                            <option  selected value="">Seleccionar</option>
                             <?php
                            foreach ($registro as $producto) {
                                echo '<option value=" ' . $producto->getId() . ' ">' . $producto->getEstado() . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="id_tipo_servicio" class="form-label">Servicio</label>
                        <select class="form-select" aria-label="Default select example" name="id_tipo_servicio" id="id_tipo_servicio " required>
                            <option selected value="">Seleccionar</option>
                            <?php
                            foreach ($registro_servicios as $servicio) {
                                echo '<option value="' . $servicio->getId() . '">' . $servicio->getServicio() . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="fecha" class="form-label">Fecha</label>
                        <input type="text" class="form-control" id="fecha" name="fecha" value="<?= $fecha ?>" readonly>
                    </div>
                    <div class="col-md-12">
                        <label for="falla" class="form-label">Falla</label>
                        <textarea class="form-control" id="falla" rows="4" name="falla" placeholder="limite 500 caracteres" oninput="estrictAddres(event)" maxlength="140" ></textarea>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-outline-info">Crear Servicio</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
include_once(BASE_DIR . '../../views/main/partials/footer.php');
?>


<script>
    $(document).ready(function() {
        $('.persona').select2();
    });
</script>