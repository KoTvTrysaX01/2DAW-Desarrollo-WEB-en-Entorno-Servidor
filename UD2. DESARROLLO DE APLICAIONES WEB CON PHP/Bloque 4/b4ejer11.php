<?php
$estadios_futbol = array(
    "Barcelona" => "Camp Nou",
    "Real Madrid" => "Santiago Bernabeu",
    "Valencia" => "Mestalla",
    "Real Sociedad" => "Anoeta"
);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bloque 4 - Ejercicio 11</title>
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
        <tr>
            <th>Indice</th>
            <th>Valor</th>
        </tr>

        <?php
        foreach ($estadios_futbol as $nombre => $estadio) {
            ?>
            <tr>
                <?php echo "<td>" . $nombre . "</td>";
                echo "<td>" . $estadio . "</td>" ?>
            </tr>
            <?php
        }
        ?>
    </table>

    <?php unset($estadios_futbol['Real Madrid']); ?>
    <ol>
        <?php
        foreach ($estadios_futbol as $nombre => $estadio) {
            echo "<li>". $nombre . " => " . $estadio . "</li>";
        }
        ?>
    </ol>
</body>
</html>