function login(){
    var user, password

    user = document.getElementById("correo").value;
password = document.getElementById("password").value;

if (user.trim() ==="admin@gmail.com" && password.trim() ==="123456") {
    window.location = "../../views/main/index.php";
    
}else{
    alert("Por favor, ingresa tu nombre de usuario y contraseña.")
    return false;
    
   
}
}

function verpassword() {
    var passwordInput = document.getElementById("password");
    if (passwordInput.type === "password") {
        passwordInput.type = "text";
    } else {
        passwordInput.type = "password";
    }
}