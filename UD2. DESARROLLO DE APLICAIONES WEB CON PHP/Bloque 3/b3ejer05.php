<?php
if (!isset($_GET['numero'])) {
    echo "<h2>El valor de 'numero' no está establecido.</h2>";
} elseif (!ctype_digit($_GET['numero'])) {
    echo "<h2>El valor deben ser un número</h2>";
} else {
    $ceros = "00000000";
    $numero = $_GET['numero'];
    $resultado = substr($ceros, strlen($numero)) . $numero;
    echo $resultado;
}
$random = rand(1, 999999);
echo "<br><br>Pulsa en <a href='?numero=$random'>random</a> para generar un número aleatorio";
?>