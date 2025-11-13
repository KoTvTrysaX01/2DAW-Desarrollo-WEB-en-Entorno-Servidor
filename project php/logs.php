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
    <div class="cont-1">
        <?php
        if (isset($config['category'])) {
            switch ($config['category']) {
                case "login":
                    include "./content/section_login.php";
                    break;
                case "signup":
                    include "./content/section_signup.php";
                    break;
                default:
                    include "./content/section_logs.php";
                    break;
            }
        } else {
            include "./content/section_logs.php";
        }



        // include "./inc/include_footer.php";
        // include "./inc/include_scripts.php";
        ?>
        </div>
</body>

</html>