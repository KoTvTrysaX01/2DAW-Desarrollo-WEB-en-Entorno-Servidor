<?php
include "./dao/include_mysql.php";
include "./dao/include_vars.php";
session_start();

$loggedin = false;
$loggedroot = false;


if (!isset($_SESSION['usuario'])) {

    require_once "./dao/crear_bd.php";
    require_once "./dao/crear_tablas.php";

    $_SESSION['usuario'] = "";
} else {
    if ($_SESSION['usuario'] === "root") {
        $loggedroot = true;
        $loggedin = true;
    } elseif ($_SESSION['usuario'] != "") {
        $loggedin = true;
    }
}


$config['page'] = substr($_SERVER['PHP_SELF'], 9, -4);


$config['category'] = "";
if (isset($_GET['category'])) {
    $config['category'] = addslashes(trim($_GET['category']));
}
