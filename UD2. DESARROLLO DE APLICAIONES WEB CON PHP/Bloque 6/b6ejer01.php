<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $mensaje = "";
    if (!isset($_GET['temporada']) || !isset($_GET['num_noches']) || !isset($_GET['habitacion'])) {
        $mensaje =  "Uno o más valores no están establecidos";
    } elseif (!ctype_alpha($_GET['temporada']) || !is_numeric($_GET['num_noches']) || !ctype_alpha($_GET['habitacion'])) {
        $mensaje = "Los valores introducidos no son correctos";
    } else {
        $temporada = $_GET['temporada'];
        $num_noches = $_GET['num_noches'];
        $habitacion = $_GET['habitacion'];
        $total = 0;

        if ($habitacion === "vistas" || $habitacion === "interior") {
            switch ($habitacion) {
                case "vistas":
                    $total = $num_noches * 80;
                    break;
                case "interior":
                    $total = $num_noches * 60;
                    break;
            }
            switch ($temporada) {
                case "alta":
                    // $total = $total + ($total / 100 * 20);
                    $mensaje = "Su total es: " . $total + ($total / 100 * 20) . "€";
                    break;
                case "media":
                    // $total = $total;
                    $mensaje = "Su total es: " . $total . "€";
                    break;
                case "baja":
                    // $total = $total - ($total / 100 * 10);
                    $mensaje = "Su total es: " . $total - ($total / 100 * 20) . "€";
                    break;
                default:
                    $mensaje = "Temporada no reconocida";
                    break;
            }
        } else {
            $mensaje = "Habitacion no reconocida";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bloque 6 - Ejercicio 1</title>
    <style>
        .container {
            border: 1px solid black;
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>

<body>
    <form style="text-align: center;">
        <h1>¡Bienvenido a nuestro hotel!</h1>
        <div class="container">
            <p>Elige la temporada:</p>
            <div>
                <input type="radio" id="alta" name="temporada" value="alta">
                <label for="alta">Alta</label>
                <input type="radio" id="media" name="temporada" value="media">
                <label for="media">Media</label>
                <input type="radio" id="baja" name="temporada" value="baja">
                <label for="baja">Baja</label>
            </div>
        </div>
        <br>
        <div class="container">
            <p>El número de noches: </p>
            <div>
                <input type="range" id="num_noches" name="num_noches" value="5" min="1" max="30" oninput="this.nextElementSibling.value = this.value">
                <output>5</output>
            </div>
        </div>
        <br>
        <div class="container">
            <p>El tipo de habitación:</p>
            <div>
                <input type="radio" id="vistas" name="habitacion" value="vistas">
                <label for="vistas">Vistas</label>
                <input type="radio" id="interior" name="habitacion" value="interior">
                <label for="interior">Interior</label>
            </div>
        </div>
        <br>
        <input type="submit" />
        <br><br>
        <h2 style='text-align: center;'> <?php echo $mensaje; ?></h2>
    </form>
</body>

</html>