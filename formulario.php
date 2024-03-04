<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de usuario</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="form-container">
        <strong>Formulario de Registro</strong>
        <p> Inserte los datos que a continuación se solicitan</p>
        <!--<h2>Formulario de Registro</h2>-->
        <form method="POST" action="./registro_usuario.php">

            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre"  required="required" maxlength="100">
    
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
            <input class="form-control form-control-lg"  type="number" name="cp" maxlength="4"   required="required"  id="cp"/>
            
            <label for="direccion_factura">Dirección de factura:</label>
            <input type="text" id="direccion_factura" name="direccion_factura"  maxlength="50">
            
            <label for="razon_social">Razón social:</label>
            <input type="text" id="razon_social" name="razon_social" maxlength="50">
            
            <label  for="rfc">RFC</label>
            <input type="text" name="rfc" maxlength="13"  id="rfc"/>

            <label for="direccion_fiscal">Dirección de fiscal:</label>
            <input type="text" id="direccion_fiscal" name="direccion_fiscal" maxlength="50" >

            <button type="submit">Enviar</button>
        </form>
    </div>
</body>
</html>

