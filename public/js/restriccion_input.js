function restrictInput(event) {
  var input = event.target;
  var maxLength = input.getAttribute('maxlength');
  var regex = /^[a-zA-ZáéíóúÁÉÍÓÚ\s.,-]+$/;


  if (input.value.length >= maxLength) {
    input.value = input.value.slice(0, maxLength);

    Swal.fire(' ha alcanzado el límite de caracteres')
  }

  if (
    event.keyCode === 8 || event.keyCode === 46 || event.keyCode === 32
  ) {
    return;
  }


  if (!regex.test(input.value)) {
    input.value = input.value.replace(/[^a-zA-Z\s]+/g, '');
    Swal.fire('No se permiten numeros')
  }
}

function restricForm(event) {
  var input = event.target;
  var maxLength = input.getAttribute('maxlength');
  var regex = /^[a-zA-Z\s]+$/;

  if (input.value.length >= maxLength) {
    input.value = input.value.slice(0, maxLength);
    Swal.fire('Se ha alcanzado el límite de caracteres');
  }

  if (
    event.keyCode === 8 || event.keyCode === 46 || event.keyCode === 32
  ) {
    return;
  }

  if (!regex.test(input.value)) {
    input.value = input.value.replace(/[^a-zA-Z\s]+/g, '');
    Swal.fire('Solo se permiten letras');
  }
}

function restrictNumberInput(event) {
  var input = event.target;
  var maxLength = 10;
  var regex = /^[0-9]+$/;

  if (input.value.length > maxLength) {
    input.value = input.value.slice(0, maxLength);
    Swal.fire('Se ha alcanzado el límite de caracteres');
  }
  
  if (
    event.keyCode === 8 || event.keyCode === 46 || event.keyCode === 32
  ) {
    return;
  }

  if (!regex.test(input.value)) {
    input.value = input.value.replace(/[^0-9]+/g, '');
    Swal.fire('Solo se permiten números');
  }
}

function restrictAddres(event) {
  var input = event.target;
  var maxLength = 140;
  var regex = /^[a-zA-Z0-9#áéíóúÁÉÍÓÚ\s-]+$/;

  if (input.value.length > maxLength) {
    input.value = input.value.slice(0, maxLength);
    Swal.fire('Se ha alcanzado el límite de caracteres');
  }

  if (
    event.keyCode === 8 || event.keyCode === 46 || event.keyCode === 32
  ) {
    return;
  }

  if (!regex.test(input.value)) {
    input.value = input.value.replace(/[^a-zA-Z0-9#áéíóúÁÉÍÓÚ\s-]+/g, '');
    Swal.fire('Solo se permiten números, letras, hashtag (#), guiones y letras con tilde');
  }
}

function myFunction() {

  let value = document.getElementById('numero_documento').value;

  // GET request for remote image in node.js
  axios({
    method: 'get',
    url: '../../controller/clienteController.php?c=5&param=' + value,
  })
    .then(function (response) {
      // window.location.reload()
    })
    .catch(function (error) {
      console.log(error);
    });
}

 