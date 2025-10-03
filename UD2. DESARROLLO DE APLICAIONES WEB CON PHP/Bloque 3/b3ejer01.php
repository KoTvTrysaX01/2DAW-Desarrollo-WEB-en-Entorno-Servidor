<?php
if (!isset($_GET['num1']) || !isset($_GET['num2'])) {
    echo "<h2 style='text-align: center;' >Uno o más valores no están establecidos</h2>";
} elseif (ctype_alpha($_GET['num1']) || ctype_alpha($_GET['num2'])) {
    echo "<h2 style='text-align: center;' >Los valores deben ser numericos</h2>";
} else {
    $num1 = $_GET['num1'];
    $num2 = $_GET['num2'];
    $resultado = $num1 / $num2;
    echo number_format($resultado, 3, ",", ".");
}
?>