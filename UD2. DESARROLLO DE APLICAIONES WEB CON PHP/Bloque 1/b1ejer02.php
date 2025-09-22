<?php
$random=rand(1, 10);
if(!isset($_GET['nota'])) {
    echo "La nota no es encontrado<br>";
    echo "Pulsa en <a href='?nota=$random'>random</a> para generar un random number<br>";
}else{
    if(!ctype_digit($_GET['nota'])){
        echo "Valor '{$_GET['nota']}' no es una nota<br>";
        echo "Pulsa en <a href='?nota=$random'>random</a> para generar un random number<br>";
    }else{
        $nota = $_GET['nota'];
        if($nota >= 5 ){
            echo "La nota es {$nota}. Aprobado.";
        }else{
            echo "La nota es {$nota}. Suspenso.";
        }
    }
}
?>