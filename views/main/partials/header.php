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
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet"> 
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body id="page-top " >

    <div id="wrapper" >
        <?php include_once 'aside.php'; ?>
        <div id="content-wrapper" class="d-flex flex-column">

            <div id="content">
            
                <nav class="navbar navbar-expand navbar-light bg-ligth topbar mb-4 static-top shadow ">
                    <h2 class="text-dark  ml-2 text">Control De Inventario</h2>


         
                    <ul class="navbar-nav ms-auto ms-md-0 me-5 me-lg-7">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                
                                <li>
                                    <hr class="dropdown-divider" />
                                </li>

                                <li>
                                    <a class="dropdown-item" href="<?= BASE_URL ?>/index.php?c=6" onclick="salirSistema()">
                                        <i class="fa-solid fa-hand fa-shake" style="color: #FF4633 ; padding-left: 8%; padding-right:8%;"></i>
                                        Cerrar Sesión
                                    </a>
                                </li>
                                
                            </ul>

                        </li>
                    </ul>

                 </nav>
     
               
     

   
  