<?php
include "./dao/include_mysql.php";
include "./dao/include_vars.php";
require_once "./dao/crear_bd.php";
require_once "./dao/crear_tablas.php";


$config['page'] = "home";
$config['category'] = "";
if (isset($_GET['page'])) {
    $config['page'] = addslashes(trim($_GET['page']));
}

if (isset($_GET['category'])) {
    $config['category'] = addslashes(trim($_GET['category']));
}
// if ($config['page'] != "home" || $config['page'] != "food") {
//     $config['page'] = "home";
// }

// switch ($config['page']) {
//     case "home":
//         $config['content'] = "home";
//         break;
//     case "ice_creams":
//         $config['content'] = "food";
//         break;
//     case "ice_bars":
//         $config['content'] = "food";
//         break;
//     case "cookies":
//         $config['content'] = "food";
//         break;
//     case "chocolates":
//         $config['content'] = "food";
//         break;
//     case "milkshakes":
//         $config['content'] = "food";
//         break;
//     case "juices":
//         $config['content'] = "food";
//         break;
//     case "smoothies":
//         $config['content'] = "food";
//         break;
//     case "login":
//         $config['content'] = "login";
//         break;

//     default:
//         $config['page'] = "home";
//         $config['content'] = "home";
//         break;
// }

// 
?>


<!DOCTYPE html>
<html lang="en">
<?php include "./inc/include_head.php"; ?>

<body>
    <?php
    // switch($config['page']){
    //     case "home":

    //         break;
    // }



    if ($config['page'] == "login") {
        switch ($config['category']) {
            case "login":
                include "./content/section_category_login.php";
                break;
            case "signup":
                include "./content/section_category_signup.php";
                break;
            default:
                include "./content/section_login_page.php";
        }
    } else {
        include "./inc/include_header.php";
        include "./inc/include_nav.php";
        include "./content/section_" . $config['page'] . ".php";
        include "./inc/include_footer.php";
        include "./inc/include_scripts.php";
    }
    ?>
</body>

</html>