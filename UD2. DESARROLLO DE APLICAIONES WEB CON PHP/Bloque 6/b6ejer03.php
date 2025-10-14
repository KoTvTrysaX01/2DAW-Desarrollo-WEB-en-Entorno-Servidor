<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bloque 2 - Ejercicio 5</title>
    <style>
        .container {
            border: 1px solid black;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>
<body>
    <form>
        <div class="container">
            <div>
                <br>
                <label for="euros">Cantidad de euros: </label>
                <input type="number" min=0 max=5 id="euros" name="euros" value="0" />
            </div>
            <br>
            <div>
                <label for="centimos">Cantidad de céntimos: </label>
                <input type="number" min=0 max=99 id="centimos" name="centimos" value="0" />
            </div>
            <br>
            <input type="submit" />
            <br>
        </div>
    </form>
</body>
</html>

<?php
if (!isset($_GET['euros']) || !isset($_GET['centimos'])) {
    echo "<h2 style='text-align: center;' >Uno o más valores no están establecidos</h2>";
} else {
    if ($_GET['euros'] == "" || $_GET['centimos'] == "") {
        echo "<h2 style='text-align: center;' >Uno o más valores no están establecidos</h2>";
    } else {
        $euro = $_GET['euros'];
        $centimos = $_GET['centimos'];
        echo "<br>Cantidad ingresada: " . $euro . "," . $centimos . "€<br>";
        echo "La mínima cantidad de monedas: <br><br>";

        // $dos_euros = 0;
        // $un_euro = 0;
        // $cincuenta_cent = 0;
        // $vente_cent = 0;
        // $diez_cent = 0;
        // $cinco_cent = 0;
        // $dos_cent = 0;
        // $un_cent = 0;

        $monedas = [0, 0, 0, 0, 0, 0, 0, 0];
        for ($i = $euro; $i > 0; $i) {
            if ($i >= 2) {
                $monedas[0]++;
                $i -= 2;
            } else {
                $monedas[1]++;
                $i -= 1;
            }
        }

        for ($i = $centimos; $i > 0; $i) {
            if ($i >= 50) {
                $monedas[2]++;
                $i -= 50;
            } elseif ($i >= 20) {
                $monedas[3]++;
                $i -= 20;
            } elseif ($i >= 10) {
                $monedas[4]++;
                $i -= 10;
            } elseif ($i >= 5) {
                $monedas[5]++;
                $i -= 5;
            } elseif ($i >= 2) {
                $monedas[6]++;
                $i -= 2;
            } else{
                $monedas[7]++;
                $i -= 1;
            }
        }
        echo "Dos euros: " . $monedas[0] . "<br>";
        echo "Un euro: " . $monedas[1]  . "<br><br>";
        echo "Cincuenta céntimos: ". $monedas[2] . "<br>";
        echo "Veinte céntimos: " . $monedas[3]  . "<br>";
        echo "Diez céntimos: ". $monedas[4] . "<br>";
        echo "Cinco céntimos: " . $monedas[5]  . "<br>";
        echo "Dos céntimos: ". $monedas[6] . "<br>";
        echo "Un céntimo: " . $monedas[7]  . "<br>";
    }
}
?>