<?php
include_once(__DIR__ . "../../../config/config.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/style.css">
    <title>Olvido Contraseña</title>
    <link href="<?= BASE_URL ?> ../public/css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body class="bg-gradient-primary">

    <div class="container">
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block ">
                                <img src="../../public/img/logo.png">
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-2">Olvidaste tu contraseña?</h1>
                                        <p class="mb-4">Lo entendemos, pasan cosas. ¡Simplemente ingrese su dirección de correo electrónico a continuación y le enviaremos una contraseña nueva!</p>
                                    </div>
                                    <form class="user" onsubmit="return false" on>
                                        <!-- Input del correo -->
                                        <div class="form-group">
                                            <input id="correo" type="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address...">
                                        </div>
                                        <input id="btn1" class="btn btn-primary btn-user btn-block" type="submit" onclick="onClickSend()">
                                        <br>
                                        <a type="button" href="../../index.php"><i class="btn btn-primary">Atras</i></a>
                                        </button>
                                    </form>
                                    <hr>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        correo = document.querySelector('#correo');
        btn = document.querySelector('#btn1');


        function onClickSend() {

            let formdata = new FormData();
            formdata.append('email', correo.value);

            correo.disabled = true;
            btn.disabled = true;


            fetch('http://localhost/proyecto_inventario/app/recuperar-password.php', {
                    method: 'post',
                    body: formdata
                }).then(response => response.json())
                .then(json => {
                    alert(json.mensage)
                    correo.disabled = false;
                    btn.disabled = false;
                    correo.disabled = false;
                })
        }
    </script>
</body>

</html>