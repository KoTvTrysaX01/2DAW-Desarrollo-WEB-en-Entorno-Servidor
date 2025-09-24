<?php
if (!isset($_GET['numero'])) {
    echo "No se pudo encontrar el número<br>";
} else {
    if (!ctype_digit($_GET['numero'])) {
        echo "El valor no es un número<br>";
    } else {
        $numero = $_GET['numero'];
        if ($numero % 2 == 0) {
            echo "El número {$numero} es par<br>";
        } else {
            echo "El número {$numero} es impar<br>";
        }
    }
}
$random = rand(1, 100);
echo "<br>Pulsa en <a href='?numero=$random'>random</a> para generar un número aleatorio";
?>