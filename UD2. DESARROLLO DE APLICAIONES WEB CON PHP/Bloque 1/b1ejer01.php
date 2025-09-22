<?php 
if(!isset($_GET['numero'])) {
    $random=rand(1, 100);
    echo "El número no es encontrado<br>";
    echo "Pulsa en <a href='?numero=$random'>rando,</a> para generar un random number<br>";
}else{
    if(!ctype_digit($_GET['numero'])){
        echo "El valor no es un numero<br>";
        echo "Pulsa en <a href='?numero=$random'>rando,</a> para generar un random number<br>";
    }else{
        $numero = $_GET['numero'];
        if($numero % 2 == 0){
            echo "El numero {$numero} es par";
        }else{
            echo "El numero {$numero} es impar";
        }
    }
}
?>