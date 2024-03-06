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
        noVacio($_POST['nombre'], 'Nombre');
        sinNumeros($_POST['nombre'], 'Nombre');
        dosEspacios($_POST['nombre'], 'Nombre');
        sinCespeciales($_POST['nombre'], 'Nombre');
        sinCespecialesM($_POST['nombre'], 'Nombre');
        digitosNombre($_POST['nombre'], 'Nombre');
        //Validacion para numero
        noVacio($_POST['telefono'], 'Telefono');
        soloNumeros($_POST['telefono'], 'Telefono');
        digitosTelefono($_POST['telefono'], 'Telefono');
        sinEspacios($_POST['telefono'], 'Telefono');
        // email
        noVacio($_POST['email'], 'Email');
        sinEspacios($_POST['email'], 'Email');
        dosEspacios($_POST['email'], 'Email');
        digitosEmail($_POST['email'], 'Email');
        //Ciudad
        noVacio($_POST['ciudad'], 'Ciudad');
        sinNumeros($_POST['ciudad'], 'Ciudad');
        dosEspacios($_POST['ciudad'], 'Ciudad');
        sinCespeciales($_POST['ciudad'], 'Ciudad');
        sinCespecialesM($_POST['ciudad'], 'Ciudad');
        digitosNombre($_POST['ciudad'], 'Ciudad');
        //Estado
        noVacio($_POST['estado'], 'Estado');
        sinNumeros($_POST['estado'], 'Estado');
        sinEspacios($_POST['estado'], 'Estado');
        dosEspacios($_POST['estado'], 'Estado');
        sinCespeciales($_POST['estado'], 'Estado');
        sinCespecialesM($_POST['estado'], 'Estado');
        digitosNombre($_POST['estado'], 'Estado');
        //Codigo postal
        noVacio($_POST['cp'], 'CP');
        soloNumeros($_POST['cp'], 'CP');
        sinEspacios($_POST['cp'], 'CP');
        //Direccion de fatura
        dosEspacios($_POST['direccion_factura'], 'Dirección de factura');
        sinCespeciales($_POST['direccion_factura'], 'Dirección de factura');
        sinCespecialesM($_POST['direccion_factura'], 'Dirección de factura');
        digitosNombre($_POST['direccion_factura'], 'Dirección de factura');
        // Razon social
        dosEspacios($_POST['razon_social'], 'Razón social');
        sinCespeciales($_POST['razon_social'], 'Razón social');
        sinCespecialesM($_POST['razon_social'], 'Razón social');
        digitosNombre($_POST['razon_social'], 'Razón social');
        //RFC
        sinEspacios($_POST['rfc'], 'RFC');
        dosEspacios($_POST['rfc'], 'RFC');
        sinCespeciales($_POST['rfc'], 'RFC');
        sinCespecialesM($_POST['rfc'], 'RFC');
        digitosNombre($_POST['rfc'], 'RFC');
        ////Direccion de fatura
        dosEspacios($_POST['direccion_fiscal'], 'Dirección  fiscal');
        sinCespeciales($_POST['direccion_fiscal'], 'Dirección  fiscal');
        sinCespecialesM($_POST['direccion_fiscal'], 'Dirección  fiscal');
        digitosNombre($_POST['direccion_fiscal'], 'Dirección  fiscal');

        
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

        if ($consulta) {
            echo "Operación exitosa: Se ha guardado correctamente";
            exit();
        } else {
            echo "Error: se ha producido un error en el registro a la base de datos.";
            exit();
        }
} else {
    echo "Error: Solicitud no válida.";
}
?>