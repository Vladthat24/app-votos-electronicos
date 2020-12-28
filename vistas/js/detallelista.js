$(document).ready(function() {

    $("#nuevTrabajadorSearch").select2();
    $("#nuevListaSearch").select2();
    $("#nuevCargoSearch").select2();

    $("#editarTrabajadorSearch").select2();
    $("#editarListaSearch").select2();
    $("#editarCargoSearch").select2();




})


/*=============================================
 EDITAR LISTADO
 =============================================*/
$(".tablas").on("click", ".btnEditarDetalleLista", function() {

    var idDetalleLista = $(this).attr("idDetalleLista");
    var datos = new FormData();
    datos.append("idDetalleLista", idDetalleLista);

    $.ajax({
        url: "ajax/detallelista.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {

            $("#editarId").val(respuesta["id"]);

            var idUsuario = new FormData();
            idUsuario.append("idUsuario", respuesta["idempleado"]);

            $.ajax({
                url: "ajax/usuarios.ajax.php",
                method: "POST",
                data: idUsuario,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "json",
                success: function(respuestaTrabajador) {

                    $("#select2-editarTrabajadorSearch-container").html(respuestaTrabajador["datos_completos"]);
                    $("#editarTrabajador").val(respuestaTrabajador["id"]);

                }
            })

            var idLista = new FormData();
            idLista.append("idLista", respuesta["idlista"]);

            $.ajax({
                url: "ajax/lista.ajax.php",
                method: "POST",
                data: idLista,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "json",
                success: function(respuestaTrabajador) {

                    $("#select2-editarListaSearch-container").html(respuestaTrabajador["nombre"]);
                    $("#editarLista").val(respuestaTrabajador["id"]);

                }
            })


            var idCargo = new FormData();
            idCargo.append("idCargo", respuesta["idcargo"]);


            $.ajax({
                url: "ajax/cargo.ajax.php",
                method: "POST",
                data: idCargo,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "json",
                success: function(respuestaTrabajador) {

                    $("#select2-editarCargoSearch-container").html(respuestaTrabajador["nombre"]);
                    $("#editarCargo").val(respuestaTrabajador["id"]);

                }
            })

        }

    })


})

/*=============================================
 ELIMINAR LISTADO
 =============================================*/
$(".tablas").on("click", ".btnEliminarDetalleLista", function() {

    var idDetalleLista = $(this).attr("idDetalleLista");

    swal({
        title: '¿Está seguro de borrar la Lista?',
        text: "¡Si no lo está puede cancelar la acción!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar Estado!'
    }).then(function(result) {

        if (result.value) {

            window.location = "index.php?ruta=listadetalle&idDetalleLista=" + idDetalleLista;

        }

    })

})