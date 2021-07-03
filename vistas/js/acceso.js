$(document).ready(function () {
    $("#searchColaboradorAcceso").select2();
})


/* fetch_data_Acceso('no');

function fetch_data_Acceso(is_date_searchAcceso, is_date_searchAcceso = '', end_dateAcceso = '') {

    var dataTable_acceso = $('#order_data_acceso').DataTable({
        "language": {
            "sProcessing": "Procesando...",
            "sLengthMenu": "Mostrar _MENU_ registros",
            "sZeroRecords": "No se encontraron resultados",
            "sEmptyTable": "Ningún dato disponible en esta tabla",
            "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
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
        },
        "processing": true,
        "serverSide": true,
        "ajax": {
            url: "ajax/datatable-ventas.ajax.php",
            type: "POST",
            data: {
                is_date_searchAcceso: is_date_searchAcceso, start_dateAcceso: start_dateAcceso, end_dateAcceso: end_dateAcceso
            }
        }

    });
}


$('#searchAcceso').click(function () {

    var start_dateAcceso = $('#start_dateAcceso').val();
    var end_dateAcceso = $('#end_dateAcceso').val();

    console.log("Fecha del Jquery: ", start_dateAcceso, end_dateAcceso);

    if (start_dateAcceso != '' && end_dateAcceso != '') {

        $('#order_data_acceso').DataTable().destroy();
        fetch_data('yes', start_dateAcceso, end_dateAcceso);
        console.log("Se envio con fechas");
    }
    else {
        swal({
            type: "error",
            title: "¡Ingresa las fechas!",
            showConfirmButton: true,
            confirmButtonText: "Cerrar"
        }).then((result) => {
            if (result.value) {

                window.location = "acceso";

            }
        })
    }
}); */




/* function fechaDateRange() {
    $('.input-daterange').datepicker({
        todayBtn: 'linked',
        format: "yyyy-mm-dd",
        autoclose: true
    });
} */

/*=============================================
SUBIENDO LA FOTO DEL USUARIO
=============================================*/
$(".nuevaFoto").change(function () {

    var imagen = this.files[0];

    /*=============================================
        VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
        =============================================*/

    if (imagen["type"] != "image/jpeg" && imagen["type"] != "image/png") {

        $(".nuevaFoto").val("");

        swal({
            title: "Error al subir la imagen",
            text: "¡La imagen debe estar en formato JPG o PNG!",
            type: "error",
            confirmButtonText: "¡Cerrar!"
        });

    } else if (imagen["size"] > 2000000) {

        $(".nuevaFoto").val("");

        swal({
            title: "Error al subir la imagen",
            text: "¡La imagen no debe pesar más de 2MB!",
            type: "error",
            confirmButtonText: "¡Cerrar!"
        });

    } else {

        var datosImagen = new FileReader;
        datosImagen.readAsDataURL(imagen);

        $(datosImagen).on("load", function (event) {

            var rutaImagen = event.target.result;

            $(".previsualizar").attr("src", rutaImagen);

        })

    }
})

/*=============================================
 EDITAR USUARIO
 =============================================*/
$("#order_data_acceso").on("click", ".btnEditarAcceso", function () {

    var idAcceso = $(this).attr("idAcceso");

    console.log("Acceso: ", idAcceso);


    var datos = new FormData();
    datos.append("idAcceso", idAcceso);

    $.ajax({

        url: "ajax/acceso.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {

            console.log(respuesta);


            $("#editarId").val(respuesta["id"]);
            $("#editarDatosCompletos").val(respuesta["datos_completos"]);
            $("#editarUsuario").val(respuesta["usuario"]);
            $("#editarPerfil").val(respuesta["idroles"]);
            $("#editarPerfil").html(respuesta["roles"]);

            $("#passwordActual").val(respuesta["password"]);

        }

    });

})

/*=============================================
 ACTIVAR USUARIO
 =============================================*/
