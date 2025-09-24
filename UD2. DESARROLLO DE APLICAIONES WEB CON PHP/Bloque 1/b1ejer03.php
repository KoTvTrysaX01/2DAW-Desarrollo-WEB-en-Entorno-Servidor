<?php
if(!isset($_GET['dia'])) {
    echo "No se pudo encontrar el día<br>";
}else{
    if(!ctype_digit($_GET['dia'])){
        echo "Valor '{$_GET['dia']}' no es un dia<br>";
    }else{
        $dia = $_GET['dia'];
        echo "El día introducido: {$dia}<br>";
        switch($dia){
            case 1:
                echo "Es Lunes<br>";
                break;
            case 2:
                echo "Es Martes<br>";
                break;
            case 3:
                echo "Es Miercoles<br>";
                break;
            case 4:
                echo "Es Jueves<br>";
                break;
            case 5:
                echo "Es Viernes<br>";
                break;
            case 6:
                echo "Es Sabado<br>";
                break;
            case 7:
                echo "Es Domingo<br>";
                break;
            default:
                echo "{$dia} no es un dia de la semana<br>";
                break;
        }
    }
}
$random=rand(1, 7);
echo "<br>Pulsa en <a href='?dia=$random'>random</a> para generar un día aleatorio";
?>