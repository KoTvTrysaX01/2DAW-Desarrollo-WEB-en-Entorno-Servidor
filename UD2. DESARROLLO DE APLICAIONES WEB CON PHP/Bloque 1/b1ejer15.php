<?php
if(!isset($_GET['num1']) || !isset($_GET['num1']) || !isset($_GET['num3'])) {
    echo "No se encontraron los números.<br>";
}else{
    if(!ctype_digit($_GET['num1']) || !ctype_digit($_GET['num2']) || !ctype_digit($_GET['num3'])){
        echo "Uno de los valores no es un dígito<br>";
    }else{
        $num1 = $_GET['num1'];
        $num2 = $_GET['num2'];
        $num3 = $_GET['num3'];
        echo "Los números: {$num1} - {$num2} - {$num3}<br><br>";

        if(($num1 / $num2) == $num3){
            echo "¡CORRECTO!<br>{$num1} / {$num2} = {$num3}<br>";
        }else{
            echo "¡INCORRECTO!<br>{$num1} / {$num2} != {$num3}<br>";
        }
    }
}
$random1 = rand(1,10);
$random2 = rand(1,10);
$random3 = rand(1,10);
echo "<br>Pulsa en <a href='?num1=$random1&num2=$random2&num3=$random3'>random</a> para generar 3 números aleatorios";
?>