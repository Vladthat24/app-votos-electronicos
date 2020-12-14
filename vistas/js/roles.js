/*=============================================
EDITAR ROLES
=============================================*/
$(".tablas").on("click", ".btnEditarRoles", function () {

	var idRoles = $(this).attr("idRoles");

	var datos = new FormData();
	datos.append("idRoles", idRoles);

	$.ajax({
		url: "ajax/roles.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function (respuesta) {

			$("#editarRoles").val(respuesta["nombre"]);
			$("#idRoles").val(respuesta["id"]);

		}

	})


})

/*=============================================
ELIMINAR ROLES
=============================================*/
$(".tablas").on("click", ".btnEliminarRoles", function () {

	var idRoles = $(this).attr("idRoles");

	swal({
		title: '¿Está seguro de borrar el Rol?',
		text: "¡Si no lo está puede cancelar la acción!",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		cancelButtonText: 'Cancelar',
		confirmButtonText: '¡Si, borrar rol!'
	}).then(function (result) {

		if (result.value) {

			window.location = "index.php?ruta=roles&idRoles=" + idRoles;

		}

	})

})