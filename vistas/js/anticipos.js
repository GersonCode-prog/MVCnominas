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

$(".btnEliminarAnticipo").click(function(){

    var idAnticipo = $(this).attr("idAnticipo");


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

            window.location = "index.php?ruta=anticipos&idAnticipo="+idAnticipo;
        }

    }) 

})

/*=============================================
 Función para cancelar la carga de documentos y redirigir a la página de anticipos
=============================================*/

    document.getElementById('cancelarCargaA').addEventListener('click', function() {
        // Eliminar la variable de localStorage
        localStorage.removeItem('idEmpleado');

        // Redirigir a la página de empleados
        window.location.href = 'inicio'; // Reemplaza 'empleados' con la URL correcta
    });


