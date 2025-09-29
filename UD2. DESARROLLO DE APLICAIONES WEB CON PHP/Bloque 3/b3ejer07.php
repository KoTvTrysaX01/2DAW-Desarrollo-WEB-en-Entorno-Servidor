<?php
if (!isset($_GET['dias'])) {
    echo "No se pudo encontrar el valor <br>";
}
elseif(!ctype_digit($_GET['dias'])) {
    echo "El valor no es un número <br>";
}else{
    $dias = $_GET['dias'];
    echo "El número de dias introducidos: " . $dias . "<br>";

    $parts = explode('-', date("d-m-y"));
    $nextday = date('d-m-Y', mktime(0,0,0, $parts[1], $parts[0] + $dias, $parts[2]));
    echo $nextday;
}
$random = rand(1, 100);
echo "<br>Pulsa en <a href='?dias=$random'>random</a> para generar un número de dias aleatorio";
?>