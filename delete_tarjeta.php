<?php

include './model/conexion.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$response = array(); // Inicializar la variable $response

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(!isset($_POST['oculto']) || $_POST['oculto'] !== '1'){
        exit();
    }
    
    $idDetails = $_POST['id_details'];
    $sentencia = $bd->prepare("DELETE FROM details WHERE id_details = ?;");
    $resultado = $sentencia->execute([$idDetails]);
    if ($resultado === true) {
        echo "Operación exitosa: el registro se ha eliminado correctamente.";
    } else {
        $errorInfo = $sentencia->errorInfo();
        $response['success'] = false;
        $response['message'] = "Error: no se pudo eliminar el registro. Detalles del error: " . $errorInfo[2];
        echo json_encode($response);
    }
} else {
    echo "Error en el sistema.";
}
?> 
