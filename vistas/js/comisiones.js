/*=============================================
    REVISAR MES YA REGISTRADO
=============================================*/
$("#nuevoMes").change(function () {
    $(".alert").remove();
    var mes = $(this).val();
    var datos = new FormData();
    datos.append("validarMes", mes);

    $.ajax({
        url: "ajax/Comisiones.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {
            if (respuesta) {
                $("#nuevoMes").after('<div class="alert alert-warning">Este mes ya tiene un cálculo registrado</div');
                $("#realizarCalculoBtn").prop("disabled", true); // Deshabilita el botón
            } else {
                $("#realizarCalculoBtn").prop("disabled", false); // Habilita el botón
            }
        }
    });
});
