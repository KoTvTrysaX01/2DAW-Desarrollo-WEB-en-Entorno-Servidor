<?php
include "./dao/include_mysql.php";
include "./dao/include_vars.php";
require_once "./dao/crear_bd.php";
require_once "./dao/crear_tablas.php";

// $sqlBD = sqlConecta($hostSql, $userSql, $passSql, $basedatosSql);


// $sqlCursor = sqlQuery($sqlBD, "SHOW TABLES LIKE 'users'");
// if ($sqlCursor->num_rows !== false) {
//     require_once "./dao/crear_bd.php";
//     require_once "./dao/crear_tablas.php";
// }

session_start();
$loggedin = false;
$loggedroot = false;
if (!isset($_SESSION['usuario'])) {
    // echo "not logged in";
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
$config['section'] = "";
if (isset($_GET['page'])) {
    $config['page'] = addslashes(trim($_GET['page']));
}

if (isset($_GET['category'])) {
    $config['category'] = addslashes(trim($_GET['category']));
}

if (isset($_GET['section'])) {
    $config['section'] = addslashes(trim($_GET['section']));
}



?>




<!DOCTYPE html>
<html lang="en">
<?php include "./inc/include_head.php"; ?>

<body>
    <?php
    if ($config['page'] == "logs") {
        switch ($config['section']) {

            case "login":
                include "./content/section_login.php";
                break;

            case "signup":
                include "./content/section_signup.php";
                break;

            default:
                include "./content/section_logs.php";
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
    }
    include "./inc/include_scripts.php";
    ?>

</body>

</html>