<?php
// Hay que especificar la ubicación de la carpeta
$miDir = "C:\\Users\\usuario\\Desktop\\p07fotos\\images";

function recorrerCarpeta($dir)
{
    echo $dir . "<br>";
    $archivos = scandir($dir);
    foreach ($archivos as $clave => $archivo) {
        echo "<tr><td>" . $clave . "</td> <td>". $archivo . "</td></tr>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bloque 5 - b5ejer07</title>
    <style>
        table,
        td {
            border: 1px solid black;
            text-align: center;
        }
    </style>
</head>

<body>
    <table>
        <?php
        recorrerCarpeta($miDir);
        ?>
    </table>
</body>
</html>