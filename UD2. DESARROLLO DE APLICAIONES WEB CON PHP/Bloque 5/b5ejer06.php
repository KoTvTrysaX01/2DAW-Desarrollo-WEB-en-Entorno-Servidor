<?php
$numeros = [2, 3, 4, 5, 6, 7, 8];

function sumArray($numeros){
    $suma = 0;
    for ($i = 0; $i < count($numeros); $i++) {

        if (!is_numeric($numeros[$i])) {
            return false;
        } else {
            $suma += $numeros[$i];
        }
    }
    return $suma;
}

print_r($numeros);
if (!sumArray($numeros)) {
    echo "<br>Uno de los valores no era un número";
} else {
    echo "<br>La suma de los números introducidos es: " . sumArray($numeros);
}
?>
