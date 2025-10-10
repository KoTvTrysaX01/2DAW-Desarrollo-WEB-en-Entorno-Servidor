<?php
function potencias()
{
    for ($i = 1; $i <= 8; $i++) {
        echo "<tr><td>2<sup>" . ($i) . "</sup></td><td>" . (pow(2, $i)) . "</td></tr>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        table,
        td {
            border: 1px solid black;
            text-align: center;
        }
    </style>
    <title>Bloque 5 - b5ejer02</title>
</head>

<body>
    <table>
        <?php potencias() ?>
    </table>
</body>

</html>