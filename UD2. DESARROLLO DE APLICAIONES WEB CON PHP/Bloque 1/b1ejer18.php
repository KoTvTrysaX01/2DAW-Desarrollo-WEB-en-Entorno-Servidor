<?php
if (!isset($_GET['años'])) {

    echo "Los años no han encontrado<br>";

} else {
    if (!ctype_digit($_GET['años'])) {
        echo "El valor no es un numero<br>";
    } else {
        $años = $_GET['años'];
        switch($años){
            case $años < 3:
                echo"Aumento de 3%<br>Tú salario: 40.000€ + 3% = " . 40000 + (40000 / 100 * 3) . "€";
                break;
            case $años < 5:
                echo"Aumento de 5%<br>Tú salario: 40.000€ + 5% = " . 40000 + (40000 / 100 * 5) . "€";
                break;
            case $años < 10:
                echo"Aumento de 7%<br>Tú salario: 40.000€ + 7% = " . 40000 + (40000 / 100 * 7) . "€";
                break;
            case $años >= 10:
                echo"Aumento de 10%<br>Tú salario: 40.000€ + 10% = " . 40000 + (40000 / 100 * 10) . "€";
                break;
            default:
                echo "Unknown value";
                break; 
        }
    }
}
$random = rand(1, 12);
echo "<br>Pulsa en <a href='?años=$random'>random</a> para generar un random number<br>";
?>