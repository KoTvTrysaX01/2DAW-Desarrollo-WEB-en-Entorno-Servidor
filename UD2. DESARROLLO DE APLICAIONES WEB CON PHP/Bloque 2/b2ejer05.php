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
                <label for="centimos">Cantidad de centimos: </label>
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
        echo $euro . "," . $centimos . "€<br>";

        $dos_euros;
        $un_euro;

        // $cincuenta_cent = 0;
        // $vente_cent = 0;
        // $diez_cent = 0;
        // $cinco_cent = 0;
        // $dos_cent = 0;
        // $un_cent = 0;

        while ($euro != 0) {
            if(($euro % 2) == 1){
                $un_euro++;
                $euro--;
            }else{
                $dos_euro++;
                $euro -2;
            }
        }


        // while ($centimos != 0) {
        //     if(($centimos - 50) >= 0){
        //         $cincuenta_cent += 1;
        //         $centimos -= -50;
        //     }
        //     elseif(($centimos - 20) >= 0){
        //         $vente_cent += 1;
        //         $centimos -= 20;
        //     }
        //     elseif(($centimos - 10) >= 0){
        //         $diez_cent += 1;
        //         $centimos -= 10;
        //     }
        //     elseif(($centimos - 5) >= 0){
        //         $cinco_cent += 1;
        //         $centimos -= 5;
        //     }
        //     elseif(($centimos - 2) >= 0){
        //         $dos_cent += 1;
        //         $centimos -= 2;
        //     }
        //     elseif(($centimos - 1) >= 0){
        //         $un_cent += 1;
        //         $centimos--;
        //     }
        // }

        echo "Dos euros: ". $dos_euros . "<br>";
        echo "Un euro: " . $un_euro  . "<br>";

        echo "Cincuenta centimos: ". $cincuenta_cent . "<br>";
        echo "Vente centimos: " . $vente_cent  . "<br>";
        echo "Diez centimos: ". $diez_cent . "<br>";
        echo "Cinco centimos: " . $cinco_cent  . "<br>";
        echo "Dos centimos: ". $dos_cent . "<br>";
        echo "Un centimo: " . $un_cent  . "<br>";
    }
}
?>