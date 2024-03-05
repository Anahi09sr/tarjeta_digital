// Declarar la variable xhr fuera de la función de callback
const xhr = new XMLHttpRequest();

// Obtener todos los contenedores de formulario
const formContainersD = document.querySelectorAll('.formulario-container');
formContainersD.forEach(function(container) {
  const infoId = container.getAttribute('data-info-id');
  const form = document.querySelector(`#formularioDeleteTarjeta${infoId}`);

  // Manejador de eventos para el botón "Cancelar" o el botón de cierre del modal
  $('.closeXmodal').on('click', function (event) {
    event.preventDefault();
    $(`#mostrar_mensaje_modal_deleteT${infoId}`).empty();
    $(`#mostrar_mensaje_modal_deleteT${infoId}`).removeClass('alert-danger');
    $(`#mostrar_mensaje_modal_deleteT${infoId}`).removeClass('alert-success');
  });
  
  // Escuchar el evento submit del formulario
  form.addEventListener('submit', function (event){
    event.preventDefault();

    // Crear un objeto FormData y agregar los datos del formulario
    const formData = new FormData(form);

    // Configurar la solicitud AJAX
    xhr.open('POST', '/delete_tarjeta.php');

    // Manejar la carga de la solicitud AJAX
    xhr.onload = function () {
      $(`#mostrar_mensaje_modal_deleteT${infoId}`).addClass('slideDown');
      if (xhr.status === 200) {
        $(`#mostrar_mensaje_modal_deleteT${infoId}`).empty();
        var mensaje = xhr.responseText;
        $(`#mostrar_mensaje_modal_deleteT${infoId}`).html(mensaje);
        var botonCerrar = $('<button>');
          botonCerrar.attr({
            type: "button",
            class: "btn-close",
            "data-bs-dismiss": "alert",
            "aria-label": "Close"
          });
        if(mensaje.includes('Error')){
          $(`#mostrar_mensaje_modal_deleteT${infoId}`).addClass('alert-dismissible');
          $(`#mostrar_mensaje_modal_deleteT${infoId}`).addClass('alert');
          $(`#mostrar_mensaje_modal_deleteT${infoId}`).addClass('fade');
          $(`#mostrar_mensaje_modal_deleteT${infoId}`).addClass('show');
          $(`#mostrar_mensaje_modal_deleteT${infoId}`).addClass('alert-danger');
          $(`#mostrar_mensaje_modal_deleteT${infoId}`).removeClass('alert-success');
          $(`#mostrar_mensaje_modal_deleteT${infoId}`).attr("role", 'alert');
          $(`#mostrar_mensaje_modal_deleteT${infoId}`).append(botonCerrar);      
        }else if(mensaje.includes('exitosa')){
          $(`#mostrar_mensaje_modal_deleteT${infoId}`).addClass('alert');
          $(`#mostrar_mensaje_modal_deleteT${infoId}`).addClass('alert-dismissible');
          $(`#mostrar_mensaje_modal_deleteT${infoId}`).addClass('fade');
          $(`#mostrar_mensaje_modal_deleteT${infoId}`).addClass('show');
          $(`#mostrar_mensaje_modal_deleteT${infoId}`).removeClass('alert-danger');
          $(`#mostrar_mensaje_modal_deleteT${infoId}`).addClass('alert-success');
          $(`#mostrar_mensaje_modal_deleteT${infoId}`).attr("role", 'alert');
          $(`#mostrar_mensaje_modal_deleteT${infoId}`).append(botonCerrar);      
          $(`#formularioDeleteTarjeta${infoId}`)[0].reset();
        }
      }
    };

    // Enviar la solicitud AJAX con los datos del formulario
    xhr.send(formData);
  });
});
