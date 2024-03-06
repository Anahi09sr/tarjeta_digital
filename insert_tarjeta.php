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
    //Validacion para nombre
    noVacio($_POST['nombre'], 'Nombre');
    sinNumeros($_POST['nombre'], 'Nombre');
    dosEspacios($_POST['nombre'], 'Nombre');
    sinCespeciales($_POST['nombre'], 'Nombre');
    sinCespecialesM($_POST['nombre'], 'Nombre');
    digitosNombre($_POST['nombre'], 'Nombre');
      //Validacion para empresa
    noVacio($_POST['empresa'], 'Empresa');
    dosEspacios($_POST['empresa'], 'Empresa');
    sinCespeciales($_POST['empresa'], 'Empresa');
    sinCespecialesM($_POST['empresa'], 'Empresa');
    digitosNombre($_POST['empresa'], 'Empresa');
    //Validacion para puesto
    noVacio($_POST['puesto'], 'Puesto');
    sinNumeros($_POST['puesto'], 'Puesto');
    dosEspacios($_POST['puesto'], 'Puesto');
    sinCespeciales($_POST['puesto'], 'Puesto');
    sinCespecialesM($_POST['puesto'], 'Puesto');
    digitosNombre($_POST['puesto'], 'Puesto');
    //Validacion para numero
    noVacio($_POST['telefono'], 'Telefono');
    soloNumeros($_POST['telefono'], 'Telefono');
    digitosTelefono($_POST['telefono'], 'Telefono');
    sinEspacios($_POST['telefono'], 'Telefono');
    // email
    noVacio($_POST['email1'], 'Email1');
    sinEspacios($_POST['email1'], 'Email1');
    dosEspacios($_POST['email1'], 'Email1');
    digitosEmail($_POST['email1'], 'Email1');
    // emai2
    sinEspacios($_POST['email2'], 'Email1');
    dosEspacios($_POST['email2'], 'Email1');
    digitosEmail($_POST['email2'], 'Email1');
    //Validaciones para redes sociales

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

        
        $consulta = $bd->prepare("INSERT INTO details(nombre, foto, tipofoto, empresa, logo, puesto, telefono, email1, email2, whatsapp, instagram, facebook, linkedin, tiktok, twitter, github, sitioWeb) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);");
        $consulta->bindParam(1, $nombre, PDO::PARAM_STR, 100);
        $consulta->bindParam(2, $datos_imagen, PDO::PARAM_LOB);
        $consulta->bindParam(3, $tipoArchivo, PDO::PARAM_STR, 40); // Cambiado a PARAM_STR
        $consulta->bindParam(4, $empresa, PDO::PARAM_STR, 100);
        $consulta->bindParam(5, $datos_logo, PDO::PARAM_LOB);
        $consulta->bindParam(6, $puesto, PDO::PARAM_STR, 50);
        $consulta->bindParam(7, $telefono, PDO::PARAM_STR, 10);
        $consulta->bindParam(8, $email1, PDO::PARAM_STR, 50);
        $consulta->bindParam(9, $email2, PDO::PARAM_STR, 50);
        $consulta->bindParam(10, $whatsapp, PDO::PARAM_STR, 80);
        $consulta->bindParam(11, $instagram, PDO::PARAM_STR, 80);
        $consulta->bindParam(12, $facebook, PDO::PARAM_STR, 80);
        $consulta->bindParam(13, $linkedin, PDO::PARAM_STR, 80);
        $consulta->bindParam(14, $tiktok, PDO::PARAM_STR, 80);
        $consulta->bindParam(15, $twitter, PDO::PARAM_STR, 80);
        $consulta->bindParam(16, $github, PDO::PARAM_STR, 80);
        $consulta->bindParam(17, $sitioWeb, PDO::PARAM_STR, 80);

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
