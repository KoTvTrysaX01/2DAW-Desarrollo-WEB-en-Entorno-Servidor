<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $mensaje = "";
    if (!isset($_GET['altura_olas']) || !isset($_GET['dir_viento']) || !isset($_GET['temperatura'])) {
        $mensaje =  "Uno o más valores no están establecidos";
    } elseif (!is_numeric($_GET['altura_olas']) || !ctype_alpha($_GET['dir_viento']) || !is_numeric($_GET['temperatura'])) {
        $mensaje = "Los valores introducidos no son correctos";
    } else {
        $altura_olas = $_GET['altura_olas'];
        $dir_viento = strtolower($_GET['dir_viento']);
        $temperatura = $_GET['temperatura'];

        switch (true) {
            case (str_contains($dir_viento, 'e') || str_contains($dir_viento, 's')):
                if ($altura_olas < 1 && $temperatura < 20) {
                    $mensaje = "Nivel de Peligrosidad:  " . 4;
                } elseif ($altura_olas < 1 && $temperatura >= 20) {
                    $mensaje = "Nivel de Peligrosidad:  " . 3;
                } elseif ($altura_olas >= 1 && $temperatura < 20) {
                    $mensaje = "Nivel de Peligrosidad:  " . 5;
                } else {
                    $mensaje = "Nivel de Peligrosidad:  " . 4;
                }
                break;

            case (str_contains($dir_viento, 'o') || str_contains($dir_viento, 'n')):
                if ($altura_olas < 1 && $temperatura < 20) {
                    $mensaje = "Nivel de Peligrosidad:  " . 2;
                } elseif ($altura_olas < 1 && $temperatura >= 20) {
                    $mensaje = "Nivel de Peligrosidad:  " . 1;
                } elseif ($altura_olas >= 1 && $temperatura < 20) {
                    $mensaje = "Nivel de Peligrosidad:  " . 3;
                } else {
                    $mensaje = "Nivel de Peligrosidad:  " . 2;
                }
                break;

            default:
                $mensaje = "Un error";
                break;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bloque 6 - Ejercicio 2</title>
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
            <br>
            <div>
                <label for="altura_olas">¿Cual es la altura de las Olas? (0-2)</label>
                <input type="number" min=0 max=2 id="altura_olas" name="altura_olas" /><br><br>
            </div>

            <div>
                <label for="dir_viento">¿Cual es la dirección del viento?</label><br>
                <input type="radio" id="es" name="dir_viento" value="es">
                <label for="es">E, S</label><br>
                <input type="radio" id="on" name="dir_viento" value="on">
                <label for="on">O, N</label><br><br>
            </div>

            <div>
                <label for="temperatura">¿Cual es la temperatura? (15-25)</label>
                <input type="number" min=15 max=25 id="temperatura" name="temperatura" />
            </div>
            <br>

            <input type="submit" />
            <br>
        </div>
        <br><br>
        <h2 style='text-align: center;'> <?php echo $mensaje; ?></h2>
    </form>
</body>

</html>