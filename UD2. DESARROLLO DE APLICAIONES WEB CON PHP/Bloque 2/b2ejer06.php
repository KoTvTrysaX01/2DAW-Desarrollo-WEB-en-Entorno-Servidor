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
    echo "<h2 style='text-align: center;' >Uno o más valores no están establecidos</h2>";
} else {
    $fecha = date_create($_GET['fecha']);
    date_add($fecha, date_interval_create_from_date_string("1 day"));
    echo date_format($fecha,"Y/m/d");
}
?>