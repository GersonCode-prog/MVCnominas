
/*=============================================
Función para capturar el idEmpleado y redirigir a cargarDocumentos
=============================================*/
$(".btnDocumentos").click(function () {
    var idEmpleado = $(this).attr("idEmpleado");

    // Almacena el idEmpleado en localStorage
    localStorage.setItem('idEmpleado', idEmpleado);

    // Establecer una cookie con el idEmpleado
    document.cookie = "idEmpleado=" + idEmpleado;

    // Redirige a la página cargarDocumentos
    window.location = "index.php?ruta=cargarDocumentos&idEmpleado=" + idEmpleado;
});

// Recuperar idEmpleado desde localStorage
var idEmpleado = localStorage.getItem('idEmpleado');

// Verificar si se recuperó correctamente
if (idEmpleado !== null) {
    // Asignar el valor a un input oculto con el id "idEmpleado"
    $("#idEmpleado").val(idEmpleado);

    console.log('idEmpleado recuperado:', idEmpleado);

   
} else {
    console.log('Error al recuperar idEmpleado');
}



/*=============================================
 Función para cancelar la carga de documentos y redirigir a la página de empleados
=============================================*/

    document.getElementById('cancelarCarga').addEventListener('click', function() {
        // Eliminar la variable de localStorage
        localStorage.removeItem('idEmpleado');

        // Redirigir a la página de empleados
        window.location.href = 'empleados'; 
    });

/*=============================================
ELIMINAR DOCUMENTO
=============================================*/

$(".btnEliminarDocuemento").click(function(){

    var idDocumento = $(this).attr("idDocumento");


    swal({

        title: '¿Está seguro de borrar el documento?',
        text: "¡Si no lo está puede cancelar la acción!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar documento!',

    }).then((result)=>{

        if(result.value){

            window.location = "index.php?ruta=cargarDocumentos&idDocumento="+idDocumento;
        }

    }) 

})

/*=============================================
IMPRIMIR FACTURA
=============================================*/
$(".tablas").on("click", ".btnMostrarContenido", function(){

    var idDocumento = $(this).attr("idDocumento");

    window.open("vistas/modulos/mostrarDocumento.php?idDocumento="+idDocumento, "_blank");

})
