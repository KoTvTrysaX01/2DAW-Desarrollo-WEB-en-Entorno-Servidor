<?php
function potencias()
{
    for ($i = 0; $i < 8; $i++) {
        echo "<tr ><td style='border-bottom: 1pt solid black;'>2<sup>" . ($i + 1) . "</sup></td><td>" . (pow(2, $i + 1)) . "</td></tr>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        /* Using css collapse property, 
       we set the bottom borders */
        table {
            border-collapse: collapse;
            width: 50%
        }

        td,
        th {
            border-bottom:
                1px solid black;

            /* Setting border type, solid 
               and color to be black */
            text-align: left;
        }
    </style>
    <title>Document</title>
</head>

<body>
    <table>
        <?php potencias() ?>
    </table>
</body>

</html>