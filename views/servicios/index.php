<?php
include_once(__DIR__ . "../../../config/config.php");
include_once(BASE_DIR . '../../views/main/partials/header.php');

?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800 text text-center">Crear Servicio</h1>
    <div class="container text-center">
        <div class="row">
            <div class="col">
                <h1 class="h3 mb-4 text-gray-800 text text-left">Cliente</h1>

                <div class="mb-3 text-left">
                    <label for="formGroupExampleInput" class="form-label">Example label</label>
                    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input placeholder">
                </div>
                <div class="mb-3 text-left">
                    <label for="formGroupExampleInput2" class="form-label">Another label</label>
                    <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Another input placeholder"><br>

                    <h1 class="h3 mb-4 text-gray-800 text text-left">Dispositivo</h1>



                    <div class="container text-center">
                        <div class="row">
                            <div class="col">
                                <div class="mb-3 text-left">
                                    <label for="formGroupExampleInput" class="form-label">Example label</label>
                                    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input placeholder">
                                </div>
                                <div class="mb-3 text-left">
                                    <label for="formGroupExampleInput2" class="form-label">Another label</label>
                                    <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Another input placeholder">
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3 text-left">
                                    <label for="exampleFormControlInput1" class="form-label">Email address</label>
                                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                                </div>
                                <div class="mb-3 text-left">
                                    <label for="exampleFormControlInput1" class="form-label">Email address</label>
                                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                                </div>

                            </div  
                        </div>
                    </div>
                    <div class="mb-3">
                    </div>
                    <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>

            </div>
        </div>

        
    </div>
    <!-- /.container-fluid -->
    

    <?php
    include_once(BASE_DIR . '../../views/main/partials/footer.php');
    ?>