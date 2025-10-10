<?php
function parrafoAzul($cadena)
{
    echo "<p id='copy' style='color: blue; font-weight: bold;'>" . $cadena . "</p>";
}

parrafoAzul("Hola!");
?>


<!-- Cambia dinámicamente la cadena de entrada usando JavaScript dentro de PHP.
Al principio me gustaba este método, pero ahora me parece demasiado complejo
para el ejercicio. -->

<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bloque 5 - b5ejer01</title>
    <script>
        function copyTo(obj) {
            document.getElementById("copy").textContent = obj.value;
        }
    </script>
</head>

<body>
    <label>Introduzca la cadena: </label>
    <input type="text" onkeyup="copyTo(this)" placeholder="cadena...">
    <br>
    <?php
        parrafoAzul("<script type=\"text/javascript\> document.getElementById('copy').textContent; </script>");
    ?>  
</body>
</html> -->