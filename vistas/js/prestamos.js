
/*=============================================
EDITAR CATEGORIA
=============================================*/

$(".btnEditarAnticipo").click(function(){


    var idAnticipo = $(this).attr("idAnticipo");

    var datos = new FormData();
    datos.append("idAnticipo", idAnticipo);

    $.ajax({

        url: "ajax/anticipos.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta){

            $("#idAnticipo").val(respuesta["idAnticipo"]);            
            $("#editarMonto").val(respuesta["monto"]);
            $("#editarMotivo").val(respuesta["motivo"]);
           
        }



    })

})

/*=============================================
ELIMINAR ANTICIPO
=============================================*/

$(".btnEliminarprestamo").click(function(){
    var idprestamo = $(this).attr("idprestamo");
    console.log("ID de prestamo a eliminar: " + idprestamo); // Agrega esta línea
    // Resto del código de eliminación



    swal({

        title: '¿Está seguro de borrar esta solicitud?',
        text: "¡Si no lo está puede cancelar la acción!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar solicitud!',

    }).then((result)=>{

        if(result.value){

            window.location = "index.php?ruta=prestamos&idprestamo="+idprestamo;
        }

    }) 

})

/*=============================================
 Función para cancelar la carga de documentos y redirigir a la página de prestamos
=============================================*/

    document.getElementById('cancelarCargaA').addEventListener('click', function() {
        // Eliminar la variable de localStorage
        localStorage.removeItem('idEmpleado');

        // Redirigir a la página de empleados
        window.location.href = 'inicio'; // Reemplaza 'empleados' con la URL correcta
    });


    
// Cuando se haga clic en el botón de "Aprobar Préstamo"
$(".btnAprobarPrestamo").click(function() {
    var idPrestamo = $(this).data("id");
    
    $.ajax({
        url: "controladores/prestamos.controlador.php",
        method: "POST",
        data: { accion: "aprobarPrestamo", idPrestamo: idPrestamo },
        dataType: "json",
        success: function(response) {
            if (response === "ok") {
                // Aprobación exitosa
                // Realiza acciones adicionales si es necesario
                // Actualiza o redirige a la vista de préstamos pendientes
                location.reload(); // Actualizar la página
            } else {
                // Manejar una respuesta de error si es necesario
                console.log("Error al aprobar el préstamo");
            }
        },
        error: function(xhr, status, error) {
            console.log("Error en la solicitud AJAX: " + error);
        }
    });
});

// Lo mismo para el botón "Rechazar Préstamo"
$(".btnRechazarPrestamo").click(function() {
    var idPrestamo = $(this).data("id");
    
    $.ajax({
        url: "controladores/prestamos.controlador.php",
        method: "POST",
        data: { accion: "rechazarPrestamo", idPrestamo: idPrestamo },
        dataType: "json",
        success: function(response) {
            if (response === "ok") {
                // Rechazo exitoso
                // Realiza acciones adicionales si es necesario
                // Actualiza o redirige a la vista de préstamos pendientes
                location.reload(); // Actualizar la página
            } else {
                // Manejar una respuesta de error si es necesario
                console.log("Error al rechazar el préstamo");
            }
        },
        error: function(xhr, status, error) {
            console.log("Error en la solicitud AJAX: " + error);
        }
    });
});
