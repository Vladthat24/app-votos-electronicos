/*=============================================
 EDITAR LISTADO
 =============================================*/
$(".tablas").on("click", ".btnEditarLista", function () {

    var idLista = $(this).attr("idLista");

    var datos = new FormData();
    datos.append("idLista", idLista);

    $.ajax({
        url: "ajax/lista.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {

            $("#editarNombre").val(respuesta["nombre"]);
            $("#editarDescripcion").val(respuesta["descripcion"]);
            $("#editarId").val(respuesta["id"]);

        }

    })


})

/*=============================================
 ELIMINAR LISTADO
 =============================================*/
$(".tablas").on("click", ".btnEliminarLista", function () {

    var idLista = $(this).attr("idLista");

    swal({
        title: '¿Está seguro de borrar la Lista?',
        text: "¡Si no lo está puede cancelar la acción!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar Estado!'
    }).then(function (result) {

        if (result.value) {

            window.location = "index.php?ruta=lista&idLista=" + idLista;

        }

    })

})