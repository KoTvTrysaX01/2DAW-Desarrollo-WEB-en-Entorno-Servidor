<?php
if(!isset($_GET['date'])){
    echo "No se pudo encontrar la hora<br>";
}else{
    if(!is_string($_GET['date'])){
        echo "No se introdujo la hora / formato de hora extraño.<br>";
    }else{
        $date = $_GET['date'];
        echo "Hora introducida: {$date}<br>";
        $seconds = substr($date,6);
        $result = substr($date, 0, 6) . ($seconds + 1);
        echo "1 segundo más: {$result}<br>";
    }
}
$date = date("H:i:s");
echo "<br>Introducir la <a href='?date={$date}'>hora actual</a>";
?>