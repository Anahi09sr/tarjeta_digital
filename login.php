<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/styles.css">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body>
    <div class="login-container">
        <img src="img/logo_usuario.png" alt="Logo del usuario" class="user-logo">
        <h1>Bienvenido a Bizkaard</h1>
        <form action="./loginProcess.php" method="POST">
            <label for="email">Email</label>
            <input type="text" id="email" name="email" required placeholder="Ingresa tu email">
            <label for="password">Contraseña</label>
            <input type="password" id="password" name="password" required>
            <div class="g-recaptcha" data-sitekey="6Lfh9oYpAAAAAHDnwtt6cOoVNaNgcDnzRwoijE3x"></div>
            <button type="submit">Iniciar Sesión</button><br>
            <a href="formulario.php" class="register-button">Registrarse</a>
        </form>
    </div>
</body>
</html>