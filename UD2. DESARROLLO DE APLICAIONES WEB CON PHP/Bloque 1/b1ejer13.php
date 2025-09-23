<?php
if(!isset($_GET['num1']) || !isset($_GET['num1'])) {
    echo "The numbers were not found.<br>";
}else{
    if(!ctype_digit($_GET['num1']) || !ctype_digit($_GET['num2'])){
        echo "Number(s) is not a digit<br>";
    }else{
        $num1 = $_GET['num1'];
        $num2 = $_GET['num2'];
        echo "Numbers: {$num1} - {$num2}<br>";
        if(($num1 % 2 == 0) && ($num2 % 2 == 0)){
            echo "The numbers are par<br>";
        }else{
            echo "The number(s) is/are not par<br>";
        }
    }
}
$random1 = rand(1,10);
$random2 = rand(1,10);
echo "Pulsa en <a href='?num1=$random1&num2=$random2'>random</a> para generar 2 random numbers<br>";
?>