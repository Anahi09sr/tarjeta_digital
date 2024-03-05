
function limpiarNotificacion(caja){
	var notificacion = document.querySelector('#'+caja);
	$('#'+caja).removeClass("notificacion-exito");
	$('#'+caja).removeClass("notificacion-error");
	notificacion.innerHTML="";
	console.log(notificacion);
}
function confirmacion(){
    var decision = confirm("¿Son correctos los datos?");    
    if(decision==true){
        return true;
    }else{ 
       return false; 
    }
}

// Obtener todos los elementos con la clase "status"
var elementosDeEstatus = document.querySelectorAll('.status');

// Iterar sobre cada elemento y asignar un color basado en su valor
elementosDeEstatus.forEach(function(elemento) {
    var estatus = elemento.textContent.trim().toLowerCase();

    if (estatus === 'pendiente') {
        elemento.classList.add('amarillo');
    } else if (estatus === 'atendida') {
        elemento.classList.add('verde');
    } else if (estatus === 'cancelada') {
        elemento.classList.add('rojo');
    }
});

$(document).ready(function () {
    // Evento de cambio para el primer select
    $('#selectcategoria').change(function () {
        // Obtener el valor seleccionado en el primer select
        var categoriaSeleccionada = $(this).val();
        
        // Realizar una solicitud AJAX para obtener las subcategorías basadas en la categoría seleccionada
        $.ajax({
            type: 'GET', // o 'POST' según tus necesidades
            url: 'selectSubcategoria.php', // ajusta la ruta a tu script del servidor
            data: { selectcategoria: categoriaSeleccionada },
            dataType: 'json', // el tipo de datos que esperas recibir del servidor
            success: function (subcategorias) {
                // Limpiar el contenido actual del segundo select
                $('#selectsubcategoria').empty();
                
                // Agregar las nuevas opciones al segundo select
                $.each(subcategorias, function (index, subcategoria) {
                    $('#selectsubcategoria').append($('<option>', {
                        value: subcategoria.id,
                        text: subcategoria.nombre
                    }));
                });
            },
            error: function (error) {
                console.error('Error en la solicitud AJAX:', error);
            }
        });
    });


    


});

function cargarSubcategorias(idCategoria, idFila) {
    $.ajax({
        type: 'GET', // o 'POST' según tus necesidades
        url: 'selectSubcategoriaEdit.php', // ajusta la ruta a tu script del servidor
        data: { selectcategoriaEdit: idCategoria },
        dataType: 'json',
        success: function (subcategorias) {
            // Limpiar el contenido actual del segundo select
            $('#selectsubcategoriaEdit'+idFila).empty();
            
            // Agregar las nuevas opciones al segundo select
            $.each(subcategorias, function (index, subcategoria) {
                $('#selectsubcategoriaEdit'+idFila).append($('<option>', {
                    value: subcategoria.id,
                    text: subcategoria.nombre
                }));
            });
        },
        error: function (error) {
            console.error('Error en la solicitud AJAX:', error);
        }
    });
}