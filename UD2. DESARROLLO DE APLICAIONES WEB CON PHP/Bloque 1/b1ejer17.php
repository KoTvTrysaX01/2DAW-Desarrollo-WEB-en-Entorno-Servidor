<?php
if(!isset($_GET['date'])){
    echo "Hora no introducido";
}else{
    if(!is_string($_GET['date'])){
        echo "Weird time format";
    }else{
        $date = $_GET['date'];
        echo "Hora introducida: {$date}<br>";
        $seconds = substr($date,6);
        $result = substr($date, 0, 6) . ($seconds + 1);
        echo "Mas 1 segundo: {$result}";
    }
}
$date = date("H:i:s");
echo "<br><a href='?date={$date}'>Current time</a>";
?>