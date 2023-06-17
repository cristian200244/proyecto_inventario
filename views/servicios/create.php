<?php

session_start();
if (!isset($_SESSION['id'])) {
    header("Location:../../index.php");
}


include_once(__DIR__ . "../../../config/config.php");
include_once(BASE_DIR . '../../views/main/partials/header.php');
?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="container text-center">
                <h1 class="h2 mb-4  text-center">Crear Servicio</h1>
                <hr>
                <form class="row g-3">
                    <h5 class="text-start">Ingresar Datos Del Cliente</h5>
                    <div class="col-md-2">
                        <label for="inputZip" class="form-label">Tipo De Documento</label>
                        <select id="inputState" class="form-select">
                            <option selected>Choose...</option>
                            <option>...</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="inputState" class="form-label">N° De Documento</label>
                        <input type="text" class="form-control" id="inputZip">

                    </div>
                    <div class="col-md-6">
                        <label for="inputCity" class="form-label">Nombre Completo</label>
                        <input type="text" class="form-control" id="inputCity">
                    </div>
                    <hr>

                    <h5 class="text-start">Ingresar Datos Del Dispositivo</h5>

                   
                    <div class="col-md-4">
                        <label for="inputZip" class="form-label">Dispositivo</label>
                        <input type="text" class="form-control" id="inputZip">
                    </div>
                    <div class="col-md-4">
                        <label for="inputState" class="form-label">Marca</label>
                        <input type="text" class="form-control" id="inputZip">
                    </div>
                    <div class="col-md-4">
                        <label for="inputState" class="form-label">Marca</label>
                        <input type="text" class="form-control" id="inputZip">
                    </div>
                    <div class="col-md-4">
                        <label for="inputEmail4" class="form-label">Servicio</label>
                        <input type="text" class="form-control" id="inputEmail4">
                    </div>
                    <div class="col-md-4">
                        <label for="inputCity" class="form-label">codigo</label>
                        <input type="text" class="form-control" id="inputCity">
                    </div>
                    <div class="col-md-4">
                        <label for="fecha" class="form-label">Fecha</label>
                        <input type="date" class="form-control" id="fecha" name="fecha">
                    </div>
                    <div class="col-md-12">
                        <label for="inputCity" class="form-label">Falla</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="4" placeholder="limite 500 caracteres"></textarea>
                     </div>
                    <div class="col-12">
                        <button type="submit" onclick="enviar()" class="btn btn-outline-info">Crear Servicio</button>
                    </div>
            </div>
            </form>
        </div>


    </div>
    <!-- <button type="submit" class="btn btn-outline-info ml-2">Guardar Servicio</button>
        </div>

    </form> -->
</div>





<!-- /.container-fluid -->

<?php
include_once(BASE_DIR . '../../views/main/partials/footer.php');
?>