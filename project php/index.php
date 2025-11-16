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

    switch ($config['category']) {
        case "review":
            include "./content/index/section_reviews.php";
            break;
        case "history":
            include "./content/index/section_history.php";
            break;
        case "cart":
            include "./content/index/section_cart.php";
            break;
        case "contact":
            include "./content/index/section_contact.php";
            break;
        case "purchase":
            include "./content/index/section_purchase.php";
            break;
        case "logout":
            $loggedin = false;
            $loggedroot = false;
            $_SESSION['user'] = array();
            header('Location: ' . "index.php?category=home");
            break;
        default:
            include "./content/index/section_home.php";
            break;
    }

    include "./inc/include_footer.php";
    include "./inc/include_scripts.php";
    ?>
</body>

</html>