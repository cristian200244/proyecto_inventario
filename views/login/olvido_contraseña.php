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
  <title>Document</title>
</head>
<body class="text-center">
    
<div class="container login-container">
            <div class="row">                
                <div class="col-md-6 login-form-2">
                    <h3>Forget Password Form</h3>						
                    <form id="forgetForm" method="POST">
						<div id="errorMessge" class="alert hidden">                            
                        </div>
						<div id="inputSection">
													
							<div class="form-group">
								<input type="email" name="userEmail" class="form-control" placeholder="Email address..." />
							</div>
              <br>
							<div class="form-group">
								<input type="hidden" name="action"  value="forgetPassword" />
								<input type="submit" class="btnSubmit" value="Reset Password" />
							</div> 
						</div>						
                    </form>
                </div>
            </div>
        </div>


    
  </body>
</html>