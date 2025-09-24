<?php
if(!isset($_GET['nota'])) {
    echo "No se pudo encontrar la nota<br>";
}else{
    if(!ctype_digit($_GET['nota'])){
        echo "Valor '{$_GET['nota']}' no es una nota<br>";
    }else{
        $nota = $_GET['nota'];
        if($nota >= 5 ){
            echo "La nota es {$nota}. Aprobado.<br>";
        }else{
            echo "La nota es {$nota}. Suspenso.<br>";
        }
    }
}
$random=rand(1, 10);
echo "<br>Pulsa en <a href='?nota=$random'>random</a> para generar una nota aleatoria";
?>