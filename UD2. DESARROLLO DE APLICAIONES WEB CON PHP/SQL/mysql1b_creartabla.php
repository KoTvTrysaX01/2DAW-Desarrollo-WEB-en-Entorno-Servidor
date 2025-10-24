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
$basedatosSql = "daw_tienda";

// Cargar variables de conexión a MySQL si está en riconet.es
if ( 
		($_SERVER['HTTP_HOST']=="riconet.es") && 
		(file_exists($_SERVER['DOCUMENT_ROOT']."/fp/DWES/include_ionos.php")) 
	) {
	require_once $_SERVER['DOCUMENT_ROOT']."/fp/DWES/include_ionos.php";
}

// Conectar a MySQL
$db = new mysqli($hostSql, $userSql, $passSql, $basedatosSql);
$db->set_charset("utf8");

// Leer el archivo .sql
$sql = file_get_contents('./_provincias.sql');
// Ejecutar múltiples consultas
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

echo "<h3>Tabla provincias creada</h3>";

?>
	
</body>
</html>