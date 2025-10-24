<?php
// VERSIÓN 1: Métodos básicos sin gestión de errores

function sqlConecta($host, $user, $pass, $basedatos) {
	$connBD = new mysqli($host, $user, $pass, $basedatos);
	$connBD->set_charset("utf8");
	return $connBD;
}

function sqlQuery($connBD, $consulta) {
	$cursor = $connBD->query($consulta);
	return $cursor;
}

function sqlNumRegistros($cursor) {
	return $cursor->num_rows;
}

function sqlObtenerRegistro($cursor) {
	$registro = $cursor->fetch_array();
	return $registro;
}

function sqlFree($cursor) {
	$cursor->free();
}

function sqlDesconecta($connBD) {
	$connBD->close();
}

?>