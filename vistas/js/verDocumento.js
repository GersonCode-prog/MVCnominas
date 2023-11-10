/*=============================================
Función para capturar el idDocumento y redirigir a mostrarDocumento
=============================================*/
$(".btnVerDocumentos").click(function () {
    var idDocumento = $(this).attr("idDocumento");

    // Almacena el idDocumento en localStorage
    localStorage.setItem('idDocumento', idDocumento);

    // Establecer una cookie con el idDocumento
    document.cookie = "idDocumento=" + idDocumento;

    window.location = "index.php?ruta=mostrarDocumento&idDocumento=" + idDocumento;

});

// Recuperar idDocumento desde localStorage
var idDocumento = localStorage.getItem('idDocumento');

// Verificar si se recuperó correctamente
if (idDocumento !== null) {
    // Asignar el valor a un input oculto con el id "idDocumento"
    $("#idDocumento").val(idDocumento);

    console.log('idDocumento recuperado:', idDocumento);

   
} else {
    console.log('Error al recuperar idDocumento');
}
