<?php
include './model/conexion.php';

$email = $_POST['email'];
$password = $_POST['password'];

    $busqueda = $bd->prepare('SELECT email, password FROM usuario WHERE email = ?;');
    $busqueda->execute([$email]);
    $datos = $busqueda->fetch(PDO::FETCH_OBJ);

    if ($datos === FALSE) {
        echo json_encode(['error' => 'El nombre de usuario es incorrecto.']);
    } elseif ($password == $datos->password) {
        session_start();
        $_SESSION['email'] = $datos->email;
         // Devuelve la URL a la que se debe redirigir
        //echo json_encode(['success' => true, 'redirect' => './interfaz.php']);
          // Redireccionar al usuario a la página de destino
        header('Location: ./interfaz.php');
        exit();
    } else {
        echo json_encode(['error' => 'La contraseña es incorrecta.']);
       
    }

?>
