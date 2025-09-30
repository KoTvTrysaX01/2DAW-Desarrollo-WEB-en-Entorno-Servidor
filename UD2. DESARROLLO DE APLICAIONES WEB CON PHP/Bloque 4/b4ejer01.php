<?php
if (!isset($_GET['num1']) || !isset($_GET['num3']) || !isset($_GET['num3'])) {
    echo "No se pudo encontrar los 3 números<br>";
} else {
    if (!ctype_digit($_GET['num1']) || !ctype_digit($_GET['num2']) || !ctype_digit($_GET['num3']) || !ctype_digit($_GET['num4']) || !ctype_digit($_GET['num5'])) {
        echo "Uno de los valores no es un número<br>";
    } else {

        $numeros = [$_GET['num1'], $_GET['num2'], $_GET['num3'], $_GET['num4'], $_GET['num5'], $_GET['num6'], $_GET['num7'], $_GET['num8'], $_GET['num9'], $_GET['num10']];
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
$random6 = rand(1, 100);
$random7 = rand(1, 100);
$random8 = rand(1, 100);
$random9 = rand(1, 100);
$random10 = rand(1, 100);
echo "<br>Pulsa en <a href='?num1=$random1&num2=$random2&num3=$random3&num4=$random4&num5=$random5&num6=$random6&num7=$random7&num8=$random8&num9=$random9&num10=$random10'>random</a> para generar 10 números aleatorios";
?>