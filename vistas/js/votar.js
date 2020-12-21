/*=============================================
 VOTAR
 =============================================*/
$(".btnVotar").on("click", function() {


    var codigoVotar = codigoUnicoVotar(10);
    var idLista = $(this).attr("idLista");
    var idUser = $(this).attr("idUser");

    swal({
        title: '¿Está seguro?',
        text: "¡Si no lo está puede cancelar la acción!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: '!Si, Todo Conforme!'
    }).then(function(result) {

        if (result.value) {

            window.location = "index.php?ruta=votar&codigo=" + codigoVotar + "&idLista=" + idLista + "&idUser=" + idUser;

        }

    })

})

/*=============================================
CODIGO DE VOTAR
 =============================================*/

function codigoUnicoVotar(length) {
    var result = '';
    var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    var charactersLength = characters.length;
    for (var i = 0; i < length; i++) {
        result += characters.charAt(Math.floor(Math.random() * charactersLength));
    }
    return result;
}




/*=============================================
 CAPTURANDO LA CATEGORIA PARA ASIGNAR CÓDIGO - NUEVA
 =============================================*/
$("#nuevaCategoria").change(function() {

        var idCategoria = $(this).val();

        var datos = new FormData();
        datos.append("idCategoria", idCategoria);

        $.ajax({

            url: "ajax/ticket.ajax.php",
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function(respuesta) {

                if (!respuesta) {

                    var nuevoCodigo = idCategoria + "0001";
                    $("#nuevoCodigo").val(nuevoCodigo);

                } else {

                    var nuevoCodigo = Number(respuesta["codigo"]) + 1;
                    $("#nuevoCodigo").val(nuevoCodigo);

                }

            }

        })

    })
    /*=============================================
     CAPTURANDO LA CATEGORIA PARA ASIGNAR CÓDIGO - EDITAR
     =============================================*/
$("#editarCategoria").change(function() {

    var idCategoria = $(this).val();

    var datos = new FormData();
    datos.append("idCategoria", idCategoria);

    $.ajax({

        url: "ajax/ticket.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {

            if (!respuesta) {

                var nuevoCodigo = idCategoria + "0001";
                $("#editarCodigo").val(nuevoCodigo);

            } else {

                var nuevoCodigo = Number(respuesta["codigo"]) + 1;
                $("#editarCodigo").val(nuevoCodigo);

            }

        }

    })

})


/*=============================================
 SUBIENDO LA FOTO DEL TICKET
 =============================================*/

$(".nuevaImagen").change(function() {

        var imagen = this.files[0];

        /*=============================================
         VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
         =============================================*/

        if (imagen["type"] != "image/jpeg" && imagen["type"] != "image/png") {

            $(".nuevaImagen").val("");

            swal({
                title: "Error al subir la imagen",
                text: "¡La imagen debe estar en formato JPG o PNG!",
                type: "error",
                confirmButtonText: "¡Cerrar!"
            });

        } else if (imagen["size"] > 2000000) {

            $(".nuevaImagen").val("");

            swal({
                title: "Error al subir la imagen",
                text: "¡La imagen no debe pesar más de 2MB!",
                type: "error",
                confirmButtonText: "¡Cerrar!"
            });

        } else {

            var datosImagen = new FileReader;
            datosImagen.readAsDataURL(imagen);

            $(datosImagen).on("load", function(event) {

                var rutaImagen = event.target.result;

                $(".previsualizar").attr("src", rutaImagen);

            })

        }
    })
    /*================================
     //REMOVER EL ID DEL COMBO
     ===================================*/
$("#editarCatg").on("click", function() {

    $("#editarCategoria").remove();
})
$("#editarSop").on("click", function() {

    $("#editarSoporte").remove();
})
$("#editarEst").on("click", function() {

        $("#editarEstado").remove();
    })
    /*=============================================
     EDITAR TICKET   ACTIVO
     =============================================*/

