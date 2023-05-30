<?php
include_once(__DIR__ . "config/config.example.php");
include_once __DIR__ . "../../../Controllers/UsuarioController.php";
$restriccion = new UsuarioController();

if ( !isset($_SESSION['id'])) {
      header("Location: ../../index.php");
     }
?> 



<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sistema De Inventario</title>


    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css'>
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Montserrat''>
    <link href="../../public/css/sb-admin-2.css" rel="stylesheet">
    <link href="../../public/css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../public/css/style.css">
    <link href="../../public/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">


</head>

<body id="page-top " >

    <div id="wrapper" >
        <?php include_once 'aside.php'; ?>
        <div id="content-wrapper" class="d-flex flex-column">

            <div id="content">
            
                <nav class="navbar navbar-expand navbar-light bg-ligth topbar mb-4 static-top shadow ">
                    <h2 class="text-dark  ml-2 text">Control De Inventario</h2>
                  
                    <!-- <button type="button"  class="btn btn-primary ml-auto mr-4 p-2 g-col-6" ><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
                    
                <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z" />
                <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z" />
            </svg> </button > -->


         
<ul class="navbar-nav ms-auto ms-md-0 me-5 me-lg-7">
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
             <li>
                <a class="dropdown-item" href="<?= BASE_URL ?>/Views/botonExtra/index.php">
                <i class="fa-solid fa-circle-user fa-beat-fade"
                        style="color: #DF00FE ; padding-left: 2%; padding-right:2%;">
                    </i>
                    Usuario
                </a>

            </li> 

            <!-- <input type="hidden" name="c" value="5"> -->
            <li>
                <a class="dropdown-item" href="<?= BASE_URL ?>../sugerencias.php">
                    <i class="fa-solid fa-user-pen fa-fade" style="color: rgb(246, 255, 0); padding-left: 2%; padding-right:2%;"></i>
                    Sugerencias
                </a>
            </li>
            <li>
                <hr class="dropdown-divider" />
            </li>

            <li>
                <a class="dropdown-item" href="<?= BASE_URL ?>../Controllers/usuarioController.php?c=6">
                    <i class="fa-solid fa-hand fa-shake" style="color: #FF4633 ; padding-left: 2%; padding-right:2%;"></i>
                    Cerrar Sesión
                </a>
            </li>
        </ul>

    </li>
</ul>

        </nav>
               

                <!-- <h1>Salir</h1>
    <a href="../../index.php" class="btn" >inicio</a> -->

   

  