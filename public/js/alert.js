function AlertDelete(id_persona) {
    Swal.fire({
        title: 'Desea eliminar este registro?',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, eliminar!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "../../Controller/clienteController.php?c=4&id_persona=" + id_persona,
                success: function (r) {
                    document.location.reload();
                }

            });
        }
        return false;
    });

}
function AlertDeleteMarcas(marca) {
    Swal.fire({
        title: 'Desea eliminar este registro?' ,
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, eliminar!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "../../Controller/marcasController.php?c=4&id_marca=" + marca,
                success: function (r) {
                    document.location.reload();
                }

            });
        }
        return false;
    });
}
function AlertDeleteDispositivos(dispositivos) {
    Swal.fire({
        title: 'Desea eliminar este registro?' ,
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, eliminar!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "../../Controller/TipoDispositivosController.php?c=4&id_tipo_dispositivo=" + dispositivos,
                success: function (r) {
                    document.location.reload();
                }

            });
        }
        return false;
    });
}
 

function AlertDeleteEstadoProducto(estado_producto) {
    Swal.fire({
        title: 'Desea eliminar este registro?' ,
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, eliminar!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "../../Controller/estadoProductoController.php?c=4&id_estado_producto=" + estado_producto,
                success: function (r) {
                    document.location.reload();
                }

            });
        }
        return false;
    });
}
function AlertDeleteTipoDocumento(documentos) {
    Swal.fire({
        title: 'Desea eliminar este registro?' ,
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, eliminar!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "../../Controller/documentoController.php?c=4&id_tipo_documento=" + documentos,
                success: function (r) {
                    document.location.reload();
                }

            });
        }
        return false;
    });
}
function AlertDeleteServicios(servicios) {
    Swal.fire({
        title: 'Desea eliminar este registro?' ,
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, eliminar!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "../../Controller/tipoServicioController.php?c=4&id_tipo_servicio=" + servicios,
                success: function (r) {
                    document.location.reload();
                }

            });
        }
        return false;
    });
}
function AlertDeleteCiudad(ciudades) {
    Swal.fire({
        title: 'Desea eliminar este registro?' ,
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, eliminar!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "../../Controller/ciudadController.php?c=4&id_ciudad=" + ciudades,
                success: function (r) {
                    document.location.reload();
                }

            });
        }
        return false;
    });
}
function AlertDeleteSexo(sexos) {
    Swal.fire({
        title: 'Desea eliminar este registro?' ,
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, eliminar!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "../../Controller/sexoControlller.php?c=4&id_sexo=" + sexos,
                success: function (r) {
                    document.location.reload();
                }

            });
        }
        return false;
    });
}