$("").on("click", ".btnActivar", function () {



    var idUsuario = $(this).attr("idUsuario");
    var estadoUsuario = $(this).attr("estadoUsuario");

    console.log(idUsuario, estadoUsuario);

    var datos = new FormData();
    datos.append("activarId", idUsuario);
    datos.append("activarUsuario", estadoUsuario);

    $.ajax({

        url: "ajax/usuarios.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function (respuesta) {

            if (window.matchMedia("(max-width:767px)").matches) {

                swal({
                    title: "El usuario ha sido actualizado",
                    type: "success",
                    confirmButtonText: "¡Cerrar!"
                }).then(function (result) {
                    if (result.value) {

                        window.location = "usuarios";

                    }


                });

            }

        }

    })

    if (estadoUsuario == 0) {

        $(this).removeClass('btn-success');
        $(this).addClass('btn-danger');
        $(this).html('Desactivado');
        $(this).attr('estadoUsuario', 1);

    } else {

        $(this).addClass('btn-success');
        $(this).removeClass('btn-danger');
        $(this).html('Activado');
        $(this).attr('estadoUsuario', 0);

    }

})

/*=============================================
 REVISAR SI EL USUARIO YA ESTÁ REGISTRADO
 =============================================*/

$("#nuevoUsuario").change(function () {

    $(".alert").remove();

    var usuario = $(this).val();

    var datos = new FormData();
    datos.append("validarUsuario", usuario);

    $.ajax({
        url: "ajax/usuarios.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {

            if (respuesta) {

                $("#nuevoUsuario").parent().after('<div class="alert alert-warning">Este usuario ya existe en la base de datos</div>');

                $("#nuevoUsuario").val("");

            }

        }

    })
})

/*=============================================
 REVISAR SI EL DNI DEL USUARIO YA ESTÁ REGISTRADO
 =============================================*/
$("#dni").change(function () {
    //$('#consultar').on('click', function () {
    $(".alert").remove();

    var dni = $('#dni').val();
    var datos = new FormData();
    datos.append("validarDni", dni);

    $.ajax({
        url: "ajax/usuarios.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {

            if (respuesta) {

                $("#dni").parent().after('<div class="alert alert-warning">Este usuario ya existe en la base de datos</div>');

                $("#dni").val("");
                $("#nuevoNombre").html("");

            }

        }

    })
});

/*=============================================
 ELIMINAR USUARIO
 =============================================*/
$("#order_data_acceso").on("click", ".btnEliminarAcceso", function () {

    var idAcceso = $(this).attr("idAcceso");

    swal({
        title: '¿Está seguro de borrar el usuario?',
        text: "¡Si no lo está puede cancelar la accíón!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar Acceso!'
    }).then(function (result) {

        if (result.value) {

            window.location = "index.php?ruta=acceso&idAcceso=" + idAcceso;

        }

    })

})
/*=============================================
 VALIDAR SOLO NUMERO EN DNI
 =============================================*/
$(function () {
    $(".dni").keydown(function (event) {
        //alert(event.keyCode);
        if ((event.keyCode < 48 || event.keyCode > 57) && (event.keyCode < 96 || event.keyCode > 105) && event.keyCode !== 190 && event.keyCode !== 110 && event.keyCode !== 8 && event.keyCode !== 9) {
            return false;
        }
    });
});


/*=============================================
 VALIDAR SOLO NUMERO EN DNI
 =============================================*/
$(function () {
    $(".validarUsuario").keydown(function (event) {
        //alert(event.keyCode);
        if ((event.keyCode < 48 || event.keyCode > 57) && (event.keyCode < 96 || event.keyCode > 105) && event.keyCode !== 190 && event.keyCode !== 110 && event.keyCode !== 8 && event.keyCode !== 9) {
            return false;
        }
    });
});


/*=============================================
 VALIDAR SOLO NUMERO EN CEL 
 =============================================*/
//SOLO NUMEROS
$(function () {
    $(".celular").keydown(function (event) {
        //alert(event.keyCode);
        if ((event.keyCode < 48 || event.keyCode > 57) && (event.keyCode < 96 || event.keyCode > 105) && event.keyCode !== 190 && event.keyCode !== 110 && event.keyCode !== 8 && event.keyCode !== 9) {
            return false;
        }
    });
});