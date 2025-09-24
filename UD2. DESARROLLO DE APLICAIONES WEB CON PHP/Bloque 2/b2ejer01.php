<?php
if (!isset($_GET['numero'])) {
    echo "No se pudo encontrar el número<br>";
} else {
    if (!ctype_digit($_GET['numero'])) {
        echo "El valor no es un número<br>";
    } else {
        $numero = $_GET['numero'];
        echo "El número introducido: {$numero}<br>";
        for($i = 1; $i <= 10; $i++){
            echo"{$numero} x {$i} = " . $numero * $i . "<br>";
        }
    }
}
$random = rand(1, 10);
echo "<br>Pulsa en <a href='?numero=$random'>random</a> para generar un número aleatorio";
?>