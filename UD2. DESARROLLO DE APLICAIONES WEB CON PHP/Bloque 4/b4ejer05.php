<?php
$numeros = [];
for ($i = 0; $i < 20; $i++) {
    $numeros[$i] = number_format(rand(1, 10) + mt_rand() / mt_getrandmax(), 6, ".", ",");
}

sort($numeros);

for ($i = 0; $i < count($numeros); $i++) {
    if ($i == count($numeros) - 1) {
        echo $numeros[$i];
    } else {
        echo $numeros[$i] . ", ";
    }
}
?>