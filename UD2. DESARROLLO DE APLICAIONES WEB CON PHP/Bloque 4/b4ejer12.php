<?php
$amigos = [
    'Pedro' => array('Madrid', 32, '91-999.99.99'),
    'Susana' => array('Barcelona', 34, '93-000.00.00'),
    'Sonia' => array('Toledo', 42, '925-09.09.09'),
    'Alberto' => array('Salamanca', 35, '923-08.08.08')
];

ksort($amigos);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>b4ejer12.php</title>
    <style>
        table,
        td {
            border: 1px solid black;
            text-align: center;
        }
        th{
            border: 1px solid black;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <table>
        <tr>
            <th>NOMBRE</th>
            <th>CIUDAD</th>
            <th>EDAD</th>
            <th>TELÉFONO</th>
        </tr>

        <?php
        foreach ($amigos as $clave => $amigo) {
            ?>
            <tr>
                <?php echo "<td>" . $clave . "</td>";
                echo "<td>" . $amigo[0] . "</td>";
                echo "<td>" . $amigo[1] . "</td>";
                echo "<td>" . $amigo[2] . "</td>";
                ?>
            </tr>
            <?php
        }
        ?>
    </table>
</body>

</html>