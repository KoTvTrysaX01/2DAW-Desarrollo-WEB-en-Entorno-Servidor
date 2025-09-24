<?php
if(!isset($_GET['letra'])) {
    echo "No se pudo encontrar la letra<br>";
}else{
    if(!ctype_alpha($_GET['letra'])){
        echo "Valor '{$_GET['letra']}' no es una letra<br>";
    }else{
        $letra = strtoupper($_GET['letra']);
      if($letra === 'S'){
        echo "El letra {$letra} = 'S'<br>";
      }else if($letra === 'N'){
        echo "El letra {$letra} = 'N'<br>";
      }else{
        echo "El letra {$letra} no es ni 'S' ni 'N'<br>";
      }
    }
}
$random = chr(rand(97,122));
echo "<br>Pulsa en <a href='?letra=$random'>random</a> para generar una letra aleatioria";
?>