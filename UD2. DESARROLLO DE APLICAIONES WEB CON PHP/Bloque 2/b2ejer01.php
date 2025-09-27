<?php
if (!isset($_GET['numero'])) {
    echo "No se pudo encontrar el número<br>";
} else {
    if (!ctype_digit($_GET['numero'])) {
        echo "El valor no es un número<br>";
    } else {
        $numero = $_GET['numero'];
        echo "El número introducido: {$numero}<br>";
        // for ($i = 1; $i <= 10; $i++) {
        //     echo "{$numero} x {$i} = " . $numero * $i . "<br>";
        // }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bloque 2 - Ejercicio 1</title>
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
        if (isset($_GET['numero'])) {
            for ($i = 1; $i <= 10; $i++) {
        ?>
                <tr>
                    <td style="width: 60px;"><?php echo $numero . " x " . $i . " = "; ?></td>
                    <td style="width: 30px;"><?php echo $numero * $i; ?></td>
                </tr>
        <?php
            }
        }
        ?>
    </table>
    <p><?php
        $random = rand(1, 10);
        echo "<br>Pulsa en <a href='?numero=$random'>random</a> para generar un número aleatorio <br>";
        ?>
    </p>
</body>
</html>