$(".tablaTicket tbody").on("click", "button.btnEditarTicket", function() {

    var idTicket = $(this).attr("idTicket");

    var datos = new FormData();
    datos.append("idTicket", idTicket);

    $.ajax({

        url: "ajax/ticket.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {

            var datosCategoria = new FormData();
            datosCategoria.append("idCategoria", respuesta["id_categoria"]);

            //            var datosSoporte = new FormData();
            //            datosSoporte.append("idSoporte", respuesta["id_soporte"]);

            var datosEstado = new FormData();
            datosEstado.append("idEstado", respuesta["id_estado"]);
            //METODO AJAX PARA TRAER EL NOMBRE A LA VENTANA EDITAR 
            $.ajax({

                    url: "ajax/categorias.ajax.php",
                    method: "POST",
                    data: datosCategoria,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: "json",
                    success: function(respuesta) {

                        $("#editarCategoria").val(respuesta["id"]);
                        $("#editarCategoria").html(respuesta["categoria"]);

                    }

                })
                //METODO AJAX PARA TRAER EL NOMBRE A LA VENTANA EDITAR 
                //            $.ajax({
                //
                //                url: "ajax/soporte.ajax.php",
                //                method: "POST",
                //                data: datosSoporte,
                //                cache: false,
                //                contentType: false,
                //                processData: false,
                //                dataType: "json",
                //                success: function (respuesta) {
                //
                //                    $("#editarSoporte").val(respuesta["id"]);
                //                    $("#editarSoporte").html(respuesta["soporte"]);
                //
                //                }
                //
                //            })
                //            
            $.ajax({

                    url: "ajax/estado.ajax.php",
                    method: "POST",
                    data: datosEstado,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: "json",
                    success: function(respuesta) {

                        $("#editarEstado").val(respuesta["id"]);
                        $("#editarEstado").html(respuesta["estado"]);

                    }

                })
                //CAPTURAR ID DEL MODAL EDITAR PARA MODIFICARLOS

            $("#editarCodigo").val(respuesta["codigo"]);

            $("#editarDescripcion").val(respuesta["descripcion"]);

            $("#editarObservacion").val(respuesta["observacion"]);

            $("#editarNombre").val(respuesta["nombre"]);

            $("#editarOficina").val(respuesta["oficina"]);

            $("#editarArea").val(respuesta["area"]);

            $("#editarCargo").val(respuesta["cargo"]);

            $("#editarCel").val(respuesta["cel"]);

            $("#editarSede").val(respuesta["sede"]);

            $("#editarPiso").val(respuesta["piso"]);

            $("#editarSoporte").val(respuesta["soporte"]);
            $("#editarSoporte").html(respuesta["soporte"]);



            if (respuesta["imagen"] != "") {

                $("#imagenActual").val(respuesta["imagen"]);

                $(".previsualizar").attr("src", respuesta["imagen"]);

            }

        }

    })

})


/*=============================================
 ELIMINAR TICKET
 =============================================*/

$(".tablaTicket tbody").on("click", "button.btnEliminarTicket", function() {

    var idTicket = $(this).attr("idTicket");
    var codigo = $(this).attr("codigo");
    var imagen = $(this).attr("imagen");

    swal({

        title: '¿Está seguro de borrar el ticket?',
        text: "¡Si no lo está puede cancelar la accíón!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar ticket!'
    }).then(function(result) {
        if (result.value) {

            window.location = "index.php?ruta=ticket&idTicket=" + idTicket + "&imagen=" + imagen + "&codigo=" + codigo;

        }


    })

})

/*=============================================
 IMPRIMIR TICKET
 =============================================*/
$(".tablaTicket").on("click", ".btnImprimirTicket", function() {

    var idTicket = $(this).attr("idTicket");

    window.open("extensiones/tcpdf/pdf/printTicket.php?idTicket=" + idTicket, "_blank");
})


/*===================================================================================================
*****************************************************************************************************
FUNCIONES EN JAVA SCRIPT PARA LA TABLA TERMINADOS 
*****************************************************************************************************
 ====================================================================================================*/

/*=============================================
 CARGAR LA TABLA DINÁMICA DE TICKETS TERMINADOS
 =============================================*/
