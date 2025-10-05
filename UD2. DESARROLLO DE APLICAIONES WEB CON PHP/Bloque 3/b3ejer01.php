<?php
if (!isset($_GET['num1']) || !isset($_GET['num2'])) {
    echo "<h2>Uno o más valores no están establecidos. Especifique el valor de num1 y num2</h2>";
} elseif (ctype_alpha($_GET['num1']) || ctype_alpha($_GET['num2'])) {
<<<<<<< HEAD
    echo "<h2>Los valores deben ser números</h2>";
=======
    echo "<h2 style='text-align: center;' >Los valores deben ser numericos</h2>";
>>>>>>> dd5d9fc7a1f039d2cb388c0796c7f220d9f010fa
} else {
    $num1 = $_GET['num1'];
    $num2 = $_GET['num2'];
    $resultado = $num1 / $num2;
    echo number_format($resultado, 3, ",", ".");
}
?>