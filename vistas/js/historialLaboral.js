// Función para capturar el idEmpleado y redirigir a cargarDocumentos
$(".btnHistorialSalarial").click(function () {
    var idEmpleado = $(this).attr("idEmpleado");

    // Almacena el idEmpleado en localStorage
    localStorage.setItem('idEmpleado', idEmpleado);

    // Establecer una cookie con el idEmpleado
    document.cookie = "idEmpleado=" + idEmpleado;

    // Redirige a la página cargarDocumentos
    window.location = "index.php?ruta=historialLaboral&idEmpleado=" + idEmpleado;
});

// Recuperar idEmpleado desde localStorage
var idEmpleado = localStorage.getItem('idEmpleado');

// Verificar si se recuperó correctamente
if (idEmpleado !== null) {
    // Asignar el valor a un input oculto con el id "idEmpleado"
    $("#idEmpleado").val(idEmpleado);

    // Hacer lo que necesites con idEmpleado, por ejemplo, mostrarlo en la consola
    console.log('idEmpleado recuperado:', idEmpleado);

    // Ahora puedes usar idEmpleado en tu tabla, por ejemplo, en una consulta AJAX
    // para cargar los registros relacionados con ese empleado.
    // Aquí puedes agregar la lógica para cargar los documentos relacionados.
} else {
    // Si no se recuperó correctamente, puedes redirigir a una página de error o realizar otra acción.
    console.log('Error al recuperar idEmpleado');
}



/*=============================================
 Función para cancelar la carga de documentos y redirigir a la página de empleados
=============================================*/

    document.getElementById('cancelarCargaH').addEventListener('click', function() {
        // Eliminar la variable de localStorage
        localStorage.removeItem('idEmpleado');

        // Redirigir a la página de empleados
        window.location.href = 'empleados'; // Reemplaza 'empleados' con la URL correcta
    });


/*=============================================
ELIMINAR DOCUMENTO
=============================================*/
$(document).on("click", ".btnEliminarHistorial", function(){


    var idHistorial = $(this).attr("idHistorial");


    swal({

        title: '¿Está seguro de borrar el historial?',
        text: "¡Si no lo está puede cancelar la acción!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar información!',

    }).then((result)=>{

        if(result.value){

            window.location = "index.php?ruta=historialLaboral&idHistorial="+idHistorial;
        }

    }) 

})