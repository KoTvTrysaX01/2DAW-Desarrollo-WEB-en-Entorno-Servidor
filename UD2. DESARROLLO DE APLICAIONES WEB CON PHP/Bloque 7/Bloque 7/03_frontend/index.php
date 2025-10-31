<?php

require_once "../resources/include_mysql.php";
require_once "../resources/include_vars.php";

$sqlBD = SqlConecta($hostSql, $userSql, $passSql, $basedatosSql);

/* DELETE REGISTRO */
$borrado = false;
if (isset($_GET['del'])) {
    $valores['id'] = addslashes(htmlentities(trim($_GET['del'])));
    if ($valores['id'] != "") {
        $sqlDelete = "DELETE FROM usuarios WHERE id='" . $valores['id'] . "'";
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

/* RECOGIDA DE DATOS */
$sqlSelect = "SELECT * FROM usuarios ORDER BY nombre";
$sqlCursor = sqlQuery($sqlBD, $sqlSelect);
$arrayUsuarios = sqlResultArray($sqlBD, $sqlCursor);

SqlDesconecta($sqlBD);

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>03_frontend</title>
</head>

<body>
    <header>

    </header>
    <main>
        <!-- <table>
            <tr>
                <th>Usuario</th>
                <th>Categoría</th>
            </tr>
            <?php for ($i = 0; $i < count($arrayUsuarios); $i++) { ?>
                <tr>
                    <td><?php echo $arrayUsuarios[$i]['nombre']; ?></td>
                    <td><?php echo $arrayUsuarios[$i]['categoria']; ?></td>
                </tr>
            <?php } ?>
        </table> -->
        <?php include "../resources/content/section_login.php"?>
    </main>
    <footer>

    </footer>
</body>

</html>