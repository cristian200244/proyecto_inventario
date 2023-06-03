function restrictInput(event) {
  var input = event.target;
  var maxLength = input.getAttribute('maxlength');
  var regex = /^[a-zA-Z\s]+$/;

  
  if (input.value.length >= maxLength) {
    input.value = input.value.slice(0, maxLength);
    
    Swal.fire(' Se ha alcanzado el límite de caracteres')
  }

   
  if (
    event.keyCode === 8 || event.keyCode === 46 ||  event.keyCode === 32 
  ) {
    return;
  }

   
  if (!regex.test(input.value)) {
    input.value = input.value.replace(/[^a-zA-Z\s]/g, '');
    Swal.fire('Solo se permiten letras y espacios')
  }
}
