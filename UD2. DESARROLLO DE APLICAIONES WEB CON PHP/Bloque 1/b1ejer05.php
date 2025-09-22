<?php
if(!isset($_GET['numero'])) {
    echo "El numero no es encontrado<br>";
}else{
    if(!is_numeric($_GET['numero'])){
        echo "Valor '{$_GET['numero']}' no es un numero<br>";
    }else{
        $numero = $_GET['numero'];
      if($numero >= 0){
        echo "El numero {$numero} es positivo<br>";
      }else{
        echo "El numero {$numero} es negativo<br>";
      }
    }
}
$random=rand(-10, 10);
echo "Pulsa en <a href='?numero=$random'>random</a> para generar un random numero automaticamente<br>";
?>