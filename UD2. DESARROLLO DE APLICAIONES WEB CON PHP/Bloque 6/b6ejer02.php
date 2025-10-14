<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bloque 2 - Ejercicio 4</title>
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
        </div>
    </form>
</body>

</html>


<?php
if (!isset($_GET['altura_olas']) || !isset($_GET['dir_viento']) || !isset($_GET['temperatura'])) {
    echo "<h2 style='text-align: center;' >Uno o más valores no están establecidos</h2>";
} else {
    $altura_olas = $_GET['altura_olas'];
    $dir_viento = $_GET['dir_viento'];
    $temperatura = $_GET['temperatura'];

    switch($dir_viento){
        case "es":
            if($altura_olas < 1 && $temperatura < 20){
                echo "<h2 style='text-align: center;'> Nivel de Peligrosidad:  " . 4 . "</h2>";
            }
            elseif($altura_olas < 1 && $temperatura >= 20){
                echo "<h2 style='text-align: center;'> Nivel de Peligrosidad:  " . 3 . "</h2>";
            }
            elseif($altura_olas >= 1 && $temperatura < 20){
                echo "<h2 style='text-align: center;'> Nivel de Peligrosidad:  " . 5 . "</h2>";
            }
            else{
                echo "<h2 style='text-align: center;'> Nivel de Peligrosidad:  " . 4 . "</h2>";
            }
            break;

        case "on":
            if($altura_olas < 1 && $temperatura < 20){
                echo "<h2 style='text-align: center;'> Nivel de Peligrosidad:  " . 2 . "</h2>";
            }
            elseif($altura_olas < 1 && $temperatura >= 20){
                echo "<h2 style='text-align: center;'> Nivel de Peligrosidad:  " . 1 . "</h2>";
            }
            elseif($altura_olas >= 1 && $temperatura < 20){
                echo "<h2 style='text-align: center;'> Nivel de Peligrosidad:  " . 3 . "</h2>";
            }
            else{
                echo "<h2 style='text-align: center;'> Nivel de Peligrosidad:  " . 2 . "</h2>";
            }
            break;

        default:
            echo "Un error";
            break;
    }
}
?>