<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $mensaje = "";
    if (!isset($_GET['euros']) || !isset($_GET['centimos'])) {
        $mensaje = "Uno o más valores no están establecidos";
    } elseif (!is_numeric($_GET['euros']) || !is_numeric($_GET['centimos'])) {
        $mensaje = "Los valores introducidos no son correctos";
    } else {
        $euro = $_GET['euros'];
        $centimos = $_GET['centimos'];
        $mensaje =  "Cantidad ingresada: " . $euro . "," . $centimos . "€";

        $monedas = array(
            'Dos euros' => 0,
            'Un euro' => 0,
            'Cincuenta céntimos' => 0,
            'Veinte céntimos' => 0,
            'Diez céntimos' => 0,
            'Cinco céntimos' => 0,
            'Dos céntimos' => 0,
            'Un céntimo' => 0
        );

        for ($i = $euro; $i > 0; $i) {
            if ($i >= 2) {
                $monedas['Dos euros']++;
                $i -= 2;
            } else {
                $monedas['Un euro']++;
                $i -= 1;
            }
        }

        for ($i = $centimos; $i > 0; $i) {
            if ($i >= 50) {
                $monedas['Cincuenta céntimos']++;
                $i -= 50;
            } elseif ($i >= 20) {
                $monedas['Veinte céntimos']++;
                $i -= 20;
            } elseif ($i >= 10) {
                $monedas['Diez céntimos']++;
                $i -= 10;
            } elseif ($i >= 5) {
                $monedas['Cinco céntimos']++;
                $i -= 5;
            } elseif ($i >= 2) {
                $monedas['Dos céntimos']++;
                $i -= 2;
            } else {
                $monedas['Un céntimo']++;
                $i -= 1;
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bloque 6 - Ejercicio 3</title>
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
        <h2 style='text-align: center;'> <?php echo $mensaje; ?></h2>
        <?php
        if(isset($monedas)){
            echo "<p style='text-align: center; font-weight: bold;'>La cantidad mínima de monedas: </p>";
            foreach ($monedas as $clave => $moneda) {
                if (!($moneda === 0)) {
                    echo "<p style='text-align: center;'>" . $clave . " = " . $moneda . "</p>";
                }
            }
        }
        ?>
    </form>
</body>

</html>