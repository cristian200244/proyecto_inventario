<?php
include_once(__DIR__ . "../../../config/config.php");
include_once(BASE_DIR . '../../views/main/partials/header.php');
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading --> 
    
    <form method="POST" action="../../controller/clienteController.php">
    <input type="hidden" name="c" value="1">
        <div class="container text-center">
            <h1 class="h2 mb-4  text-center">Crear Cliente</h1>
            <hr class="bg-info">
            <div class="row text-start">
                <div class="col">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Tipo de documento</label>
                        <select class="form-select" aria-label="Default select example" name="id_tipo_documento" id="id_tipo_documento" required="required">
                            <option>Seleccionar Documento</option>
                            <option value="1">CC</option>
                            <option value="2">TI</option>
                            <option value="3">CE</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="primer_nombre" class="form-label">Primer Nombre</label>
                        <input type="text" class="form-control" id="primer_nombre" name="primer_nombre">
                    
                    </div>
                    <div class="mb-3">
                        <label for="primer_apellido" class="form-label">Primer Apellido</label>
                        <input type="text" class="form-control" id="primer_apellido" name="primer_apellido">
                    </div>
                    <div class="mb-3">
                        <label for="sexo" class="form-label">sexo</label>
                        <select class="form-select" aria-label="Default select example" id="sexo" name="sexo" required="required">
                            <option selected>Seleccionar Sexo</option>
                            <option value="2">Masculino</option>
                            <option value="3">Femenino</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="direccion" class="form-label ">Direccion</label>
                        <input type="text" class="form-control" id="direccion" name="direccion">
                    </div>
                    <div class="mb-3">
                        <label for="correo" class="form-label ">E-mail</label>
                        <input type="text" class="form-control" id="correo" name="correo">
                    </div>

                </div>
                <div class="col">
                    <div class="mb-3">
                        <label for="numero_documento" class="form-label">N° de documento</label>
                        <input type="number" class="form-control" id="numero_documento" name="numero_documento">
                    </div>
                    <div class="mb-3">
                        <label for="segundo_nombre" class="form-label">Segundo Nombre</label>
                        <input type="text" class="form-control" id="segundo_nombre" name="segundo_nombre">
                    </div>
                    <div class="mb-3">
                        <label for="segundo_apellido" class="form-label">Segundo Apellido</label>
                        <input type="text" class="form-control" id="segundo_apellido" name="segundo_apellido">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Ciudad</label>
                        <select class="form-select" aria-label="Default select example" id="id_ciudad" name="id_ciudad" required= "required" >
                            <option selected>Selecionar Ciudad</option>
                            <option value="1">San José del Guaviare</option>

                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="telefono" class="form-label">Telefono</label>
                        <input type="tel" class="form-control"   id="telefono" name="telefono">
                    </div>
                </div>

            </div>
            <button type="submit" class="btn btn-outline-info ml-0">Guardar Cliente</button>
        </div>
    </form>
 
</div>
<!-- /.container-fluid -->

<?php
include_once(BASE_DIR . '../../views/main/partials/footer.php');
?>