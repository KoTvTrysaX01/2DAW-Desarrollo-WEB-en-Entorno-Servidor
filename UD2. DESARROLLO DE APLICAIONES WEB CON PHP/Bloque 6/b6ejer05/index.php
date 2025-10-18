<?php
$config['page'] = "empresa";
if (isset($_GET['page'])) {
    $config['page'] = addslashes(trim($_GET['page']));
}
if (!file_exists("./content/section_" . $config['page'] . ".php")) {
    $config['page'] = "empresa";
}

switch ($config['page']) {
    case "empresa":
        $config['head_title'] = "Empresa";
        $config['nav_active'] = "empresa";
        break;
    case "servicios":
        $config['head_title'] = "Servicios";
        $config['nav_active'] = "servicios";
        break;
    case "alquiler":
        $config['head_title'] = "Alquiler";
        $config['nav_active'] = "alquiler";
        break;
    case "contacto":
        $config['head_title'] = "Contacto";
        $config['nav_active'] = "contacto";
        break;
    case "descuentos":
        $config['head_title'] = "Descuentos";
        $config['nav_active'] = "descuentos";
        break;

    default:
        $config['head_title'] = "Empresa";
        $config['nav_active'] = "empresa";;
        break;
}

?>

<!DOCTYPE html>
<html lang="es">

<?php include "./inc/include_head.php"; ?>

<body>
    <?php
    include "./inc/include_nav.php";
    ?>

    <!-- Contenido principal -->

    <?php include "./content/section_" . $config['page'] . ".php";  ?>


    <?php
    include "./inc/include_footer.php";
    include "./inc/include_scripts.php";
    ?>
</body>
</html>