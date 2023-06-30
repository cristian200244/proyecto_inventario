correo = document.querySelector('#correo');
btn = document.querySelector('#btn1');


function onClickSend(){

    let formdata = new FormData();
    formdata.append('email', correo.value);

    correo.disabled = true;
    btn.disabled = true;


    fetch('http://localhost/proyecto_inventario/app/recuperar-password.php', { 
        method: 'post',
        body: formdata
    }).then(response => response.json())
    .then(json => {
        alert(json.mensage)
        correo.disabled = false;
        btn.disabled = false;
        correo.disabled = false;
    })
}