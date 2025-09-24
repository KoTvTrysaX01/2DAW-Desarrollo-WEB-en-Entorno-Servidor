<?php
if(!isset($_GET['numero'])) {
    echo "No se pudo encontrar el número<br>";
}else{
    if(!is_numeric($_GET['numero'])){
        echo "Valor '{$_GET['numero']}' no es un número<br>";
    }else{
        $numero = $_GET['numero'];
      if($numero >= 0){
        echo "El número {$numero} es positivo<br>";
      }else{
        echo "El número {$numero} es negativo<br>";
      }
    }
}
$random=rand(-10, 10);
echo "<br>Pulsa en <a href='?numero=$random'>random</a> para generar un número aleatorio";
?>