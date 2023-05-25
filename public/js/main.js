alert("hola")

function login() {
    var user, password

    user = document.getElementById("correo").value;
    password = document.getElementById("password").value;

    if (user == "admin@gmail.com" && password == "123456") {
         

         window.location="views/main/index.php"
    } else {
        alert("Datos incorrecto")
        console(user)
    }
}




function togglePasswordVisibility() {
    var passwordInput = document.getElementById("password");
    if (passwordInput.type === "password") {
        passwordInput.type = "text";
    } else {
        passwordInput.type = "password";
    }
}
