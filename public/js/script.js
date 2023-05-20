function update(id) {
    let elemento = document.getElementById(`nombre_${id}`);
    let nombre = elemento.textContent

    document.getElementById('nombre_actualizado').value = nombre
}
function recarga(id) {

    let elemento = document.getElementById("nombre_actualizado");
    let nombre = elemento.value

    axios.post(`../../controller/marcasController.php?c=3&id_marca=${id}&nombre=${nombre}`)
        .then(function (response) {
            window.location.reload()
        })
        .catch(function (error) {
            console.error(error);
        });
}