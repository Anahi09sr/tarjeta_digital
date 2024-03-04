<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

    // $permitidos_mensaje = $permitidos . '.,;¿?¡!';

//VALIDA SIN NUMEROS
function sinNumeros($elemento,$campo){
    if (!preg_match('/[0-9]/', $elemento)) {
        // El campo no contiene números
      } else {
        echo "Error : El campo '". $campo ."' no debe contener números";
        exit();
      }
}
function soloNumeros($elemento,$campo){
    if (preg_match('/[0-9]/', $elemento)) {
        
      } else {
        echo "Error : El campo ". $campo ." debe contener solo números";
        exit();
      }
}

//VALIDA SIN CARACTERES ESPECIALES

function sinCespeciales($text){
    $pattern = "/^[0-9a-zA-Z\sñáéíóúÁÉÍÓÚ]+$/";
    return preg_match($pattern,trim($text));
}
function sinCespecialesM($text){
    $pattern = "/^[0-9a-zA-Z\sñáéíóúÁÉÍÓÚ.,!¡?¿;@]+$/";
    return preg_match($pattern,trim($text));
}

//***** VALIDA CANTIDAD DE CARACTERES ******
function digitosNombre($elemento,$campo){
    if(strlen($elemento)<=60){

    }else{
        echo "Error : el campo ". $campo ." Debe ser menor de 30 caracteres";
        exit();
    }
}
function digitosEmail($elemento,$campo){
    if(strlen($elemento)<=40){

    }else{
        echo "Error : el campo ". $campo ." Debe ser menor de 40 caracteres";
        exit();
    }
}
function digitosEmpresa($elemento,$campo){
    if(strlen($elemento)<=40){

    }else{
        echo "Error : el campo ". $campo ." Debe ser menor de 40 caracteres";
        exit();
    }
}
function digitosMensaje($elemento,$campo){
    if(strlen($elemento)<=360){

    }else{
        echo "Error : el campo ". $campo ." Debe ser menor de 360 caracteres";
        exit();
    }
}
function digitosTelefono($elemento, $campo){
    if(strlen($elemento)==10){

    }else{
        echo "Error : el campo ". $campo ." Debe ser de 10 dígitos";
        exit();
    }
}
// **** FIN DE VALIDACIÓN DE CARACTERES

//VALIDA SIN ESPACIOS AL PRINCIPIO O AL FINAL
function sinEspacios($elemento,$campo){
    if ($elemento === trim($elemento)) {
    // El campo no tiene espacios en blanco al principio ni al final
    } else {
        echo "Error : el campo ".$campo. " no debe llevar espacios al principio o al final";
        exit();
    }

}
//VALIDA QUE EL CAMPO NO ESTÉ VACIO
function noVacio($elemento,$campo){
    if (!empty($elemento)) {
      // El campo no está vacío
    } else {
      echo "Error : El campo ". $campo ." no debe estar vacio";
      exit();
    }
}
//VALIDA MAS DE UN ESPACIO SEGUIDO
function dosEspacios($elemento,$campo){
    if (!preg_match('/\s{2,}/', $elemento)) {
      // El campo no tiene más de dos espacios consecutivos
    } else {
      echo "Error : El campo ".$campo ." no puede llevar más de dos espacios consecutivos";
      exit();
    }
}

//QUITAR ACENTOS PARA LOS ID
function quitarAcentos($cadena) {
    $acentos = array('á', 'é', 'í', 'ó', 'ú', 'ü', 'Á', 'É', 'Í', 'Ó', 'Ú', 'Ü');
    $sinAcentos = array('a', 'e', 'i', 'o', 'u', 'u', 'A', 'E', 'I', 'O', 'U', 'U');

    // Utiliza strtr para reemplazar los caracteres acentuados por sus equivalentes sin acentos
    $cadenaSinAcentos = strtr($cadena, array_combine($acentos, $sinAcentos));

    return $cadenaSinAcentos;
}




?>