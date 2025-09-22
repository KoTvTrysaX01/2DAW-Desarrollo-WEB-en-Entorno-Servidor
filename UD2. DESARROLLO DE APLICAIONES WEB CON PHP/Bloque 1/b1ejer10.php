<?php
if(!isset($_GET['num1']) || !isset($_GET['num2']) || !isset($_GET['num3'])) {
    echo "Missing value<br>";
}else{
    if(!ctype_digit($_GET['num1']) || !ctype_digit($_GET['num2']) || !ctype_digit($_GET['num3'])){
        echo "One of values is not a number<br>";
    }else{
        $num1 = $_GET['num1'];
        $num2 = $_GET['num2'];
        $num3 = $_GET['num3'];
        echo "{$num1} - {$num2} - {$num3}<br>";
        if($num1 > $num2 && $num2 > $num3){
            echo "Los numeros se han introducido en ordern decreciente<br>";
        }else{
            echo "Los numeros NO se han introducido en ordern decreciente<br>";
        }
    }
}
$random1 = rand(1,10);
$random2 = rand(1,10);
$random3 = rand(1,10);
echo "Pulsa en <a href='?num1=$random1&num2=$random2&num3=$random3'>random</a> para generar 3 random numbers<br>";
?>