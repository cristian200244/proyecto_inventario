<?php
include_once(__DIR__ . "/config/config.example.php");
?>




<form id="forgetForm" method="POST">
    <div id="errorMessge" class="alert hidden">
    </div>
    <div id="inputSection">
        <div class="form-group">
            <input type="text" name="userName" class="form-control" placeholder="Username..." />
        </div>
        <div class="form-group">
            OR
        </div>
        <div class="form-group">
            <input type="email" name="userEmail" class="form-control" placeholder="Email address..." />
        </div>
        <div class="form-group">
            <input type="hidden" name="action" value="forgetPassword" />
            <input type="submit" class="btnSubmit" value="Reset Password" />
        </div>
    </div>
</form>


<!-- <!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Forgot Password</title>
    <link href="<?= BASE_URL ?> ../public/css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body class="bg-gradient-primary">

    <div class="container">
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-password-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-2">Olvidaste tu contraseña?</h1>
                                        <p class="mb-4">Lo entendemos, pasan cosas. ¡Simplemente ingrese su dirección de correo electrónico a continuación y le enviaremos un enlace para restablecer su contraseña!</p>
                                    </div>
                                    <form class="user">
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address...">
                                        </div>
                                        <a href="index.php" class="btn btn-primary btn-user btn-block">
                                            Restablecer Contraseña
                                        </a>
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
</body>

</html> -->