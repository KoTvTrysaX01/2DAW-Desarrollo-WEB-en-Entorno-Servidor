<?php


include "./dao/include_config.php";



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "./inc/include_head.php" ?>
</head>

<body>
    <?php
    include "./inc/include_header.php";
    include "./inc/include_nav.php";

    if (!isset($config['category']) || $config['category'] == "") {
        header('Location: ' . "index.php");
    } else {
        if (!isset($_GET['id'])) {
            switch ($config['category']) {
                case "ice_creams":
                case "ice_bars":
                case "cookies":
                case "chocolates":
                case "milkshakes":
                case "juices":
                case "smoothies":
                case "special_offers":
                case "users":
                case "reviews":
                case "history":
                    include "./content/section_products.php";
                    break;
                default:
                    header('Location: ' . "index.php");
                    break;
            }
        } else {
            include "./content/section_producto.php";
        }
    }

    include "./inc/include_footer.php";
    include "./inc/include_scripts.php";
    ?>
</body>

</html>