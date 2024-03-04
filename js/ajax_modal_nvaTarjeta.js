// Manajador de eventos para el botón "Cancelar" o el botón de cierre del modal
  $('#modalCancelarBtn','#modalCancelBtn').on('click', function (event) {
        // Prevenir la acción por defecto del formulario
        event.preventDefault();
        $('#mostrar_mensaje_modal1').empty();
        $('#mostrar_mensaje_modal1').removeClass('alert-danger');
        $('#mostrar_mensaje_modal1').removeClass('alert-success');
        });
    // Obtener el formulario y el campo de tipo file
    const form = document.querySelector('#formularioInsert');
    // Escuchar el evento submit del formulario
    form.addEventListener('submit', function (event){
      event.preventDefault();
      const xhr = new XMLHttpRequest();

       // Crear un objeto FormData y agregar los datos del formulario
        const formData = new FormData();
        formData.append('nombre', form.nombre.value);
        formData.append('foto', form.foto.value);
        formData.append('empresa', form.empresa.value);
        formData.append('logo', form.logo.value);
        formData.append('puesto', form.puesto.value);
        formData.append('telefono', form.telefono.value);
        formData.append('email1', form.email1.value);
        formData.append('email2', form.email2.value);
        formData.append('whatsapp', form.whatsapp.value);
        formData.append('instagram', form.instagram.value);
        formData.append('facebook', form.facebook.value);
        formData.append('linkedin', form.linkedin.value);
        formData.append('tiktok', form.tiktok.value);
        formData.append('twitter', form.twitter.value);
        formData.append('github', form.github.value);
        formData.append('sitioWeb', form.sitioWeb.value);
        formData.append('oculto', form.oculto.value);

        //WAITING PROGRESS
         //Crear un elemento de imagen y establecer su atributo src en la URL de la imagen GIF
        var img = $('<img>', { src: 'images/cargando.gif' });
        $('#mostrar_mensaje_modal1').removeClass('alert-danger');
        $('#mostrar_mensaje_modal1').removeClass('alert-success');
        $('#mensaje-imagen').remove();
        $('#mostrar_mensaje_modal1').html(img);

    xhr.upload.onprogress = function(event){       
    // Actualizar el contenido de la imagen de carga
    img.attr('src', 'images/cargando.gif');
    };

      // Enviar los datos con AJAX
        xhr.open('POST', 'insert_tarjeta.php');
        xhr.onload = function () {
          $('#mostrar_mensaje_modal1').addClass('slideDown');
          if (xhr.status === 200) {
            $('#mostrar_mensaje_modal1').empty();
            var mensaje = xhr.responseText;
            $('#mostrar_mensaje_modal1').html(mensaje);
            var botonCerrar = $('<button>');
              botonCerrar.attr({
                type: "button",
                class: "btn-close",
                "data-bs-dismiss": "alert",
                "aria-label": "Close"
              });
            if(mensaje.includes('Error')){
              $('#mostrar_mensaje_modal1').addClass('alert-dismissible');
              $('#mostrar_mensaje_modal1').addClass('alert');
              $('#mostrar_mensaje_modal1').addClass('fade');
              $('#mostrar_mensaje_modal1').addClass('show');
              $('#mostrar_mensaje_modal1').addClass('alert-danger');
              $('#mostrar_mensaje_modal1').removeClass('alert-success');
              $('#mostrar_mensaje_modal1').attr("role", 'alert');
              $('#mostrar_mensaje_modal1').append(botonCerrar);      
            }else if(mensaje.includes('exitosa')){
              $('#mostrar_mensaje_modal1').addClass('alert');
              $('#mostrar_mensaje_modal1').addClass('alert-dismissible');
              $('#mostrar_mensaje_modal1').addClass('fade');
              $('#mostrar_mensaje_modal1').addClass('show');
              $('#mostrar_mensaje_modal1').removeClass('alert-danger');
              $('#mostrar_mensaje_modal1').addClass('alert-success');
              $('#mostrar_mensaje_modal1').attr("role", 'alert');
              $('#mostrar_mensaje_modal1').append(botonCerrar);      
              $('#formularioInsert')[0].reset();
            }
          
      };
    }
    
  xhr.send(formData);
    });