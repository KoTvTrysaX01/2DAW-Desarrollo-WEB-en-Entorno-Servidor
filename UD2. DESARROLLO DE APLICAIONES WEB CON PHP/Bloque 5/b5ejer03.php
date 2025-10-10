<?php
// Solución al ejercicio usando "in_array()"
// function numVocales($cadena){
//     $vocales = ["a", "á", "o", "ó", "i", "í", "u", "ú", "y", "ý", "e", "é"];
//     $contador = 0;

//     for($i = 0; $i < mb_strlen($cadena); $i++){
//         if(in_array($cadena[$i], $vocales)){
//             $contador++;
//         }
//     }
//     return $contador;
// }

// Solución al ejercicio usando "mb_substr_count"
function numVocales($cadena){
    $vocales = ["a", "á", "o", "ó", "i", "í", "u", "ú", "y", "ý", "e", "é"];
    $contador = 0;

    foreach($vocales as $clave => $vocal){
        $contador += mb_substr_count($cadena, $vocal);
    }
    return $contador;
}

$miCadena = "cadena";
echo "La cadena '" . $miCadena . "' tiene " . numVocales($miCadena) . " vocales.";
?>
