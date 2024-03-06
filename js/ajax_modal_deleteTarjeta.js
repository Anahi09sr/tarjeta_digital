$(document).ready(function() {
  $('.formularioDeleteTarjeta').on('submit', function(event) {
      event.preventDefault();
      var form = this;
      var formData = new FormData(form);
      var infoId = $(form).closest('.formulario-container').data('info-id');

      // Realizar la solicitud AJAX
      $.ajax({
          type: 'POST',
          url: './delete_tarjeta.php',
          data: formData,
          processData: false,
          contentType: false,
          success: function(response) {
              // Manejar la respuesta del servidor aquí
              $(`#mostrar_mensaje_modal_deleteT${infoId}`).empty();
              var mensaje = response;
              var botonCerrar = $('<button>');
              botonCerrar.attr({
                  type: "button",
                  class: "btn-close",
                  "data-bs-dismiss": "alert",
                  "aria-label": "Close"
              });
              if (mensaje.includes('Error')) {
                  $(`#mostrar_mensaje_modal_deleteT${infoId}`).addClass('alert-dismissible alert fade show alert-danger').attr("role", 'alert').html(mensaje).append(botonCerrar);
              } else if (mensaje.includes('exitosa')) {
                  $(`#mostrar_mensaje_modal_deleteT${infoId}`).addClass('alert-dismissible alert fade show alert-success').attr("role", 'alert').html(mensaje).append(botonCerrar);
                  // Aquí puedes agregar cualquier lógica adicional después de eliminar exitosamente
              }
          },
          error: function(xhr, status, error) {
              // Manejar cualquier error de AJAX aquí
              console.error(xhr.responseText);
          }
      });
  });
});
