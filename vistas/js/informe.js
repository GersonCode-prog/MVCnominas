/*=============================================
IMPRIMIR FACTURA
=============================================*/
$(".tablas").on("click", ".btnImprimirFactura", function(){

    var codigoVenta = $(this).attr("codigoVenta");

    window.open("extensiones/tcpdf/pdf/recibo.php?codigo="+codigoVenta, "_blank");

});


/*=============================================
IMPRIMIR FACTURA
=============================================*/
$(".tablas").on("click", ".btnImprimirFacturaA", function(){

    var codigoVenta = $(this).attr("codigoVenta");

    window.open("extensiones/tcpdf/pdf/reciboA.php?codigo="+codigoVenta, "_blank");

})

