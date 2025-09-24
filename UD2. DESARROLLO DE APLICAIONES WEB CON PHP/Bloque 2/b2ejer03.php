<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bloque 2 - Ejercicio 3</title>
</head>

<body>
    <h1>Welcome to our Hotel!</h1>
    <form>
        <div>
            <p>Elige la temporada:</p>
            <input type="radio" id="alta" name="temporada" value="Alta">
            <label for="alta">Alta</label><br>
            <input type="radio" id="media" name="temporada" value="Media">
            <label for="media">Media</label><br>
            <input type="radio" id="baja" name="temporada" value="Baja">
            <label for="baja">Baja</label>
        </div>
        <br>
        <div>
            <p>El número de noches:</p>
            <label for="nun_noches">Noches (1-30):</label>
            <input type="range" id="nun_noches" name="nun_noches" min="0" max="30" value="1">
            <p>Value: <output id="nun_noches"></output></p>
        </div>
        <br>
    </form>

</body>

</html>

<?php

?>