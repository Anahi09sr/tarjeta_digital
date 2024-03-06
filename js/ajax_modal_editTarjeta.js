$(document).ready(function() {
  $('.formularioEditTarjeta').on('submit', function(event) {
      event.preventDefault();
      var form = this;
      var formData = new FormData(form);
      var infoId = $(form).closest('.formulario-container').data('info-id');

      // Realizar la solicitud AJAX
      $.ajax({
          type: 'POST',
          url: './edit_tarjeta.php',
          data: formData,
          processData: false,
          contentType: false,
          success: function(response) {
              // Manejar la respuesta del servidor aquí
              $(`#mensajeEditTarjeta${infoId}`).empty();
              var mensaje = response;
              var botonCerrar = $('<button>');
              botonCerrar.attr({
                  type: "button",
                  class: "btn-close",
                  "data-bs-dismiss": "alert",
                  "aria-label": "Close"
              });
              if (mensaje.includes('Error')) {
                  $(`#mensajeEditTarjeta${infoId}`).addClass('alert-dismissible alert fade show alert-danger').attr("role", 'alert').html(mensaje).append(botonCerrar);
              } else if (mensaje.includes('exitosa')) {
                  $(`#mensajeEditTarjeta${infoId}`).addClass('alert-dismissible alert fade show alert-success').attr("role", 'alert').html(mensaje).append(botonCerrar);
                  form.reset();
              }
          },
          error: function(xhr, status, error) {
              // Manejar cualquier error de AJAX aquí
              console.error(xhr.responseText);
          }
      });
  });
});
