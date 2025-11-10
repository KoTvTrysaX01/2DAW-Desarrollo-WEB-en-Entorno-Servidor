<?php
include "./dao/include_mysql.php";
include "./dao/include_vars.php";

$config['page'] = "home";
if (isset($_GET['page'])) {
    $config['page'] = addslashes(trim($_GET['page']));
}
// if ($config['page'] != "home" || $config['page'] != "food") {
//     $config['page'] = "home";
// }

switch ($config['page']) {
    case "home":
        $config['content'] = "home";
        break;
    case "ice_creams":
        $config['content'] = "food";
        break;
    case "ice_bars":
        $config['content'] = "food";
        break;
    case "cookies":
        $config['content'] = "food";
        break;
    case "chocolates":
        $config['content'] = "food";
        break;
    case "milkshakes":
        $config['content'] = "food";
        break;
    case "juices":
        $config['content'] = "food";
        break;
    case "smoothies":
        $config['content'] = "food";
        break;
    case "login":
        $config['content'] = "login";
        break;

    default:
        $config['page'] = "home";
        $config['content'] = "home";
        break;
}

?>


<!DOCTYPE html>
<html lang="en">
<?php include "./inc/include_head.php"; ?>

<body>
    <?php include "./inc/include_header.php"; ?>
    <?php include "./inc/include_nav.php"; ?>
    <?php include "./content/section_" . $config['content'] . ".php";  ?>
    <?php include "./inc/include_footer.php"; ?>
    <?php include "./inc/include_scripts.php"; ?>
</body>

</html>