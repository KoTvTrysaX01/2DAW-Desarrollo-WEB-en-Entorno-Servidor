<?php
$numeros = [120.25, 85.05, 90.36, 98.95, 102.51, 79.17, 89.55, 80.69, 86.77, 115.85, 124.25, 92.24, 94.97,
112.73, 127.85, 100.05, 105.42, 91.12, 99.51, 95.63];

$suma = 0;
foreach($numeros as $clase => $numero){
    $suma += $numero;
}

$avg = $suma / count($numeros);
echo "Suma = " . $suma . ", numero = " . $numero . ", Avg = " . $avg;
?>