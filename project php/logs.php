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
    // include "./inc/include_header.php";
    // include "./inc/include_nav.php";
    ?>
        <?php
        if (isset($config['category'])) {
            switch ($config['category']) {
                case "login":
                    include "./content/logs/section_login.php";
                    break;
                case "signup":
                    include "./content/logs/section_signup.php";
                    break;
                default:
                    include "./content/logs/section_logs.php";
                    break;
            }
        } else {
            include "./content/logs/section_logs.php";
        }



        // include "./inc/include_footer.php";
        include "./inc/include_scripts.php";
        ?>
</body>

</html>