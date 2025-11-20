<?php
include "./dao/include_mysql.php";
include "./dao/include_vars.php";

include "./content/mails/PHPMailer.php";
session_start();

$loggedin = false;
$loggedroot = false;
$startCarousel = false;


if (!isset($_SESSION['user'])) {
    $_SESSION['cart'] = array();
    require_once "./dao/crear_bd.php";
    require_once "./dao/crear_tablas.php";

    $_SESSION['user'] = array(
        "id" => "",
        "username" => "",
        "email" => "",
        "isAdmin" => ""
    );

    $_SESSION['user'] = "";
} else {
    if(isset($_SESSION['user']['username']) && isset($_SESSION['user']['isAdmin']))
    if ($_SESSION['user']['isAdmin']) {
        $loggedroot = true;
        $loggedin = true;
    } elseif ($_SESSION['user']['username'] != "") {
        $loggedin = true;
    }
}


$config['page'] = substr($_SERVER['PHP_SELF'], 9, -4);


$config['category'] = "";
if (isset($_GET['category'])) {
    $config['category'] = addslashes(trim($_GET['category']));
}
