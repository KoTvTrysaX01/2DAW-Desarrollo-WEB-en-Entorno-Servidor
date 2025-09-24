<?php
if(!isset($_GET['letra'])) {
    echo "No se pudo encontrar la letra<br>";
}else{
    if(!ctype_alpha($_GET['letra'])){
        echo "Valor '{$_GET['letra']}' no es una letra<br>";
    }else{
        $letra = strtolower($_GET['letra']);
        if(preg_match("/a|o|i|u|y|e/", $letra)){
            echo "El letra {$letra} es vocal.<br>";
        }else{
            echo "El letra {$letra} es consonante.<br>";
        }
    }
}
$random = chr(rand(97,122));
echo "<br>Pulsa en <a href='?letra=$random'>random</a> para generar una letra aleatioria";
?>