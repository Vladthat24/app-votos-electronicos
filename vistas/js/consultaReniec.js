/*=============================================
 CONSULTAR BASE DE DATOS RENIEC 
 =============================================*/
$(function () {
    $('#consultar').on('click', function () {
        var dni = $('#dni').val();
        var url = 'ajax/consultaReniec.ajax.php';
        $.ajax({
            type: 'POST',
            url: url,
            data: 'dni=' + dni,
            success: function (datos_dni) {
                var datos = eval(datos_dni);

//               $('#nuevoNombre').text(datos[3]+" "+datos[1]+" "+datos[2]);
                $('#nuevoNombre').val(datos[1]+" "+datos[2]+" "+datos[3]);
                console.log("respuesta",datos[1]+" "+datos[2]+" "+datos[3])

            }
        });
        return false;
    });
});


