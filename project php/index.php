<?php
include "./dao/include_mysql.php";
include "./dao/include_vars.php";

$db = new mysqli($hostSql, $userSql, $passSql, $basedatosSql);
$db->set_charset("utf8");

$consulta = 'SELECT * FROM users';
$resultado = $db->query($consulta);
if ($resultado->num_rows < 2) {
    require_once "./dao/crear_bd.php";
    require_once "./dao/crear_tablas.php";
    $resultado->free();
}

// if (!isset($_SESSION['usuario'])) {
//     session_start();
//     $_SESSION['usuario'] = "";
//     echo "error";
//     $loggedin = false;
// } elseif ($_SESSION['usuario'] != "") {
//     echo "logged in";
//     $loggedin = true;
// }



session_start();
$loggedin = false;
$loggedroot = false;
if (!isset($_SESSION['usuario'])) {
    echo "error";
} else {
    if ($_SESSION['usuario'] == 'root') {
        $loggedroot = true;
        $loggedin = true;
    } else {
        echo $_SESSION['usuario'] . " " . "logged in";
        $loggedin = true;
    }
}


$config['page'] = "home";
$config['category'] = "";
if (isset($_GET['page'])) {
    $config['page'] = addslashes(trim($_GET['page']));
}

if (isset($_GET['category'])) {
    $config['category'] = addslashes(trim($_GET['category']));
}

?>


<!DOCTYPE html>
<html lang="en">
<?php include "./inc/include_head.php"; ?>

<body>
    <?php
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
    } elseif ($config['page'] == "logout") {
        $_SESSION['usuario'] = null;
        $loggedin = false;
        $loggedroot = false;
        header('Location: index.php');
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