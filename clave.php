<?php

function generarClaveUnica() {
    // Crear un array con todas las letras del alfabeto
    $letras = range('a', 'z');

    // Obtener dos letras aleatorias del array
    $letra1 = $letras[array_rand($letras)];
    $letra2 = $letras[array_rand($letras)];

    // Obtener la fecha y hora actual
    $anio = date('Y');
    $mes = date('m');
    $dia = date('d');
    $hora = date('H');
    $minuto = date('i');
    $segundo = date('s');

    // Obtener dos letras aleatorias para el final
    $letra3 = $letras[array_rand($letras)];
    $letra4 = $letras[array_rand($letras)];

    // Construir la clave única concatenando todos los componentes
    $claveUnica = $letra1 . $letra2 . $anio . $mes . $dia . $hora . $minuto . $segundo . $letra3 . $letra4;

    return $claveUnica;
}

// Generar una clave única
$clave = generarClaveUnica();
echo "Clave única generada: $clave";

?>
