/*=============================================
EDITAR CATEGORIA
=============================================*/

$(".btnEditarCategoria").click(function(){


	var idCategoria = $(this).attr("idCategoria");

	var datos = new FormData();
	datos.append("idCategoria", idCategoria);

	$.ajax({

		url: "ajax/categorias.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){


			$("#editarCategoria").val(respuesta["categoria"]);
			$("#idCategoria").val(respuesta["id"]);
			
		}



	})

})

/*=============================================
ELIMINAR CATEGORIA
=============================================*/

$(".btnEliminarCategoria").click(function(){

	var idCategoria = $(this).attr("idCategoria");


	swal({

		title: '¿Está seguro de borrar la categoría?',
		text: "¡Si no lo está puede cancelar la acción!",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		cancelButtonText: 'Cancelar',
		confirmButtonText: 'Si, borrar categoría!',

	}).then((result)=>{

		if(result.value){

			window.location = "index.php?ruta=categorias&idCategoria="+idCategoria;
		}

	}) 

})

/*=============================================
    REVISAR USUARIOS YA REGISTRADOS
=============================================*/
$("#nuevaCategoria").change(function(){

    $(".alert").remove();

    var categoria = $(this).val();

    var datos = new FormData();
    datos.append("validarCateogria", categoria);

    $.ajax({
        url:"ajax/categorias.ajax.php",
        method:"POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success:function(respuesta){

         if(respuesta){

            $("#nuevaCategoria").parent().after('<div class="alert alert-warning">Esta categoria ya existe en la base de datos</div>');

            $("#nuevaCategoria").val("");

         }

        }


    });

})


/*=============================================
 Función para cancelar la carga de documentos y redirigir a la página de anticipos
=============================================*/

    document.getElementById('cancelarP').addEventListener('click', function() {
        // Eliminar la variable de localStorage
        localStorage.removeItem('idEmpleado');

        // Redirigir a la página de empleados
        window.location.href = 'solicitudesAceptadas'; // Reemplaza 'empleados' con la URL correcta
    });