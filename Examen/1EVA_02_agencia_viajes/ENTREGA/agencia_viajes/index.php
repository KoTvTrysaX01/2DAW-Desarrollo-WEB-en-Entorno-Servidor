<?php

$config['page'] = "inicio";
$config['navActive'] = "";

if (isset($_GET['page'])) {
    $config['page'] = $_GET['page'];
    $config['navActive'] = $_GET['page'];
}

?>

<!DOCTYPE html>
<html lang="en">
<?php include "./inc/include_head.php" ?>

<body>
    <?php include "./inc/include_nav.php" ?>

    <?php
    switch ($config['page']) {
        case "inicio":
            include "./content/section_inicio.php";
            break;
        case "destinos":
            include "./content/section_destinos.php";
            break;
        case "servicios":
            include "./content/section_servicios.php";
            break;
        case "contacto":
            include "./content/section_contacto.php";
            break;
        default:
            include "./content/section_inicio.php";
            break;
    }
    ?>

    <?php
    include "./inc/include_footer.php";
    include "./inc/include_scripts.php";
    ?>
</body>

</html>