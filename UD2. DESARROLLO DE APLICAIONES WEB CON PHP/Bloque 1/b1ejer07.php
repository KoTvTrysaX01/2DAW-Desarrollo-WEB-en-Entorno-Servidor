<?php
if(!isset($_GET['numero'])) {
    echo "El numero no es encontrado<br>";
}else{
    if(!ctype_digit($_GET['numero'])){
        echo "Valor '{$_GET['numero']}' no es un numero<br>";
    }else{
        $numero = $_GET['numero'];
      if($numero > 100){
        echo "El numero {$numero} es mayor que 100<br>";
      }else if($numero < 100){
        echo "El numero {$numero} es menor que 100<br>";
      }else{
        echo "El numero {$numero} es equal a 100<br>";
      }
    }
}
$random=rand(1, 200);
echo "Pulsa en <a href='?numero=$random'>random</a> para generar un random char automaticamente<br>";
?>