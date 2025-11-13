<?php
/* SEGURIDAD */
session_start();

include "./dao/include_mysql.php";
include "./dao/include_vars.php";


$sqlBD = SqlConecta($hostSql, $userSql, $passSql, $basedatosSql);

/* DELETE REGISTRO */
$borrado = false;
if (isset($_GET['del'])) {
    $valores['id'] = addslashes(htmlentities(trim($_GET['del'])));
    if ($valores['id'] != "") {
        $sqlDelete = "DELETE FROM electronica WHERE id='" . $valores['id'] . "'";
        sqlIniTrans($sqlBD);
        $sqlCursor = sqlQuery($sqlBD, $sqlDelete);
        if (!$continuaSql) {
            $numerror = $sqlBD->errno;
            $menerror = $sqlBD->error;
            $bdResultado = false;
            echo "<br>Error SQL: " . $menerror;
        } else {
            $bdResultado = true;
            $borrado = true;
        }
        sqlFinTrans($sqlBD);
    }
}

session_start();
if (!isset($_SESSION['usuario'])) {
    $_SESSION['usuario'] = "";
}

if (isset($_GET['logout'])) {
    $_SESSION['usuario'] = "";
}

/* CONTROL DE PÁGINA */
$config['page'] = "identifica";
$config['nav_title'] = "📩 Comunicaciones";
if (isset($_GET['page'])) {
    $config['page'] = addslashes(trim($_GET['page']));
}

// EMOJIS => https://www.w3schools.com/html/html_emojis.asp
switch ($config['page']) {
    case "identifica":
        $config['head_title'] = "Identificación";
        $config['nav_active'] = "identifica";
        break;
    case "electronica":
        $config['head_title'] = "Electronica";
        $config['nav_active'] = "electronica";
        break;
}


$borrado = false;
if (isset($_GET['del'])) {
    $valores['id'] = addslashes(htmlentities(trim($_GET['del'])));
    if ($valores['id'] != "") {
        $sqlDelete = "DELETE FROM electronica WHERE id='" . $valores['id'] . "'";
        sqlIniTrans($sqlBD);
        $sqlCursor = sqlQuery($sqlBD, $sqlDelete);
        if (!$continuaSql) {
            $numerror = $sqlBD->errno;
            $menerror = $sqlBD->error;
            $bdResultado = false;
            echo "<br>Error SQL: " . $menerror;
        } else {
            $bdResultado = true;
            $borrado = true;
        }
        sqlFinTrans($sqlBD);
    }
}

?>
<!DOCTYPE html>
<html lang="es">

<?php include "./inc/include_head.php"; ?>

<body class="d-flex flex-column min-vh-100 bg-light">
    <?php
    include "./inc/include_nav.php";
    ?>

    <!-- Contenido principal -->
    <main class="flex-fill d-flex align-items-center">
        <?php
        switch ($config['page']) {
            case "identifica":
                include "./content/section_usuarios_ident.php";
                break;
            case "electronica":
                include "./content/electronica_crud.php";
                break;
        }
        ?>
    </main>

    <?php
    include "./inc/include_footer.php";
    include "./inc/include_scripts.php";
    ?>

    <?php
    // scripts en Javascript personalizados con PHP
    switch ($config['page']) {
        case "identifica":
            include "./content/section_usuarios_ident_js.php";
            break;
            // case "mensajes":
            //     if ((isset($_GET['edit'])) || (isset($_GET['new']))) {
            //         include "./content/section_mensajes_form_js.php";
            //     } else {
            //         include "./content/section_mensajes_crud_js.php";
            //     }
            //     break;
    }
    ?>
</body>

</html>