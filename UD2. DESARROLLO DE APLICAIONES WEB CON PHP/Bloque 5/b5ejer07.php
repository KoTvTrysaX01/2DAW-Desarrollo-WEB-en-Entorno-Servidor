<?php
$path = "./p07fotos/images/";
$files = array_diff(scandir($path), array('.', '..'));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bloque 5 - Ejercicio 7</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Galería de Imágenes</h2>
        <div class="row">
            <?php
            foreach ($files as $clave) {
                echo "<div class='col-12 col-md-6 col-lg-4 mb-3'><img class='img-fluid rounded shadow' src='$path/$clave' /></div>";
            }
            ?>
        </div>
    </div>
    <?php
    print_r($files);
    ?>
</body>
</html>