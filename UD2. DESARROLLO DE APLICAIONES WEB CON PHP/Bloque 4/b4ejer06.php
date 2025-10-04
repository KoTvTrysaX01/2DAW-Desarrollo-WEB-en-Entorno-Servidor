<?php
$meses = [9, 12, 0, 6, 7, 0, 4, 3, 5, 6, 8, 17];
for ($i = 0; $i < 12; $i++) {
    if ($meses[$i] != 0) {
        switch ($i + 1) {
            case 1:
                echo $i + 1 . ". En Enero se han visto " . $meses[$i] . " películas<br>";
                break;
            case 2:
                echo $i + 1 . ". En Febrero se han visto " . $meses[$i] . " películas<br>";
                break;
            case 3:
                echo $i + 1 . ". En Abril se han visto " . $meses[$i] . " películas<br>";
                break;
            case 4:
                echo $i + 1 . ". En Marzo se han visto " . $meses[$i] . " películas<br>";
                break;
            case 5:
                echo $i + 1 . ". En Mayo se han visto " . $meses[$i] . " películas<br>";
                break;
            case 6:
                echo $i + 1 . ". En Junio se han visto " . $meses[$i] . " películas<br>";
                break;
            case 7:
                echo $i + 1 . ". En Julio se han visto " . $meses[$i] . " películas<br>";
                break;
            case 8:
                echo $i + 1 . ". En Agosto se han visto " . $meses[$i] . " películas<br>";
                break;
            case 9:
                echo $i + 1 . ". En Septiembre se han visto " . $meses[$i] . " películas<br>";
                break;
            case 10:
                echo $i + 1 . ". En Octubre se han visto " . $meses[$i] . " películas<br>";
                break;
            case 11:
                echo $i + 1 . ". En Noviembre se han visto " . $meses[$i] . " películas<br>";
                break;
            case 12:
                echo $i + 1 . ". En Diciembre se han visto " . $meses[$i] . " películas";
                break;
            default:
                echo $i + 1 . ". Error<br>";
                break;
        }
    }
}
?>