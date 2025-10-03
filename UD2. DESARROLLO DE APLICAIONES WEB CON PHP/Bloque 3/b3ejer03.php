<?php
if (!isset($_GET['num1']) || !isset($_GET['num3']) || !isset($_GET['num3'])) {
    echo "<h2>No se pudo encontrar los 3 números</h2><br>";
} else {
    if (!ctype_digit($_GET['num1']) || !ctype_digit($_GET['num2']) || !ctype_digit($_GET['num3']) || !ctype_digit($_GET['num4']) || !ctype_digit($_GET['num5'])) {
        echo "Uno de los valores no es un número<br>";
    } else {

        $numeros = [$_GET['num1'], $_GET['num2'], $_GET['num3'], $_GET['num4'], $_GET['num5']];
        echo "Los números intrgados: ";
        for ($i = 0; $i < count($numeros); $i++) {
            echo $numeros[$i] . "  ";
        }

        echo "<br> Min = " . min($numeros);
        echo "<br> Max = " . max($numeros);
    }
}
$random1 = rand(1, 100);
$random2 = rand(1, 100);
$random3 = rand(1, 100);
$random4 = rand(1, 100);
$random5 = rand(1, 100);
echo "<br><br>Pulsa en <a href='?num1=$random1&num2=$random2&num3=$random3&num4=$random4&num5=$random5'>random</a> para generar 5 números aleatorios";
?>