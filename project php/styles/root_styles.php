<style>
    .btn-block {
        background-color: rgb(167, 167, 167);
        color: rgb(255, 255, 255);
        ;
    }

    .btn-block:hover {
        background-color: rgb(255, 255, 255);
        color: rgb(145, 145, 145)
    }
</style>

<?php
if ($config['page'] == "home") {
?>
    <style>
        :root {
            --box-shadow: rgba(0, 0, 0, 0.2);
            --header-bg-color-1: rgb(255, 255, 255);
            --header-bg-color-2: rgb(255, 181, 209);
            --header-text-color: rgb(255, 67, 183);

            --button-bg-color: rgb(255, 255, 255);
            --button-text-color: rgb(255, 105, 188);
            --hero-bg-color: rgba(253, 161, 204, 0.9);
            --hero-text-color: rgb(255, 255, 255);

            --nav-bg-color: rgba(255, 203, 212, 0.8);

            --carousel-bg-color: rgba(255, 192, 232, 0.6);

            --footer-bg-color: rgb(252, 160, 191);
            --footer-text-color: rgb(255, 255, 255);
        }

        body {
            background-image: url(<?php echo "./assets/bg/" . $config['page'] . ".png"; ?>);
        }
    </style>
    <?php
} elseif ($config['page'] == "login") {
    switch ($config['category']) {
        case "login":
    ?>
    

    <?php

    }
} elseif ($config['page'] == "products") {

    ?>
    <style>
        body {
            background-image: url(<?php echo "./assets/bg/" . $config['category'] . ".png"; ?>);
        }
    </style>

    <?php

    switch ($config['category']) {
        case "ice_creams":
    ?>
            <style>
                :root {
                    --box-shadow: rgba(0, 0, 0, 0.2);
                    --header-bg-color-1: rgb(192, 86, 0);
                    --header-bg-color-2: rgb(56, 36, 13);
                    --header-text-color: rgb(56, 36, 13);

                    --button-bg-color: rgb(253, 251, 212);
                    --button-text-color: rgb(56, 36, 13);
                    --button-bg-active: rgb(192, 86, 0);
                    --button-text-active: rgb(56, 36, 13);

                    --nav-bg-color: rgba(113, 54, 0, 0.8);

                    --foods-bg-color: rgba(201, 201, 201, 0.575);
                    --foods-text-color: rgb(255, 255, 255);
                    --food-bg-color: rgb(192, 86, 0);
                    --food-bg-hover: rgb(156, 71, 1);
                    --food-img-bg: rgba(255, 255, 255, 0.3);

                    --footer-bg-color: rgb(56, 36, 13);
                    --footer-text-color: rgb(253, 251, 212);
                }
            </style>
        <?php
            break;
        case "ice_bars":
        ?>
            <style>
                :root {
                    --box-shadow: rgba(0, 0, 0, 0.2);
                    --header-bg-color-1: rgb(255, 255, 255);
                    --header-bg-color-2: rgb(196, 72, 0);
                    --header-text-color: rgb(196, 72, 0);

                    --button-bg-color: rgb(255, 255, 255);
                    --button-text-color: rgba(89, 33, 0, 1);
                    --button-bg-active: rgba(111, 41, 0, 1);
                    --button-text-active: rgb(255, 255, 255);

                    --nav-bg-color: rgba(255, 232, 203, 0.8);

                    --foods-bg-color: rgba(255, 245, 238, 0.555);
                    --food-bg-color: rgb(250, 212, 162);
                    --food-bg-hover: rgb(248, 189, 133);
                    --food-img-bg: rgba(255, 255, 255, 0.3);

                    --footer-bg-color: rgb(252, 201, 160);
                    --footer-text-color: rgb(204, 75, 0);
                }
            </style>
        <?php
            break;
        case "cookies":
        ?>
            <style>
                :root {
                    --box-shadow: rgba(0, 0, 0, 0.2);
                    --header-bg-color-1: rgb(190, 81, 3);
                    --header-bg-color-2: rgb(255, 206, 27);
                    --header-text-color: rgb(255, 206, 27);

                    --button-bg-color: rgb(194, 67, 12);
                    --button-text-color: rgb(255, 255, 255);
                    --button-bg-active: rgb(255, 206, 27);
                    --button-text-active: rgb(190, 81, 3);

                    --nav-bg-color: rgba(214, 139, 0, 0.8);

                    --foods-bg-color: rgba(201, 201, 201, 0.575);
                    --foods-text-color: rgb(0, 0, 0);
                    --food-bg-color: rgb(255, 206, 27);
                    --food-bg-hover: rgb(231, 182, 3);
                    --food-img-bg: rgba(255, 255, 255, 0.3);

                    --footer-bg-color: rgba(173, 113, 0, 1);
                    --footer-text-color: rgb(255, 206, 27);
                }
            </style>
        <?php
            break;
        case "chocolates":
        ?>
            <style>
                :root {
                    --box-shadow: rgba(0, 0, 0, 0.2);
                    --header-bg-color-1: rgb(0, 109, 11);
                    --header-bg-color-2: rgb(29, 12, 0);
                    --header-text-color: rgb(255, 255, 255);

                    --button-bg-color: rgb(0, 109, 11);
                    --button-text-color: rgb(255, 255, 255);
                    --button-bg-active: rgb(51, 20, 0);
                    --button-text-active: rgb(255, 255, 255);

                    --nav-bg-color: rgba(73, 29, 0, 0.8);

                    --foods-bg-color: rgba(190, 190, 190, 0.575);
                    --foods-text-color: rgb(255, 255, 255);
                    --food-bg-color: rgb(104, 42, 0);
                    --food-bg-hover: rgb(73, 29, 0);
                    --food-img-bg: rgba(255, 255, 255, 0.3);

                    --footer-bg-color: rgb(0, 59, 6);
                    --footer-text-color: rgb(255, 255, 255);
                }
            </style>
        <?php
            break;
        case "milkshakes":
        ?>
            <style>
                :root {
                    --box-shadow: rgba(0, 0, 0, 0.2);
                    --header-bg-color-1: rgb(255, 255, 255);
                    --header-bg-color-2: rgb(0, 147, 233);
                    --header-text-color: rgb(0, 217, 255);

                    --button-bg-color: rgb(0, 225, 255);
                    --button-text-color: rgb(255, 255, 255);
                    --button-bg-active: rgb(255, 255, 255);
                    --button-text-active: rgb(0, 154, 243);

                    --nav-bg-color: rgba(0, 154, 243, 0.8);

                    --foods-bg-color: rgba(192, 255, 252, 0.685);
                    --foods-text-color: rgb(255, 255, 255);
                    --food-bg-color: rgb(0, 154, 243);
                    --food-bg-hover: rgb(0, 130, 206);
                    --food-img-bg: rgba(255, 255, 255, 0.3);

                    --footer-bg-color: rgb(0, 130, 206);
                    --footer-text-color: rgb(255, 255, 255);
                }
            </style>
        <?php
            break;
        case "juices":
        ?>
            <style>
                :root {
                    --box-shadow: rgba(0, 0, 0, 0.2);
                    --header-bg-color-1: rgb(255, 251, 0);
                    --header-bg-color-2: rgb(5, 139, 0);
                    --header-text-color: rgb(5, 139, 0);

                    --button-bg-color: rgb(255, 251, 0);
                    --button-text-color: rgb(5, 139, 0);
                    --button-bg-active: rgb(248, 204, 5);
                    --button-text-active: rgb(5, 139, 0);

                    --nav-bg-color: rgba(181, 253, 171, 0.8);

                    --foods-bg-color: rgba(243, 255, 238, 0.555);
                    --food-bg-color: rgb(180, 250, 162);
                    --food-bg-hover: rgb(156, 248, 133);
                    --food-img-bg: rgba(255, 255, 255, 0.3);

                    --footer-bg-color: rgb(58, 156, 45);
                    --footer-text-color: rgb(214, 230, 0);
                }
            </style>
        <?php
            break;
        case "smoothies":
        ?>
            <style>
                :root {
                    --box-shadow: rgba(0, 0, 0, 0.2);
                    --header-bg-color-1: rgb(82, 0, 189);
                    --header-bg-color-2: rgb(167, 0, 158);
                    --header-text-color: rgb(255, 0, 0);

                    --button-bg-color: rgb(82, 0, 189);
                    --button-text-color: rgb(255, 0, 0);
                    --button-bg-active: rgb(231, 0, 220);
                    --button-text-active: rgb(82, 0, 189);

                    --nav-bg-color: rgba(201, 0, 191, 0.8);

                    --foods-bg-color: rgba(255, 192, 255, 0.685);
                    --foods-text-color: rgb(255, 255, 255);
                    --food-bg-color: rgb(167, 0, 158);
                    --food-bg-hover: rgb(141, 0, 134);
                    --food-img-bg: rgba(255, 255, 255, 0.3);

                    --footer-bg-color: rgb(60, 0, 138);
                    --footer-text-color: rgb(255, 0, 0);
                }
            </style>
<?php
    }
}
?>