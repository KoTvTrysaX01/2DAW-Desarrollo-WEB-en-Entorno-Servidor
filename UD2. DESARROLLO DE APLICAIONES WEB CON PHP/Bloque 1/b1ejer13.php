<?php
if(!isset($_GET['num1']) || !isset($_GET['num1'])) {
    echo "No se encontraron los números.<br>";
}else{
    if(!ctype_digit($_GET['num1']) || !ctype_digit($_GET['num2'])){
        echo "Uno de los valores no es un dígito<br>";
    }else{
        $num1 = $_GET['num1'];
        $num2 = $_GET['num2'];
        echo "Los números: {$num1} - {$num2}<br>";
        if(($num1 % 2 == 0) && ($num2 % 2 == 0)){
            echo "Los números son pares.<br>";
        }elseif(($num1 % 2 != 0) && ($num2 % 2 != 0)){
            echo "Los números son impares.<br>";
        }
        else{
            echo "Uno de los números es par y otro es impar.<br>";
        }
    }
}
$random1 = rand(1,10);
$random2 = rand(1,10);
echo "Pulsa en <a href='?num1=$random1&num2=$random2'>random</a> para generar 2 números aleatorios.<br>";
?>