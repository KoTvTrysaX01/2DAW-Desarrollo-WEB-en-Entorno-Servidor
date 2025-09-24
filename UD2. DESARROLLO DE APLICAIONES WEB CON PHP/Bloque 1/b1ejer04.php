<?php
if(!isset($_GET['mes'])) {
    echo "No se pudo encontrar el mes<br>";
}else{
    if(!ctype_digit($_GET['mes'])){
        echo "Valor '{$_GET['mes']}' no es un mes<br>";
    }else{
        $mes = $_GET['mes'];
        echo "El mes introducido: {$mes}.<br>";
        switch($mes){
            case 1:
                echo "Es Enero<br>";
                break;
            case 2:
                echo "Es Febrero<br>";
                break;
            case 3:
                echo "Es Marzo<br>";
                break;
            case 4:
                echo "Es Abril<br>";
                break;
            case 5:
                echo "Es Mayo<br>";
                break;
            case 6:
                echo "Es Junio<br>";
                break;
            case 7:
                echo "Es Julio<br>";
                break;
            case 8:
                echo "Es Agosto<br>";
                break;
            case 9:
                echo "Es Septiembre<br>";
                break;
            case 10:
                echo "Es Octubre<br>";
                break;
            case 11:
                echo "Es Noviembre<br>";
                break;
            case 12:
                echo "Es Diciembre<br>";
                break;
            default:
                echo "{$mes} no es un mes de la semana<br>";
				break;
        }
    }
}
$random=rand(1, 12);
echo "<br>Pulsa en <a href='?mes=$random'>random</a> para generar un mes aleatorio";
?>