function actualizarInactivo() {
    $('.tablaTicketInactivo').DataTable({

        "ajax": "ajax/datatable-ticket.ajaxInactivo.php",
        "deferRender": true,
        "retrieve": true,
        "processing": true,
        "language": {

            "sProcessing": "Procesando...",
            "sLengthMenu": "Mostrar _MENU_ registros",
            "sZeroRecords": "No se encontraron resultados",
            "sEmptyTable": "Ningún dato disponible en esta tabla",
            "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
            "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0",
            "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix": "",
            "sSearch": "Buscar:",
            "sUrl": "",
            "sInfoThousands": ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast": "Último",
                "sNext": "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }

        }


    })
}
/*=============================================
EDITAR TICKET TERMINADO
=============================================*/
$(".tablaTicketInactivo tbody").on("click", "button.btnEditarTicket", function() {

    var idTicket = $(this).attr("idTicket");

    var datos = new FormData();
    datos.append("idTicket", idTicket);

    $.ajax({

        url: "ajax/ticket.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {

            var datosCategoria = new FormData();
            datosCategoria.append("idCategoria", respuesta["id_categoria"]);

            //            var datosSoporte = new FormData();
            //            datosSoporte.append("idSoporte", respuesta["id_soporte"]);

            var datosEstado = new FormData();
            datosEstado.append("idEstado", respuesta["id_estado"]);
            //METODO AJAX PARA TRAER EL NOMBRE A LA VENTANA EDITAR 
            $.ajax({

                    url: "ajax/categorias.ajax.php",
                    method: "POST",
                    data: datosCategoria,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: "json",
                    success: function(respuesta) {

                        $("#editarCategoria").val(respuesta["id"]);
                        $("#editarCategoria").html(respuesta["categoria"]);

                    }

                })
                //METODO AJAX PARA TRAER EL NOMBRE A LA VENTANA EDITAR 
                //            $.ajax({
                //
                //                url: "ajax/soporte.ajax.php",
                //                method: "POST",
                //                data: datosSoporte,
                //                cache: false,
                //                contentType: false,
                //                processData: false,
                //                dataType: "json",
                //                success: function (respuesta) {
                //
                //                    $("#editarSoporte").val(respuesta["id"]);
                //                    $("#editarSoporte").html(respuesta["soporte"]);
                //
                //                }
                //
                //            })
                //            
            $.ajax({

                    url: "ajax/estado.ajax.php",
                    method: "POST",
                    data: datosEstado,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: "json",
                    success: function(respuesta) {

                        $("#editarEstado").val(respuesta["id"]);
                        $("#editarEstado").html(respuesta["estado"]);

                    }

                })
                //CAPTURAR ID DEL MODAL EDITAR PARA MODIFICARLOS

            $("#editarCodigo").val(respuesta["codigo"]);

            $("#editarDescripcion").val(respuesta["descripcion"]);

            $("#editarObservacion").val(respuesta["observacion"]);

            $("#editarNombre").val(respuesta["nombre"]);

            $("#editarOficina").val(respuesta["oficina"]);

            $("#editarArea").val(respuesta["area"]);

            $("#editarCargo").val(respuesta["cargo"]);

            $("#editarCel").val(respuesta["cel"]);

            $("#editarSede").val(respuesta["sede"]);

            $("#editarPiso").val(respuesta["piso"]);

            $("#editarSoporte").val(respuesta["soporte"]);
            $("#editarSoporte").html(respuesta["soporte"]);



            if (respuesta["imagen"] != "") {

                $("#imagenActual").val(respuesta["imagen"]);

                $(".previsualizar").attr("src", respuesta["imagen"]);

            }

        }

    })

})

/*=============================================
 IMPRIMIR TICKET TERMINADO
 =============================================*/
$(".tablaTicketInactivo").on("click", ".btnImprimirTicket", function() {

    var idTicket = $(this).attr("idTicket");

    window.open("extensiones/tcpdf/pdf/printTicket.php?idTicket=" + idTicket, "_blank");
})

/*=============================================
RANGO DE FECHAS
=============================================*/

$('#daterange-btn').daterangepicker({
        ranges: {
            'Hoy': [moment(), moment()],
            'Ayer': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Últimos 7 días': [moment().subtract(6, 'days'), moment()],
            'Últimos 30 días': [moment().subtract(29, 'days'), moment()],
            'Este mes': [moment().startOf('month'), moment().endOf('month')],
            'Último mes': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment(),
        endDate: moment()
    },
    function(start, end) {
        $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));

        var fechaInicial = start.format('YYYY-MM-DD');

        var fechaFinal = end.format('YYYY-MM-DD');

        var capturarRango = $("#daterange-btn span").html();

        localStorage.setItem("capturarRango", capturarRango);

        window.location = "index.php?ruta=reporteticket&fechaInicial=" + fechaInicial + "&fechaFinal=" + fechaFinal;

    }

)

/*=============================================
CANCELAR RANGO DE FECHAS
=============================================*/

$(".daterangepicker.opensleft .range_inputs .cancelBtn").on("click", function() {

    localStorage.removeItem("capturarRango");
    localStorage.clear();
    window.location = "reporteticket";
})

/*=============================================
CAPTURAR HOY
=============================================*/

$(".daterangepicker.opensleft .ranges li").on("click", function() {

    var textoHoy = $(this).attr("data-range-key");

    if (textoHoy == "Hoy") {

        var d = new Date();

        var dia = d.getDate();
        var mes = d.getMonth() + 1;
        var año = d.getFullYear();

        if (mes < 10) {

            var fechaInicial = año + "-0" + mes + "-" + dia;
            var fechaFinal = año + "-0" + mes + "-" + dia;

        } else if (dia < 10) {

            var fechaInicial = año + "-" + mes + "-0" + dia;
            var fechaFinal = año + "-" + mes + "-0" + dia;

        } else if (mes < 10 && dia < 10) {

            var fechaInicial = año + "-0" + mes + "-0" + dia;
            var fechaFinal = año + "-0" + mes + "-0" + dia;

        } else {

            var fechaInicial = año + "-" + mes + "-" + dia;
            var fechaFinal = año + "-" + mes + "-" + dia;

        }

        localStorage.setItem("capturarRango", "Hoy");

        window.location = "index.php?ruta=reporteticket&fechaInicial=" + fechaInicial + "&fechaFinal=" + fechaFinal;

    }

})