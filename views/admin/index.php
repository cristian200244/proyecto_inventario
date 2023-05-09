<?php
include_once(__DIR__ . "../../../config/config.php");
include_once(BASE_DIR . '../../views/main/partials/header.php');
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">hola estas en el modulo Administrador</h1>
    <form action="">
        <div class="container text-center">
            <div class="col-auto">

            </div>
            <h1 class="h2 mb-4  text-center">Usuarios</h1>
            <hr class="bg-info">
            <div class="row text-start">
                <div class="col">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">tipp de documento</label>
                        <select class="form-select" aria-label="Default select example">
                            <option selected>Open this select menu</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Primer Nombre</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Primer Apellido</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">sexo</label>
                        <select class="form-select" aria-label="Default select example">
                            <option selected>Open this select menu</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label ">Direccion</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1">
                    </div>

                </div>
                <div class="col">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">N° de documento</label>
                        <input type="number" class="form-control" id="exampleFormControlInput1">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Segundo Nombre</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Segundo Apellido</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Ciudad</label>
                        <select class="form-select" aria-label="Default select example">
                            <option selected>Open this select menu</option>
                            <option value="1">Amazonas</option>
                            <option value="2">Antioquia</option>
                            <option value="3">Arauca</option>
                            <option value="4">Atlántico</option>
                            <option value="5">Bogotá</option>
                            <option value="6">Bolívar</option>
                            <option value="7">Boyacá</option>
                            <option value="8">Caldas</option>
                            <option value="9">Caquetá</option>
                            <option value="10">Casanare</option>
                            <option value="11">Cauca</option>
                            <option value="12">Cesar</option>
                            <option value="13">Chocó</option>
                            <option value="14">Córdoba</option>
                            <option value="15">Cundinamarca</option>
                            <option value="16">Guainía</option>
                            <option value="17">Guaviare</option>
                            <option value="18">Huila</option>
                            <option value="19">La Guajira</option>
                            <option value="20">Magdalena</option>
                            <option value="21">Meta</option>
                            <option value="22">Nariño</option>
                            <option value="23">Norte de Santander</option>
                            <option value="24">Putumayo</option>
                            <option value="25">Quindío</option>
                            <option value="26">Risaralda</option>
                            <option value="27">San Andrés y Providencia</option>
                            <option value="28">Santander</option>
                            <option value="29">Sucre</option>
                            <option value="30">Tolima</option>
                            <option value="31">Valle del Cauca</option>
                            <option value="32">Vaupés</option>
                            <option value="33">Vichada</option>

                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Telefono</label>
                        <input type="tel" class="form-control" id="exampleFormControlInput1">
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