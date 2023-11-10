/*=============================================
    DESCARGAR IMAGEN 
=============================================*/

    // Cuando se hace clic en una imagen de la tabla
    $(".imagen-empleado").click(function () {
        var imagenBase64 = $(this).data("imagen");
        var imagenSrc = "data:image/jpeg;base64," + imagenBase64;
        
        // Establece la imagen ampliada en el modal
        $(".imagen-ampliada").attr("src", imagenSrc);

        // Establece el enlace de descarga en el botón del modal
        $(".btnDescargarImagen").attr("href", imagenSrc);
    });

    // Cuando se abre el modal, muestra la imagen ampliada
    $('#modalVerImagen').on('show.bs.modal', function (e) {
        var imagenBase64 = $(e.relatedTarget).data('imagen');
        var imagenSrc = "data:image/jpeg;base64," + imagenBase64;
        $(".imagen-ampliada").attr("src", imagenSrc);
    });

