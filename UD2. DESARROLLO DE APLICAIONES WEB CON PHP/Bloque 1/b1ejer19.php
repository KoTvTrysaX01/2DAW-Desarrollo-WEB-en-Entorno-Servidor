<?php
if (!isset($_GET['numero'])) {

    echo "No se pudo encontrar el número.<br>";

} else {
    if (!ctype_digit($_GET['numero'])) {
        echo "El valor no es un dígito.<br>";
    } elseif ($_GET['numero'] <= 0) {
        echo "El valor debe ser mayor que 1.<br>";
    } else {
        $numero = $_GET['numero'];
        echo "El número introducido: {$numero}.<br>Los numeros pares menores que el número:<br>";
        for ($i = $numero - 1; $i > 0; $i--) {
            if (($i % 2) == 0) {
                echo "{$i}<br>";
            }
        }
    }
}
$random = rand(1, 100);
echo "<br>Pulsa en <a href='?numero=$random'>random</a> para generar un número aleatorio<br>";
?>