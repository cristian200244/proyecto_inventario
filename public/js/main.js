function login() {
    var user, password

    user = document.getElementById("usuario").value;
    password = document.getElementById("contraseña").value;

    if (user == "admin@gmail.com" && password == "123456") {
         
         window.location="views/main/index.php"
    } else {
        alert("Datos incorrecto")
        console(user)
    }
}