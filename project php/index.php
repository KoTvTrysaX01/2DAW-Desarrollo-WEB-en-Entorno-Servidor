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
        case "reviews":
            include "./content/section_reviews.php";
            break;
        case "history":
            include "./content/section_history.php";
            break;
        case "cart":
            include "./content/section_cart.php";
            break;
        case "logout":
            $loggedin = false;
            $loggedroot = false;
            $_SESSION['usuario'] = "";
            header('Location: ' . "index.php?category=home");
            break;
        default:
            include "./content/section_home.php";
            break;
    }

    include "./inc/include_footer.php";
    include "./inc/include_scripts.php";
    ?>
</body>

</html>