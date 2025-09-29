<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bloque 3 - Ejercicio 1</title>
    <style>
        table {
            border: 1px solid black;
        }

        td {
            border: 1px solid black;
            text-align: center;
        }
    </style>
</head>

<body>
    <table>
        <?php
        for ($i = 32; $i <= 126; $i++){
        ?>
        <tr>
            <td style="width: 60px;"><?php echo $i . " =>"; ?></td>
            <td style="width: 30px;"><?php echo chr($i) . "<br>"; ?></td>
        </tr>
        <?php 
        }
        ?>
    </table>
</body>
</html>