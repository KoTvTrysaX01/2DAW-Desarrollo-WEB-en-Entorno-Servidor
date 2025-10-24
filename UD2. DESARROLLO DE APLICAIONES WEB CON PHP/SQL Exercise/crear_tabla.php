<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8"/>
  <title>Mysql Básico</title>
</head>
<body>
<!--
	Ejemplo que crea una BD y muestra los datos de la tabla provincias
-->
<?php

// EJECUTAR EL ARCHIVO .SQL PARA CREAR BD SI NO EXISTE

$hostSql = "127.0.0.1";
$userSql = "root";
$passSql = "";
$basedatosSql = "tienda";

// Conectar a MySQL
$db = new mysqli($hostSql, $userSql, $passSql, $basedatosSql);
$db->set_charset("utf8");

// Leer el archivo .sql
$sql = file_get_contents('_electronica.sql');
// Ejecutar múltiples consultas
if ($db->multi_query($sql)) {
    do {
        if ($result = $db->store_result()) {
            $result->free();
        }
    } while ($db->more_results() && $db->next_result());
} else {
    echo "dqw";
    echo "Error al ejecutar SQL: " . $db->error;
}


$db->close();

echo "<h3>Tabla 'electronica' creada</h3>";

?>
	
</body>
</html>