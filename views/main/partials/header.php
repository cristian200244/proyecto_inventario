<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sistema De Inventario</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/alertifyjs/build/css/alertify.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/alertifyjs/build/alertify.min.js"></script>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css" />
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css" />
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.5/dist/sweetalert2.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css'>
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Montserrat''>
    <link href="../../public/css/sb-admin-2.css" rel="stylesheet">
    <link href="../../public/css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../public/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="../../public/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link  href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    

</head>

<body id="page-top " >

    <div id="wrapper" >
        <?php include_once 'aside.php'; ?>
        <div id="content-wrapper" class="d-flex flex-column"> 
            <div id="content">
            
                <nav class="navbar navbar-expand navbar-light bg-ligth topbar mb-4 static-top shadow ">
                    <h2 class="text-dark  ml-2 text">Control De Inventario </h2> 

                    <ul class="navbar-nav ms-auto ms-md-0 me-5 me-lg-7">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                
                                <li>
                                    <hr class="dropdown-divider" />
                                </li>

                                <li>
                                    <a class="dropdown-item"  href="<?= BASE_URL ?>/index.php" onclick="salirSistema()">
                                        <i class="fa-solid fa-hand fa-shake" style="color: #FF4633 ; padding-left: 8%; padding-right:8%;"></i>
                                        Cerrar Sesión
                                    </a>
                                  </li>


                           

                                  <li>
                                  <a class="dropdown-item"   class="btn btn-warning"  type="button" class="" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                        <i class="fa-solid fa-hand fa-shake" style="color: #FF4633 ; padding-left: 8%; padding-right:8%;"></i>
                                        Cambiar Contraseña
                                  </a>
                                   
                                  </li>
 
                                  </ul>

                                  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h1 class="modal-title fs-5" id="staticBackdropLabel">Deseas Cambiar la contraseña!!</h1>
                                          <button id="change-password-close" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label"  >Contraseña</label>
                                        
                                        <input id="change-password-input" type="password" class="form-control" id="exampleInputPassword1" >
                                        
                                         </div>
                                            </div>
                                        <div class="modal-footer">
                                          <button id="change-password-cancel" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                         
                                          <input id="change-password-button" class="btn btn-primary" value="Enviar" onclick="changepasswordOnClikc()">
                                        </div>
                                      </div>
                                    </div>
                                </div>
                                
                             </li>
                            </ul>
                </nav>
                <script>

                    // Capturamos lo elementos
                    changepasswordinput = document.querySelector('#change-password-input')
                    changepasswordclose = document.querySelector('#change-password-close')
                    changepasswordcancel = document.querySelector('#change-password-cancel')
                    changepasswordbuttton = document.querySelector('#change-password-button')

                    changepasswordOnClikc = () => {

                      changepasswordinput.disabled = true;
                      changepasswordclose.disabled = true;
                      changepasswordbuttton.disabled = true;
                      changepasswordcancel.disabled = true;

                      formdata = new FormData();

                      formdata.append('password', changepasswordinput.value);

                      fetch('http://localhost/proyecto_inventario/app/change-password.php', {
                        method: 'post',
                        body: formdata
                      })
                      .then(response => response.json())
                      .then(json => {
                        changepasswordclose.disabled = true;
                        changepasswordcancel.disabled = false;
                        changepasswordinput.disabled = false;
                        changepasswordbuttton.disabled = false;
  
                        changepasswordcancel.click();
                        alert('Contraseña actualizada')
                      });
                       setTimeout(() => {

                      }, 3000);
                    }

                </script>
                