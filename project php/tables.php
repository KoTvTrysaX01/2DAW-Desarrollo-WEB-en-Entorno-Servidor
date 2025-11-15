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
        include "./content/tables/section_all_tables.php";
    } else {
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
            case "sells":
            case "reviews":
            case "mails":
                include "./content/tables/section_table.php";
                break;
            default:
                include "./content/tables/section_all_tables.php";
                break;
        }
    }

    include "./inc/include_footer.php";
    include "./inc/include_scripts.php";
    ?>
</body>

</html>