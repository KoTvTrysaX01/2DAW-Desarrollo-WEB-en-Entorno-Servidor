<?php

$config['page'] = "home";
$config['category'] = "";
$config['section'] = "";
$config['segment'] = "";
if (isset($_GET['page'])) {
    $config['page'] = addslashes(trim($_GET['page']));
}

if (isset($_GET['category'])) {
    $config['category'] = addslashes(trim($_GET['category']));
}

if (isset($_GET['section'])) {
    $config['section'] = addslashes(trim($_GET['section']));
}

if (isset($_GET['segment'])) {
    $config['segment'] = addslashes(trim($_GET['segment']));
}


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

?>

<!DOCTYPE html>
<html lang="en">
<?php include "./inc/include_head.php"; ?>

<body>
    <?php include "./inc/include_header.php"; ?>
    <?php include "./inc/include_nav.php"; ?>
    <?php include "./content/section_table.php"; ?>
    <?php include "./inc/include_scripts.php"; ?>
    <?php include "./inc/include_scripts.php"; ?>
</body>

</html>