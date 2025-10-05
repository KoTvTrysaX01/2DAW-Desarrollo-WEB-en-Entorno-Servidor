<?php
<<<<<<< HEAD
if (!isset($_GET['num1']) || !isset($_GET['num2']) || !isset($_GET['num3']) || !isset($_GET['num4']) || !isset($_GET['num5'])) {
    echo "<h2>Uno o más valores no están establecidos. Especifique el valor de num1, num2, num3, num4 y num5</h2>";
=======
if (!isset($_GET['num1']) || !isset($_GET['num3']) || !isset($_GET['num3'])) {
    echo "<h2>No se pudo encontrar los 3 números</h2><br>";
>>>>>>> dd5d9fc7a1f039d2cb388c0796c7f220d9f010fa
} else {
    if (!ctype_digit($_GET['num1']) || !ctype_digit($_GET['num2']) || !ctype_digit($_GET['num3']) || !ctype_digit($_GET['num4']) || !ctype_digit($_GET['num5'])) {
        echo "<h2>Los valores deben ser números</h2>";
    } else {

        $numeros = [$_GET['num1'], $_GET['num2'], $_GET['num3'], $_GET['num4'], $_GET['num5']];
        echo "Los valores especificados: ";
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
<<<<<<< HEAD
?>
=======
?>
>>>>>>> dd5d9fc7a1f039d2cb388c0796c7f220d9f010fa
