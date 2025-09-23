<?php
if (!isset($_GET['numero'])) {

    echo "El numero no han encontrado<br>";

} else {
    if (!ctype_digit($_GET['numero'])) {
        echo "El valor no es un digit<br>";
    } else {
        $numero = $_GET['numero'];
        echo "El numero introducido: {$numero}.<br>Los numeros pares menores que él:<br>";
        for($i = $numero; $i >= 0; $i--){
            if(($i % 2) == 0){
                echo "{$i}<br>";
            }
        }
    }
}
$random = rand(1, 100);
echo "<br>Pulsa en <a href='?numero=$random'>random</a> para generar un random number<br>";
?>