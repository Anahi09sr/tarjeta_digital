<?php
include './components/head.php';
include './model/conexion.php';
include './validaciones.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_POST['oculto']) || $_POST['oculto'] !== '1') {
        exit();
    }

    // Verificar si el campo id_details está presente en el formulario
    if (isset($_POST['id_details'])) {
        // Obtener el valor de id_details
        $id_details = $_POST['id_details'];

        // Definir $permitido dentro del bloque POST
        $permitido = array("image/png", "image/jpeg");

        // Obtención de datos POST
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

        echo "ID: " . $id_details . "<br>";

        // Procesar el logo de manera similar a la imagen 'foto'
        if (isset($_FILES['logo']) && is_uploaded_file($_FILES['logo']['tmp_name'])) {
            $datos_logo = file_get_contents($_FILES['logo']['tmp_name']);
        } else {
            // Definir un comportamiento por defecto si no se proporciona el logo
            echo "Error: Uno o ambos archivos no fueron cargados correctamente.";
            exit();
        }

        if (isset($_FILES['foto']) && is_uploaded_file($_FILES['foto']['tmp_name'])) {
            $datos_imagen = file_get_contents($_FILES['foto']['tmp_name']);
            $tipoArchivo = $_FILES['foto']['type'];

            if (!in_array($tipoArchivo, $permitido)) {
                echo "Error: Tipo de archivo no permitido";
                exit();
            }

            $sentencia = $bd->prepare("UPDATE details SET nombre = ?, foto = ?, tipofoto = ?, empresa = ?, logo = ?, puesto = ?, telefono = ?, email1 = ?, email2 = ?, whatsapp = ?, instagram = ?, facebook = ?, linkedin = ?, tiktok = ?, twitter = ?, github = ?, sitioWeb = ? WHERE id_details = ?");
            $resultado = $sentencia->execute([$nombre, $datos_imagen, $tipoArchivo, $empresa, $datos_logo, $puesto, $telefono, $email1, $email2, $whatsapp, $instagram, $facebook, $linkedin, $tiktok, $twitter, $github, $sitioWeb, $id_details]);

            if ($resultado) {
                echo "Operación exitosa: Se ha actualizado correctamente el producto: "  . $id_details;
            } else {
                echo "Error: Ocurrió un error en la transacción.";
            }
        } else {
            // Si no se seleccionó un archivo 'foto', realizar la actualización sin modificar la foto
            $sentencia = $bd->prepare("UPDATE details SET nombre = ?, empresa = ?, puesto = ?, telefono = ?, email1 = ?, email2 = ?, whatsapp = ?, instagram = ?, facebook = ?, linkedin = ?, tiktok = ?, twitter = ?, github = ?, sitioWeb = ? WHERE id_details = ?");
            $resultado = $sentencia->execute([$nombre, $empresa, $puesto, $telefono, $email1, $email2, $whatsapp, $instagram, $facebook, $linkedin, $tiktok, $twitter, $github, $sitioWeb, $id_details]);

            if ($resultado) {
                echo "Operación exitosa: Se ha actualizado correctamente el producto: " . $id_details ;
            } else {
                echo "Error: Ocurrió un error en la transacción." ;
            }
        }
    } else {
        echo "Error: El campo id_details no está presente en el formulario.";
        exit();
    }
} else {
    echo "Error: Data no válida.";
}
?>
