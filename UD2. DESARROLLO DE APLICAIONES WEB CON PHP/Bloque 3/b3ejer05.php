<?php
if (!isset($_GET['numero'])) {
<<<<<<< HEAD
    echo "<h2>El valor de 'numero' no está establecido.</h2>";
} elseif (!ctype_digit($_GET['numero'])) {
    echo "<h2>El valor deben ser un número</h2>";
} else {
=======
    echo "<h2>No se pudo encontrar el valor</h2><br>";
}
elseif(!ctype_digit($_GET['numero'])) {
    echo "El valor no es un número <br>";
}else{
>>>>>>> dd5d9fc7a1f039d2cb388c0796c7f220d9f010fa
    $ceros = "00000000";
    $numero = $_GET['numero'];
    $resultado = substr($ceros, strlen($numero)) . $numero;
    echo $resultado;
}
$random = rand(1, 999999);
echo "<br><br>Pulsa en <a href='?numero=$random'>random</a> para generar un número aleatorio";
?>