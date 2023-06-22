<?php
include_once(__DIR__ . "../../../config/config.php");
include_once(BASE_DIR . '../../views/main/partials/header.php');
require_once '../../models/estadoProductoModel.php';
require_once '../../models/servicioModel.php';
require_once '../../models/marcasModel.php';
require_once '../../models/TipoDispositivosModel.php';
require_once '../../models/tipoServicioModel.php';
require_once '../../models/clienteModel.php';



$producto = new EstadoProducto();
$registro = $producto->getAll();

$person = new Cliente();
$registro_person = $person->getAll();

$tipo_servicio = new Servicios();
$registros_services = $tipo_servicio->getAll();

$marca = new Marcas();
$registro_marcas = $marca->getAll();

$tipo_dispositivos = new Dispositivos();
$registro_tipo_dispositivos = $tipo_dispositivos->getAll();

$servicio  = new ServiciosModel();
$services = $servicio->getById($_REQUEST['id_servicio']);

$id              = $services->getId();
$persona         = $services->getPersona();
$dispositivo     = $services->getTipoDispositivo();
$marca           = $services->getMarca();
$tipo_servicio   = $services->getTipoServicio();
$codigo          = $services->getCodigo();
$estado          = $services->getEstadoProducto();
$fecha           = $services->getFecha();
$falla           = $services->getFalla();

?>

<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="container text-center">
                <a type="button" class="btn btn-outline-primary float-start mt-2" href="index.php"><i class="bi bi-arrow-return-left"></i></a>
                <h1 class="h2 mb-4  text-center">Actualización Del Servicio</h1>
                <hr>
                <form class="row g-3" action="../../controller/servicioController.php?c=3&id_servicio=<?= $id ?>" method="post">
                    <div class="col-12">
                       <h5 class="text-start">Nombre Completo Del Cliente</h5>
                        <select class="form-select persona" aria-label="Default select example" name="id_persona" id="id_persona" >
                            <?php foreach ($registro_person as $personas) : ?>
                                <option value="<?= $personas->getId() ?>" <?= $personas->getId() == $services->getPersona() ? 'selected' :  "" ?>> <?= $personas->NombreCompleto() ?> </option>
                            <?php endforeach ?>
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
                        <select class="form-select" aria-label="Default select example" name="id_tipo_dispositivo" id="id_tipo_dispositivo">
                            <?php foreach ($registro_tipo_dispositivos as $tipo_dispositivos) : ?>
                                <option value="<?= $tipo_dispositivos->getId() ?>" <?= $tipo_dispositivos->getId() == $services->getTipoDispositivo() ? 'selected' :  "" ?>><?= $tipo_dispositivos->getDispositivo() ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="id_marca" class="form-label">Marca</label>
                        <select class="form-select" aria-label="Default select example" name="id_marca" id="id_marca">
                            <?php foreach ($registro_marcas as $registro_de_marcas) : ?>
                                <option value="<?= $registro_de_marcas->getId() ?>" <?= $registro_de_marcas->getId() == $services->getMarca() ? 'selected' :  "" ?>><?= $registro_de_marcas->getMarca() ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="id_estado_producto" class="form-label">Estado</label>
                        <select class="form-select" aria-label="Default select example" name="id_estado_producto" id="id_estado_producto">
                            <?php foreach ($registro as $registro_estado) : ?>
                                <option value="<?= $registro_estado->getId() ?>" <?= $registro_estado->getId() == $services->getEstadoProducto() ? 'selected' :  "" ?>><?= $registro_estado->getEstado() ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="id_tipo_servicio" class="form-label">Servicio</label>
                        <select class="form-select" aria-label="Default select example" name="id_tipo_servicio" id="id_tipo_servicio">
                            <?php foreach ($registros_services as $registro_de_servicios) : ?>
                                <option value="<?= $registro_de_servicios->getId() ?>" <?= $registro_de_servicios->getId() == $services->getTipoServicio() ? 'selected' :  "" ?>><?= $registro_de_servicios->getServicio() ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="fecha" class="form-label">Fecha</label>
                        <input type="text" class="form-control" id="fecha" name="fecha" value="<?= $fecha ?>" readonly>
                    </div>
                    <div class="col-md-12">
                        <label for="falla" class="form-label">Falla</label>
                        <textarea class="form-control" id="falla" rows="4" name="falla" placeholder="limite 140 caracteres"  oninput="estrictAddres(event)" maxlength="140"> <?= $falla ?></textarea>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-outline-info">Actualizar Servicio</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
include_once(BASE_DIR . '../../views/main/partials/footer.php');
?>