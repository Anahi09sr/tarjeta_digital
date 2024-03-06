<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de usuario</title>
    <link rel="stylesheet" href="css/styles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <div class="form-container">
        <strong>Formulario de Registro</strong>
        <p>Inserte los datos que a continuación se solicitan</p>
        <!--<h2>Formulario de Registro</h2>-->
        <form method="POST" action="./registro_usuario.php" id="registro-form">

        <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required="required" maxlength="100">
            <label for="telefono">Teléfono:</label>
            <input type="number" id="telefono" name="telefono"  required="required" maxlength="10">

            <label for="email">Email:</label>
            <input type="email" id="email" name="email"  required="required" maxlength="50">
            
            <label for="password">Password:</label>
            <input type="text" id="password" name="password"  required="required" maxlength="10">
            
            <label for="ciudad">Ciudad:</label>
            <input type="text" id="ciudad" name="ciudad"  required="required" maxlength="30">
            
            <label for="estado">Estado:</label>
            <input type="text" id="estado" name="estado"  required="required" maxlength="20">
            
            <label  for="cp">Código postal</label>
            <input class="form-control form-control-lg"  type="number" name="cp" maxlength="4"   required="required"  id="cp">
            
            <label for="direccion_factura">Dirección de factura:</label>
            <input type="text" id="direccion_factura" name="direccion_factura"  maxlength="50">
            
            <label for="razon_social">Razón social:</label>
            <input type="text" id="razon_social" name="razon_social" maxlength="50">
            
            <label  for="rfc">RFC</label>
            <input type="text" name="rfc" maxlength="13"  id="rfc">
            <input type="hidden" value=1 name="oculto">
            <label for="direccion_fiscal">Dirección de fiscal:</label>
            <input type="text" id="direccion_fiscal" name="direccion_fiscal" maxlength="50" >
            <button type="submit">Enviar</button>

            <input type="hidden" name="oculto" value=1>
            <div class="form-floating mb-3">
            <div class="" id="mostrar_mensaje"></div>
        </form>
    </div>

    <!-- Tu script AJAX -->
    <script>
        // Obtener el formulario
        const form = document.querySelector('#registro-form');

        // Escuchar el evento submit del formulario
        form.addEventListener('submit', function(event){
            event.preventDefault(); // Evitar el envío del formulario normalmente

            // Crear un objeto FormData y agregar los datos del formulario
            const formData = new FormData(form);
            

            // Crear una nueva solicitud AJAX
            const xhr = new XMLHttpRequest();

            // Configurar la solicitud AJAX
            xhr.open('POST', './registro_usuario.php');
            // Manejar la carga de la solicitud
            xhr.onload = function () {
                // Mostrar mensaje de espera
                $('#mostrar_mensaje').addClass('slideDown');
                $('#mostrar_mensaje').empty(); // Limpiar el contenedor de mensajes
                if (xhr.status === 200) {
                    // Si la solicitud fue exitosa
                    const mensaje = xhr.responseText;
                    $('#mostrar_mensaje').html(mensaje);
                    // Crear botón para cerrar el mensaje
                    const botonCerrar = $('<button>').attr({
                        type: "button",
                        class: "btn-close",
                        "data-bs-dismiss": "alert",
                        "aria-label": "Close"
                    });
                    if (mensaje.includes('Error')) {
                        // Si hay errores, mostrar mensaje de error
                        $('#mostrar_mensaje').addClass('alert-dismissible');
                        $('#mostrar_mensaje').addClass('alert');
                        $('#mostrar_mensaje').addClass('fade');
                        $('#mostrar_mensaje').addClass('show');
                        $('#mostrar_mensaje').addClass('alert-danger');
                        $('#mostrar_mensaje').removeClass('alert-success');
                        $('#mostrar_mensaje').attr("role", 'alert');
                        $('#mostrar_mensaje').append(botonCerrar);
                    } else if (mensaje.includes('exitosa')) {
                        // Si la operación fue exitosa, mostrar mensaje de éxito
                        $('#mostrar_mensaje').addClass('alert');
                        $('#mostrar_mensaje').addClass('alert-dismissible');
                        $('#mostrar_mensaje').addClass('fade');
                        $('#mostrar_mensaje').addClass('show');
                        $('#mostrar_mensaje').removeClass('alert-danger');
                        $('#mostrar_mensaje').addClass('alert-success');
                        $('#mostrar_mensaje').attr("role", 'alert');
                        $('#mostrar_mensaje').append(botonCerrar);      
                        $('#registro-form')[0].reset();
                        // Limpiar el formulario
                        form.reset();
                    }
                } else {
                    // Si hubo un error en la solicitud AJAX
                    console.error('Error al procesar la solicitud AJAX:', xhr.statusText);
                }
            };

            // Manejar los errores de la solicitud AJAX
            xhr.onerror = function() {
                console.error('Error al enviar la solicitud AJAX.');
            };

            // Enviar la solicitud AJAX con los datos del formulario
            xhr.send(formData);
        });
    </script>
</body>
</html>
