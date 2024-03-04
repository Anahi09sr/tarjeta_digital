<?php
$dbname='tarjeta_digital';
$port = "8889"; // Puerto de MySQL en MAMP
$user='root';
$password='root';
$db_host="localhost";
$options = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'", PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ);
try{
    $bd = new PDO(
        'mysql:host=localhost;
        dbname='.$dbname.';port='.$port,  //Se debe colocar para indicar el puerto, si no  toma por defecto el puerto que esta declarado en mysql
        $user,
        $password,
        $options
    );
    //echo "Conexión exitosa"; // Mensaje de éxito
    }catch(Exception $e){
        
        echo "Error de conexión ". $e->getMessage();
    }

?>  