<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8"/>
  <title>Mysql Básico</title>
</head>
<body>
<?php

require_once "include_mysql_v1.php";

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
$sqlDB = sqlConecta($hostSql, $userSql, $passSql, $basedatosSql);
$sqlConsulta = 'SELECT * FRO electronica';
$sqlCursor = sqlQuery($sqlDB, $sqlConsulta);
if (sqlNumRegistros($sqlCursor)>0) {
	echo '<table>';
	while ($sqlRegistro = sqlObtenerRegistro($sqlCursor)) {
		echo "<tr>";
		echo "<td>".htmlspecialchars($sqlRegistro['id'])."</td>";
		echo "<td>".htmlspecialchars($sqlRegistro['nombre'])."</td>";
		echo '</tr>';
	}
	sqlFree($sqlCursor);
	echo '</table>';
}
sqlDesconecta($sqlDB);

?>
	
</body>
</html>