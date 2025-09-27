<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bloque 2 - Ejercicio 6</title>
</head>

<body>
    <form>
        <label for="fecha">La fecha:</label>
        <input type="date" id="fecha" name="fecha">
        <input type="submit">
    </form>
</body>

</html>

<?php
    if (!isset($_GET['fecha'])) {
    echo "<h3 style='text-align: center;' >Uno o más valores no están establecidos</h3>";
} else {
    $fecha = date_create($_GET['fecha']);
    echo "<h3>El día introducido: " . date_format($fecha, "Y-m-d")  . "</h3>";

    $manana = date('Y-m-d', strtotime(date_format($fecha,"Y/m/d") .' +1 day'));
    echo "<h3>El día siguiente: " . $manana . "</h3>";
}
?>