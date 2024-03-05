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

        // Inicializar variables para datos de imagen y tipo de archivo
        $datos_imagen = null;
        $tipoArchivo = null;

        // Procesar el logo de manera similar a la imagen 'foto'
        if (isset($_FILES['logo']) && is_uploaded_file($_FILES['logo']['tmp_name'])) {
            $datos_logo = file_get_contents($_FILES['logo']['tmp_name']);
        } else {
            // Definir un comportamiento por defecto si no se proporciona el logo
            $datos_logo = null;
        }

        if (isset($_FILES['foto']) && is_uploaded_file($_FILES['foto']['tmp_name'])) {
            $datos_imagen = file_get_contents($_FILES['foto']['tmp_name']);
            $tipoArchivo = $_FILES['foto']['type'];

            if (!in_array($tipoArchivo, $permitido)) {
                echo "Error: Tipo de archivo no permitido";
                exit();
            }
        }

        // Crear la consulta SQL
        $sql = "UPDATE details SET nombre = ?, empresa = ?, puesto = ?, telefono = ?, email1 = ?, email2 = ?, whatsapp = ?, instagram = ?, facebook = ?, linkedin = ?, tiktok = ?, twitter = ?, github = ?, sitioWeb = ?";

        // Agregar los valores que se van a actualizar
        $parametros = array($nombre, $empresa, $puesto, $telefono, $email1, $email2, $whatsapp, $instagram, $facebook, $linkedin, $tiktok, $twitter, $github, $sitioWeb);

        // Agregar los valores para la foto y el logo si están disponibles
        if ($datos_imagen !== null && $tipoArchivo !== null) {
            $sql .= ", foto = ?, tipofoto = ?";
            $parametros[] = $datos_imagen;
            $parametros[] = $tipoArchivo;
        }

        if ($datos_logo !== null) {
            $sql .= ", logo = ?";
            $parametros[] = $datos_logo;
        }

        // Agregar la condición WHERE para el id_details
        $sql .= " WHERE id_details = ?";
        $parametros[] = $id_details;

        // Preparar y ejecutar la consulta
        $sentencia = $bd->prepare($sql);
        $resultado = $sentencia->execute($parametros);

        if ($resultado) {
            echo "Operación exitosa: Se ha actualizado correctamente el producto: " . $id_details;
        } else {
            echo "Error: Ocurrió un error en la transacción.";
        }
    } else {
        echo "Error: El campo id_details no está presente en el formulario.";
        exit();
    }
} else {
    echo "Error: Data no válida.";
}
?>
