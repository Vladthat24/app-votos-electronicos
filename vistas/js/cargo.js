/*=============================================
EDITAR DOCUMENTO
=============================================*/
$(".tablas").on("click", ".btnEditarCargo", function() {

    var idCargo = $(this).attr("idCargo");

    var datos = new FormData();
    datos.append("idCargo", idCargo);

    $.ajax({
        url: "ajax/cargo.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {

            $("#editarCargo").val(respuesta["nombre"]);
            $("#idCargo").val(respuesta["id"]);

        }

    })


})

/*=============================================
ELIMINAR DOCUMENTO
=============================================*/
$(".tablas").on("click", ".btnEliminarCargo", function() {

    var idCargo = $(this).attr("idCargo");

    swal({
        title: '¿Está seguro de borrar el Cargo?',
        text: "¡Si no lo está puede cancelar la acción!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: '¡Si, borrar cargo!'
    }).then(function(result) {

        if (result.value) {

            window.location = "index.php?ruta=cargo&idCargo=" + idCargo;

        }

    })

})