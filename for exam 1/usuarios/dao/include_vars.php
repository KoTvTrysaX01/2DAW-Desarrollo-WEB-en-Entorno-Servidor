<?php

// Variables de conexión a MySQL
$hostSql = "127.0.0.1";
$puerto  = "3306";
$userSql = "root";
$passSql = "";
$basedatosSql = "sistema_usuarios";

// Variables de instrucciones de MySQL
$errorSql = "";
$continuaSql = true;


// Cargar variables de conexión a MySQL si está en riconet.es
if ( 
		($_SERVER['HTTP_HOST']=="riconet.es") && 
		(file_exists($_SERVER['DOCUMENT_ROOT']."/fp/DWES/include_ionos.php")) 
	) {
	require_once $_SERVER['DOCUMENT_ROOT']."/fp/DWES/include_ionos.php";
}



?>