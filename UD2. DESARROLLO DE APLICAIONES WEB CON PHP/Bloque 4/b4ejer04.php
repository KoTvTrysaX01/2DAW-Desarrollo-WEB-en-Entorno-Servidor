<?php
$valores = [10, 2, 3, 14, 15, 1, 7, 9, 8, 11];

$max = 0;
$min = 100;
for($i = 0; $i < count($valores); $i++){
    if($valores[$i] > $max){
        $max = $valores[$i];
    }elseif($valores[$i] < $min){
        $min = $valores[$i];
    }
}

echo "Max valor: " . $max;
echo "<br> Min valor: " . $min;
?>