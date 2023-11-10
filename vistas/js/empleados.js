/*=============================================
    EDITAR CLIENTE
=============================================*/

$(document).on("click", ".btnEditarEmpleado", function(){
    

var idEmpleado = $(this).attr("idEmpleado");

var datos = new FormData();
datos.append("idEmpleado", idEmpleado);

$.ajax({

    url:"ajax/empleados.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType:"json",
    success:function(respuesta){

    $("#idEmpleado").val(respuesta["idEmpleado"]);
    $("#editarNombre").val(respuesta["nombre"]);
    $("#editarApellido").val(respuesta["apellido"]);
    $("#editarFecha").val(respuesta["fechaNacimiento"]);
    $("#editarGenero").val(respuesta["genero"]);
    $("#editarCivil").val(respuesta["estadoCivil"]);
    $("#editarDireccion").val(respuesta["departamento"]);
    $("#editarEmail").val(respuesta["correoElectronico"]);
    

    
    }

    });

})



/*=============================================
ELIMINAR EMPLEADO
=============================================*/


$(document).on("click", ".btnEliminarEmpleado", function(){

    var idEmpleado = $(this).attr("idEmpleado");


    swal({

        title: '¿Está seguro de borrar esta empleado?',
        text: "¡Si no lo está puede cancelar la acción!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar Empleado!',

    }).then((result)=>{

        if(result.value){

            window.location = "index.php?ruta=empleados&idEmpleado="+idEmpleado;
        }

    });

})


