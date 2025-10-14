<?php
function sumArray($numeros){
    $suma = 0;
    foreach($numeros as $clave => $numero){
        if(is_numeric($numero)){
            $suma += $numero;
        }else{
            echo "El valor no es un número";
            return false; 
        }
        
    }
    return $suma;
}

echo sumArray([1, 2, 3, 4, 5]);
?>