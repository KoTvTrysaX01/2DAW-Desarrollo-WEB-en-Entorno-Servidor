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
        header('Location: ' . "tables.php");
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
                include "./content/forms/form_special_offers.php";
                break;
            case "users":
                include "./content/forms/form_users.php";
                break;
            case "sells":
                include "./content/forms/form_sells.php";
                break;
            case "reviews":
                include "./content/forms/form_reviews.php";
                break;
            case "mails":
                include "./content/forms/form_mail.php";
                break;
            default:
                header('Location: ' . "tables.php");
                break;
        }
    }

    include "./inc/include_footer.php";
    include "./inc/include_scripts.php";
    ?>
</body>

</html>