<?php
include "../dao/include_mysql.php";
include "../dao/include_vars.php";

$sqlBD = sqlConecta($hostSql, $userSql, $passSql, $basedatosSql);

$valores = array(
    'id' => "",
    'nombre' => "",
    'categoria' => "",
    'precio' => "",
    'fabricante' => "",
    'stock' => ""
);

echo $config['section'];


