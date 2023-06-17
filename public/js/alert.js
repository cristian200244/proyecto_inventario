function AlertDelete(id_persona) {
    Swal.fire({
        title: 'Desea eleiminar este registro?',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, eliminar!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "../../Controller/clienteController.php?c=4&id_persona=" + id_persona,
                success: function(r) {
                    document.location.reload();
                }
                
            });
        }
        return false;
    });
   
}