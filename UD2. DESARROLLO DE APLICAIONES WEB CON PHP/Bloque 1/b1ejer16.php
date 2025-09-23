<?php
if(!isset($_GET['importe'])) {
    echo "El importe no ha encontrado.<br>";
}else{
    if(!ctype_digit($_GET['importe'])){
        echo "El importe no es un digito<br>";
    }else{
        $importe = $_GET['importe'];
        echo "El importe bruto: " . number_format($importe) ."€<br><br>";

        if(($importe >= 15000) ){
            echo "Impuestos: 16%.<br>Importe neto: " . number_format($importe) . "€ - 16% = " . number_format($importe - ($importe / 100 * 16)) . "€<br>";
        }else{
            echo "Impuestos: 10%.<br>Importe neto: " . number_format($importe) . "€ - 10% = " . number_format($importe - ($importe / 100 * 10)) . "€<br>";
        }
    }
}
$random = rand(10000,20000);
echo "<br>Pulsa en <a href='?importe=$random'>random</a> para generar un importe bruto random<br>";
?>