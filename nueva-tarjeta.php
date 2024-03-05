<button class="btn btn-info newBtnElement" type="button" data-bs-toggle="modal" data-bs-target="#modalNvaTarjeta" id="btn_nueva_tarjeta">Nueva</button>
<div class="modal-tarjeta">
  <div class="modal" id="modalNvaTarjeta" aria-hidden="true" aria-labelledby="modalNvaTarjeta-gralLabel" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h2 class="modal-title" id="modalNvaTarjetaLabel">Añadir nueva <strong>Tarjeta</strong></h2>
          <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="content-form">
            <form action="./insert-tarjeta.php"  id="formularioInsert" method="POST" enctype="multipart/form-data" accept-charset="utf-8">
            <div class="form-floating mb-3"> 
                <input class="form-control form-control-lg" placeholder="nombre" type="text" name="nombre" maxlength="100"/>
                <label class="form-label" for="nombre">Nombre</label>
              </div>
              <div class="form-floating mb-3">
                <input class="form-control form-control-lg" placeholder="Foto" type="file" name="foto" accept="image/jpeg, image/png/" />
                <label class="form-label" for="foto">Foto </label>
              </div>
              <div class="form-floating mb-3">
                <input class="form-control form-control-lg" placeholder="Empresa" type="text" name="empresa" maxlength="50" required="required"/>
                <label class="form-label" for="empresa">Empresa</label>
              </div>
              <div class="form-floating mb-3">
                <input class="form-control form-control-lg" placeholder="Logo" type="file" name="logo" accept="image/jpeg, image/png/" />
                <label class="form-label" for="logo">Logo </label>
              </div>
              <div class="form-floating mb-3">
                <input class="form-control form-control-lg" placeholder="Puesto" type="text" name="puesto" maxlength="50" required="required"/>
                <label class="form-label" for="puesto">Puesto</label>
              </div>
              <div class="form-floating mb-3">
                <input class="form-control form-control-lg" placeholder="telefono" type="text" name="telefono" maxlength="10" required="required"/>
                <label class="form-label" for="telefono">Télefono </label>
              </div>
              <div class="form-floating mb-3">
                <input class="form-control form-control-lg" placeholder="Correo electronico" type="email" name="email1" maxlength="50" />
                <label class="form-label" for="correo">Correo Electronico  </label>
              </div>
              <div class="form-floating mb-3">
                <input class="form-control form-control-lg" placeholder="Correo electronico" type="email" name="email2" maxlength="50"/>
                <label class="form-label" for="correo2">Correo Electronico (opcional)  </label>
              </div>
              <div class="form-floating mb-3">
                <input class="form-control form-control-lg" placeholder="whatsApp" type="text" name="whatsapp" maxlength="10" />
                <label class="form-label" for="whatsapp">WhatsApp </label>
              </div>
              <div class="form-floating mb-3">
                <input class="form-control form-control-lg" placeholder="instagram" type="text" name="instagram" maxlength="80" />
                <label class="form-label" for="instagram">Instagram </label>
              </div>
              <div class="form-floating mb-3">
                <input class="form-control form-control-lg" placeholder="facebook" type="text" name="facebook" maxlength="80" />
                <label class="form-label" for="facebook">Facebook </label>
              </div>
              <div class="form-floating mb-3">
                <input class="form-control form-control-lg" placeholder="linkedin" type="text" name="linkedin" maxlength="80" />
                <label class="form-label" for="linkedin">Linkedin </label>
              </div>
              <div class="form-floating mb-3">
                <input class="form-control form-control-lg" placeholder="tiktok" type="text" name="tiktok" maxlength="80"/>
                <label class="form-label" for="tiktok">Tik-tok </label>
              </div>
              <div class="form-floating mb-3">
                <input class="form-control form-control-lg" placeholder="twitter" type="text" name="twitter" maxlength="80" />
                <label class="form-label" for="twitter">Twitter </label>
              </div>
              <div class="form-floating mb-3">
                <input class="form-control form-control-lg" placeholder="github" type="text" name="github" maxlength="80" />
                <label class="form-label" for="github">Github </label>
              </div>
              <div class="form-floating mb-3">
                <input class="form-control form-control-lg" placeholder="sitioweb" type="text" name="sitioWeb" maxlength="80" />
                <label class="form-label" for="sitioWeb">Sitio web </label>
              </div>
          </div>
          <div class="form-floating mb-3">
          <input type="hidden" value=1 name="oculto">
          </div>
          <div class="modal-body__buttons"> 
          <button class="btn btn-danger btn-lg" data-bs-dismiss="modal" aria-label="Close" id="modalCancelarBtn">Cancelar</button>
          <button class="btn btn-success btn-lg" type="submit" name="guardar">Guardar</button>
          </div>
          <input type="hidden" name="oculto" value=1>
            <div class="form-floating mb-3">
            <div class="" id="mostrar_mensaje_modal1"></div>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>
<script>
  // Obtener el formulario y el campo de tipo file
  const form = document.querySelector('#formularioInsert');
  
  // Escuchar el evento submit del formulario
  form.addEventListener('submit', function(event){
    event.preventDefault();
    const xhr = new XMLHttpRequest();

    // Crear un objeto FormData y agregar los datos del formulario
    const formData = new FormData();
    formData.append('nombre', form.nombre.value);
    formData.append('empresa', form.empresa.value);
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
    
    // Obtener los archivos de imagen y logo
    const fotoFile = form.foto.files[0];
    const logoFile = form.logo.files[0];

    // Verificar si se seleccionaron los archivos
    if (fotoFile && logoFile) {
      formData.append('foto', fotoFile);
      formData.append('logo', logoFile);

      //WAITING PROGRESS
      var img = $('<img>', { src: 'images/cargando.gif' });
      $('#mostrar_mensaje_modal1').removeClass('alert-danger');
      $('#mostrar_mensaje_modal1').removeClass('alert-success');
      $('#mensaje-imagen').remove();
      $('#mostrar_mensaje_modal1').html(img);

      xhr.upload.onprogress = function(event){       
        img.attr('src', 'images/cargando.gif');
      };

      // Enviar los datos con AJAX
      xhr.open('POST', './insert_tarjeta.php');
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
      xhr.onerror = function() {
        console.error('Error al enviar la solicitud AJAX.');
      };
      xhr.send(formData);
    } else {
      // Si no se seleccionaron ambos archivos, mostrar el error
      alert('Por favor, seleccione una foto y un logo.');
    }
  });
</script>


<script src="./js/script.js"></script>