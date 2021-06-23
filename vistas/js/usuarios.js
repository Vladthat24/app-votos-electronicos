$(document).ready(function () {

    fechaDateRange();
    CargarUsuario();

})

function CargarUsuario() {
    
    fetch_data('no');

    function fetch_data(is_date_search, start_date = '', end_date = '') {

        var dataTable = $('#order_data').DataTable({
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
                url: "ajax/datatable-usuarios.ajax.php",
                type: "POST",
                data: {
                    is_date_search: is_date_search, start_date: start_date, end_date: end_date
                }
            }

        });
    }

    $('#search').click(function () {

        var start_date = $('#start_date').val();
        var end_date = $('#end_date').val();

        if (start_date != '' && end_date != '') {
            $('#order_data').DataTable().destroy();
            fetch_data('yes', start_date, end_date);
        }
        else {
            swal({
                type: "error",
                title: "¡Ingresa las fechas!",
                showConfirmButton: true,
                confirmButtonText: "Cerrar"
            }).then((result) => {
                if (result.value) {

                    window.location = "registro";

                }
            })
        }
    });
}

function fechaDateRange() {
    $('.input-daterange').datepicker({
        todayBtn: 'linked',
        format: "dd-mm-yyyy",
        autoclose: true
    });
}



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

$("#order_data").on("click", ".btnCodigoVoto", function () {
    var idUsuarioVoto = $(this).attr("idUsuarioCodigo");


    var datos = new FormData();
    datos.append("idUsuario", idUsuarioVoto);

    $.ajax({
        url: "ajax/usuarios.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {
            console.log(respuesta);

            swal({
                title: 'Tú codigo de sufragio es: <br><strong style="color:blue;">"' + respuesta["codigovoto"] + '"</strong>',
                showClass: {
                    popup: 'animate__animated animate__fadeInDown'
                },
                hideClass: {
                    popup: 'animate__animated animate__fadeOutUp'
                }
            })

        }
    })



})
/*=============================================
 EDITAR USUARIO
 =============================================*/
$("#order_data").on("click", ".btnEditarUsuario", function () {

    var idUsuario = $(this).attr("idUsuario");

    console.log("Usuario: ", idUsuario);


    var datos = new FormData();
    datos.append("idUsuario", idUsuario);

    $.ajax({

        url: "ajax/usuarios.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {

            console.log(respuesta);


            $("#editarId").val(respuesta["id"]);
            $("#editarDni").val(respuesta["dni"]);
            $("#editarDatosCompletos").val(respuesta["datos_completos"]);
            $("#editarOficina").val(respuesta["oficina"]);
            $("#editarCargo").val(respuesta["cargo"]);
            $("#fotoActual").val(respuesta["foto"]);

            if (respuesta["foto"] != "") {

                $(".previsualizar").attr("src", respuesta["foto"]);

            }

        }

    });

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
$("#order_data").on("click", ".btnEliminarUsuario", function () {

    var idUsuario = $(this).attr("idUsuario");
    var fotoUsuario = $(this).attr("fotoUsuario");
    var usuario = $(this).attr("usuario");

    swal({
        title: '¿Está seguro de borrar el usuario?',
        text: "¡Si no lo está puede cancelar la accíón!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar usuario!'
    }).then(function (result) {

        if (result.value) {

            window.location = "index.php?ruta=usuarios&idUsuario=" + idUsuario + "&usuario=" + usuario + "&fotoUsuario=" + fotoUsuario;

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

/*=============================================
 VALIDAR SOLO LETRAS 
 =============================================*/
$(function () {
    $(".nuevDatosCompletos").keypress(function (event) {
        if ((event.charCode < 97 || event.charCode > 122) && (event.charCode < 65 || event.charCode > 90) && (event.charCode != 45))
            return false;
    })
})