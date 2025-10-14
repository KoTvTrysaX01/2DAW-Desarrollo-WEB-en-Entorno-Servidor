<?php
 function numVocales($cadena){
    $numero = 0;
    $vocales = ['a', 'o', 'i', 'u', 'y', 'e'];
    for($i = 0; $i < mb_strlen($cadena); $i++){
        if(in_array($cadena[$i], $vocales)){
            $numero++;
        }
    }
    return $numero;
 }
$miCadena = "prieeevet";
 echo "Cadena '". $miCadena . "' tiene " . numVocales($miCadena) . " vocales";
?>