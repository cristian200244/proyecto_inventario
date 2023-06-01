<!-- 
// Obtén el correo electrónico ingresado por el usuario
// $email = $_POST['correo'];

// Verifica si el correo electrónico existe en tu base de datos o sistema de usuarios
// Realiza la lógica necesaria para verificar la existencia del correo electrónico

// if ($correo_existe) {
  
//   $token = uniqid('', true);

  // Guarda el token y la información de restablecimiento en la base de datos o sistema de usuarios
  // Guarda el token y la información necesaria para permitir al usuario restablecer su contraseña

  // Envía un correo electrónico al usuario con un enlace para restablecer la contraseña
  // $enlace = "https://tu-sitio.com/restablecer_contrañena.php?token=$token";
  // $mensaje = "Hola, has solicitado restablecer tu contraseña. Haz clic en el siguiente enlace para continuar: $enlace";
  // Envía el correo electrónico utilizando la función mail() de PHP o una librería de envío de correos electrónicos

  // Muestra un mensaje al usuario indicando que se ha enviado un correo electrónico con instrucciones para restablecer la contraseña
//   echo "Se ha enviado un correo electrónico con instrucciones para restablecer tu contraseña.";
// } else {
  // Muestra un mensaje de error si el correo electrónico no existe en tu base de datos o sistema de usuarios
//   echo "El correo electrónico ingresado no existe en nuestro sistema.";
// }
//  -->


<?php 
include("inc/header.php"); 
?>
<title>webdamn.com : Demo Build Password Reset System with PHP & MySQL</title>
<script src="js/user.js"></script>
<link rel="stylesheet" href="css/style.css">
<?php include('inc/container.php');?>
<div class="container">	
	<div class="row">
		<h2>Example: Build Password Reset System with PHP & MySQL</h2>		
		<div class="container login-container">
            <div class="row">                
                <div class="col-md-6 login-form-2">
                    <h3>Forget Password Form</h3>						
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
								<input type="hidden" name="action"  value="forgetPassword" />
								<input type="submit" class="btnSubmit" value="Reset Password" />
							</div> 
						</div>						
                    </form>
                </div>
            </div>
        </div>
		
	</div>    
</div>
<?php include('inc/footer.php');?>




  