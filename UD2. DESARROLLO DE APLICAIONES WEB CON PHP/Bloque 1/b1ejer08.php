<?php
if(!isset($_GET['char'])) {
    echo "El char no es encontrado<br>";
}else{
    if(!ctype_alpha($_GET['char'])){
        echo "Valor '{$_GET['char']}' no es un char<br>";
    }else{
        $char = strtolower($_GET['char']);
        if(str_contains("aoiuye", $char)){
            echo "El char {$char} es vocal<br>";
        }else{
            echo "El char {$char} es consonante<br>";
        }
    }
}
$random = chr(rand(97,122));
echo "Pulsa en <a href='?char=$random'>random</a> para generar un random char automaticamente<br>";
?>