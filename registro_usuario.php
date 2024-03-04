<?php
// Incluir el archivo de la conexión a la BD
include './model/conexion.php';

// Verificar si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // Recuperar los valores del formulario
        $nombre = $_POST['nombre'];
        $telefono = $_POST['telefono'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $ciudad = $_POST['ciudad'];
        $estado = $_POST['estado'];
        $cp = $_POST['cp'];
        $direccion_factura = $_POST['direccion_factura'];
        $razon_social = $_POST['razon_social'];
        $rfc = $_POST['rfc'];
        $direccion_fiscal = $_POST['direccion_fiscal'];

        // Preparar la consulta
        $consulta = $bd->prepare("INSERT INTO usuario(nombre,telefono,email,password,ciudad,estado,cp,direccion_factura, razon_social, rfc, direccion_fiscal) VALUES (?,?,?,?,?,?,?,?,?,?,?)");

        // Vincular parámetros y ejecutar la consulta
        $consulta->bindParam(1, $nombre, PDO::PARAM_STR, 100);
        $consulta->bindParam(2, $telefono, PDO::PARAM_STR, 10);
        $consulta->bindParam(3, $email, PDO::PARAM_STR, 50);
        $consulta->bindParam(4, $password, PDO::PARAM_STR, 128);
        $consulta->bindParam(5, $ciudad, PDO::PARAM_STR, 30);
        $consulta->bindParam(6, $estado, PDO::PARAM_STR, 20);
        $consulta->bindParam(7, $cp, PDO::PARAM_STR, 5);
        $consulta->bindParam(8, $direccion_factura, PDO::PARAM_STR, 50);
        $consulta->bindParam(9, $razon_social, PDO::PARAM_STR, 50);
        $consulta->bindParam(10, $rfc, PDO::PARAM_STR, 13);
        $consulta->bindParam(11, $direccion_fiscal, PDO::PARAM_STR, 80);

        $consulta->execute(); // Ejecutar la consulta

        echo "Operación exitosa: Se ha guardado correctamente";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage(); // Capturar cualquier error de ejecución
    }
} else {
    echo "Error: Solicitud no válida.";
}
?>
