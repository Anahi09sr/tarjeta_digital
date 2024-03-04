<?php
include './model/conexion.php';
include 'validaciones.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_POST['oculto'])) {
        exit();
    }

    // Definir $permitido dentro del bloque POST
    $permitido = array("image/png", "image/jpeg");

    //Obtención de datos POST
    $nombre = $_POST['nombre'];
    $empresa = $_POST['empresa'];
    $puesto = $_POST['puesto'];
    $telefono = $_POST['telefono'];
    $email1 = $_POST['email1'];
    $email2 = $_POST['email2'];
    $whatsapp = $_POST['whatsapp'];
    $instagram = $_POST['instagram'];
    $facebook = $_POST['facebook'];
    $linkedin = $_POST['linkedin'];
    $tiktok = $_POST['tiktok'];
    $twitter = $_POST['twitter'];
    $github = $_POST['github'];
    $sitioWeb = $_POST['sitioWeb'];

    // Procesar el logo de manera similar a la imagen 'foto'
    if (isset($_FILES['logo']) && is_uploaded_file($_FILES['logo']['tmp_name'])) {
        $datos_logo = file_get_contents($_FILES['logo']['tmp_name']);
    } else {
        // Definir un comportamiento por defecto si no se proporciona el logo
        echo "Error: Uno o ambos archivos no fueron cargados correctamente.";
    exit();
    }

    if (is_uploaded_file($_FILES['foto']['tmp_name'])) {
        $datos_imagen = file_get_contents($_FILES['foto']['tmp_name']);
        $tipoArchivo = $_FILES['foto']['type'];
        if (!in_array($tipoArchivo, $permitido)) {
            echo "Error : tipo de archivo no permitido";
            exit();
        }
        $nombreArchivo = $_FILES['foto']['name'];
        $nombreArchivo = $_FILES['logo']['name'];
        $consulta = $bd->prepare("INSERT INTO details(nombre,foto,empresa,logo,puesto,telefono,email1,email2,whatsapp,instagram,facebook,linkedin,tiktok,twitter,github,sitioWeb) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);");
        $consulta->bindParam(1, $nombre, PDO::PARAM_STR, 100);
        $consulta->bindParam(2, $datos_imagen, PDO::PARAM_LOB);
        $consulta->bindParam(3, $empresa, PDO::PARAM_STR, 100);
        $consulta->bindParam(4, $datos_logo, PDO::PARAM_LOB); // Cambiado a PARAM_LOB
        $consulta->bindParam(5, $puesto, PDO::PARAM_STR, 50);
        $consulta->bindParam(6, $telefono, PDO::PARAM_STR, 10);
        $consulta->bindParam(7, $email1, PDO::PARAM_STR, 50);
        $consulta->bindParam(8, $email2, PDO::PARAM_STR, 50);
        $consulta->bindParam(9, $whatsapp, PDO::PARAM_STR, 80);
        $consulta->bindParam(10, $instagram, PDO::PARAM_STR, 80);
        $consulta->bindParam(11, $facebook, PDO::PARAM_STR, 80);
        $consulta->bindParam(12, $linkedin, PDO::PARAM_STR, 80);
        $consulta->bindParam(13, $tiktok, PDO::PARAM_STR, 80);
        $consulta->bindParam(14, $twitter, PDO::PARAM_STR, 80);
        $consulta->bindParam(15, $github, PDO::PARAM_STR, 80);
        $consulta->bindParam(16, $sitioWeb, PDO::PARAM_STR, 80);

        $consulta->execute();
        if ($consulta) {
            echo "Operación exitosa: Se ha guardado correctamente";
            exit();
        } else {
            echo "Error: se ha producido un error en el registro a la base de datos.";
            exit();
        }
    } else {
        echo "Error : tipo de archivo no permitido";
        exit();
    }
} else {
    echo "Error: Solicitud no válida.";
}
?>
