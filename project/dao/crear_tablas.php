
<?php

$hostSql = "127.0.0.1";
$userSql = "root";
$passSql = "";

$db = new mysqli($hostSql, $userSql, $passSql);
$db->set_charset("utf8");

$sql = file_get_contents('./dao/_crear_tablas.sql');

if ($db->multi_query($sql)) {
    do {
        if ($result = $db->store_result()) {
            $result->free();
        }
    } while ($db->more_results() && $db->next_result());
} else {
    echo "Error al ejecutar SQL: " . $db->error;
}

$db->close();
?>
