<?php
if (!isset($_GET['dias'])) {
    echo "<h2>No se pudo encontrar el valor</h2><br>";
}
elseif(!ctype_digit($_GET['dias'])) {
    echo "<h2>El valor deben ser un número</h2>";
}else{
    $dias = $_GET['dias'];
    echo "El número de dias introducidos: " . $dias . "<br>";

    $parts = explode('-', date("d-m-y"));
    $nextday = date('d-m-Y', mktime(0,0,0, $parts[1], $parts[0] + $dias, $parts[2]));
    echo "En " . $dias . " días a partir de hoy será " . $nextday;
}
$random = rand(1, 100);
echo "<br><br>Pulsa en <a href='?dias=$random'>random</a> para generar un número de dias aleatorio";
?>