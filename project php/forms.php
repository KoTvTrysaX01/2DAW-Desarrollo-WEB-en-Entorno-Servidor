<?php




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
        include "./content/section_forms.php";
    } else {
        switch ($config['category']) {
            case "ice_creams":
            case "ice_bars":
            case "cookies":
            case "chocolates":
            case "milkshakes":
            case "juices":
            case "smoothies":
                include "./content/forms/form_products.php";
                break;
            case "special_offers":
                include "./content/forms/form_special_offers.php.php";
                break;
            case "users":
                include "./content/forms/form_users.php";
                break;
            default:
                include "./content/section_forms.php";
                break;
        }
    }

    include "./inc/include_footer.php";
    include "./inc/include_scripts.php";
    ?>
</body>

</html>