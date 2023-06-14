if (document.querySelector("#datos")) {
    let formulario=document.querySelector("#datos");
    formulario.onsubmit = function(e){
        e.preventDefault();
        fntGuardar();
    }
    
    async function fntGuardar(){
        
       
        let numero_documento = document.querySelector('#numero_documento').value;
        let primer_nombre= document.querySelector('#primer_nombre').value;
        let primer_apellido = document.querySelector('#primer_apellido').value;
        
        try{ 
            if (numero_documento== "" || primer_nombre == "" ||primer_apellido == ""){
                 
                Swal.fire(
                    'Todos los campos del formulario son obligarorios',
                    'Intentar De nuevo',
                    'error'
                    )}else{
                        Swal.fire({
                            background:'#000000',
                            // grow:'fullscreen',
                            // Backdrop:true,
                            // timer:5000,
                            // timerProgressBar:true,
                            title: '<b style="color:#03FFFF  ">Bienvenido!</b>',
                            html: '<b style="color:#2ECC71  ">¡Ahora podrás iniciar sesión, haz click en OK!</b>',
                            textColor: '#3085d6',
                            imageUrl: 'https://mundoentrenamiento.com/wp-content/uploads/2021/01/big-data-en-el-futbol-moderno.jpg',
                            // icon: 'success',
                            imageWidth: '80%',
                            imageHeight: '60%',
                            imageAlt: 'Custom image',
                            // width: '70%',
                        }).then((result) => {
                            if (result.isConfirmed){
                                window.location.href = "../../index.php";
                                const data = new FormData(formulario);
                                let resp =fetch("../../Controllers/UsuarioController.php?c=1&id=",{
                                    
                                    method:'POST',
                                    mode:'cors',
                                    cache:'no-cache',
                                    body:data
                              
                                }) }
                                // Json= await rep.jason();
                                console.log(resp);
                            });
                    }
                    
                    

            }catch(err){
                alert("ocurrió un error: "+err);
                
            }
            
            
            // await
        }
    }