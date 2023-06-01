function AlertDelete(id_persona) {
    Swal.fire({
        title: 'Está seguro de eliminar el registro?',
        text: "No podrás revertir ésto!",
        icon: 'question',
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