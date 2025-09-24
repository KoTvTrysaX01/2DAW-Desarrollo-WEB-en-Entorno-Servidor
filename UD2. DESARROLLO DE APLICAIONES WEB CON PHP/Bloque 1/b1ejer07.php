<?php
if(!isset($_GET['numero'])) {
    echo "No se encontró el número<br>";
}else{
    if(!ctype_digit($_GET['numero'])){
        echo "Valor '{$_GET['numero']}' no es un número<br>";
    }else{
        $numero = $_GET['numero'];
      if($numero > 100){
        echo "El número {$numero} es MAYOR que 100<br>";
      }else if($numero < 100){
        echo "El número {$numero} es MENOR que 100<br>";
      }else{
        echo "El número {$numero} es equal a 100<br>";
      }
    }
}
$random=rand(1, 200);
echo "<br>Pulsa en <a href='?numero=$random'>random</a> para generar un número aleatorio";
?>