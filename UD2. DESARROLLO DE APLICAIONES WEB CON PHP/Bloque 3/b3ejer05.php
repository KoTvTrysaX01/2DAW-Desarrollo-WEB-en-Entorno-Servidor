<?php
if (!isset($_GET['numero'])) {
    echo "No se pudo encontrar el valor <br>";
}
elseif(!ctype_digit($_GET['numero'])) {
    echo "El valor no es un número <br>";
}else{
    $ceros = "00000000";
    $numero = $_GET['numero'];
    $resultado = substr($ceros, strlen($numero)) . $numero;
    echo $resultado;
}
$random = rand(1, 999999);
echo "<br>Pulsa en <a href='?numero=$random'>random</a> para generar un número aleatorio";
?>