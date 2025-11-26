<?php
// VERSIÓN 4: COMPLETA con todos los métodos, con gestión de errores y control de transaccciones
// sqlConecta, sqlQuery, sqlNumRegistros, sqlObtenerRegistro, sqlFree, sqlDesconecta
// sqlFields, sqlResultArray
// sqlIniTrans, sqlFinTrans


/* ********************* */
/* Sql CONECTA */
/* ********************* */
function sqlConecta($host, $user, $pass, $basedatos, $puerto="3306") {
	global $errorSql;
	global $continuaSql;

	try {
		@ $connBD = new mysqli($host, $user, $pass, $basedatos, $puerto);
		if ($connBD->connect_errno != 0) {
		  throw new Exception('<strong>Error seleccionando BD: </strong> ('.
			$connBD->connect_errno.') '.$connBD->connect_error);
		}
		@ $connBD->query("SET lc_messages = 'es_ES'");
			if ($connBD->errno != 0) {
			  throw new Exception('<strong>Error en la instrucción SQL: </strong> ('.
				$connBD->errno.') '.$connBD->error);
			}		
		@ $connBD->set_charset('utf8');
		if ($connBD->errno != 0) {
		  throw new Exception('<strong>Error activando UTF8: </strong> ('.
			$connBD->errno.') '.$connBD->error);
		}
		@ $connBD->autocommit(false);		
		if ($connBD->errno != 0) {
		  throw new Exception('<strong>Error al activar transacciones: </strong> ('.
			$connBD->errno.') '.$connBD->error);
		}
		return $connBD;
	} catch (Exception $e) {
		$errorSql=$e->getMessage();
		$continuaSql=false;
		return null;
	}
}

/* ********************* */
/* Sql QUERY */
/* ********************* */
function sqlQuery($connBD, $consulta) {
	global $errorSql;
	global $continuaSql;
  
	try {
		$cursor = null;
		if ( ($continuaSql) && (!is_null($connBD)) ) {
			@ $cursor = $connBD->query($consulta);
			if ($connBD->errno != 0) {
			  throw new Exception('<strong>Error en la instrucción SQL: </strong> ('.
				$connBD->errno.') '.$connBD->error);
			}
		}
		return $cursor;
	} catch (Exception $e) {
		$errorSql=$e->getMessage();
		$continuaSql=false;
		return null;
	}
}

/* ********************* */
/* Sql NUM REGISTROS */
/* ********************* */
function sqlNumRegistros($connBD, $cursor) {
	global $errorSql;
	global $continuaSql;
  
	try {
		$num = null;
		if ( ($continuaSql) && (!is_null($cursor)) ) {
			@ $num = $cursor->num_rows;
			if ($connBD->errno != 0) {
			  throw new Exception('<strong>Error al comprobar registros: </strong> ('.
				$connBD->errno.') '.$connBD->error);
			}
		}
		return $num;
	} catch (Exception $e) {
		$errorSql=$e->getMessage();
		$continuaSql=false;
		return null;
	}
	
}

/* ********************* */
/* Sql FIELDS			 */
/* ********************* */
function sqlFields($connBD, $cursor) {
	global $errorSql;
	global $continuaSql;
  
    $arrayFields=array();
	try {
		$num = null;
		if ( ($continuaSql) && (!is_null($cursor)) ) {
			@ $arrayFields = $cursor->fetch_fields();
			if ($connBD->errno != 0) {
			  throw new Exception('<strong>Error al obtener cabeceras: </strong> ('.
				$connBD->errno.') '.$connBD->error);
			}
		}
		return $arrayFields;
	} catch (Exception $e) {
		$errorSql=$e->getMessage();
		$continuaSql=false;
		return null;
	}
	
}

/* ********************* */
/* Sql RESULTARRAY	     */
/* ********************* */
function sqlResultArray($connBD, $cursor) {
	global $errorSql;
	global $continuaSql;
  
    $arrayResult=array();
	try {
		$num = null;
		if ( ($continuaSql) && (!is_null($cursor)) ) {
			@ $arrayResult = $cursor->fetch_all(MYSQLI_ASSOC);
			if ($connBD->errno != 0) {
			  throw new Exception('<strong>Error al obtener array de registros: </strong> ('.
				$connBD->errno.') '.$connBD->error);
			}
		}
		return $arrayResult;
	} catch (Exception $e) {
		$errorSql=$e->getMessage();
		$continuaSql=false;
		return null;
	}
	
}

/* ********************* */
/* Sql OBTENER REGISTRO */
/* ********************* */
function sqlObtenerRegistro($connBD, $cursor) {
	global $errorSql;
	global $continuaSql;
  
	try {
		$registro = null;
		if ( ($continuaSql) && (!is_null($cursor)) ) {
			@ $registro = $cursor->fetch_array();
			if ($connBD->errno != 0) {
			  throw new Exception('<strong>Error al obtener registro: </strong> ('.
				$connBD->errno.') '.$connBD->error);
			}
		}
		return $registro;
	} catch (Exception $e) {
		$errorSql=$e->getMessage();
		$continuaSql=false;
		return null;
	}
}

/* ********************* */
/* Sql FREE */
/* ********************* */
function sqlFree($connBD, $cursor) {
	global $errorSql;
	global $continuaSql;

	try {
		if ( ($continuaSql) && (!is_null($cursor)) ) {
			@ $cursor->free();
			if ($connBD->errno != 0) {
			  throw new Exception('<strong>Error al liberar memoria: </strong> ('.
				$connBD->errno.') '.$connBD->error);
			}
		}
	} catch (Exception $e) {
		$errorSql=$e->getMessage();
		$continuaSql=false;
		return null;
	}
}

/* ********************* */
/* Sql INI TRANS */
/* ********************* */
function sqlIniTrans($connBD) {
	global $errorSql;
	global $continuaSql;

	try {
		
		$continuaSql=true;
		if ( ($continuaSql) && (!is_null($connBD)) ) {
			@ $connBD->begin_transaction(MYSQLI_TRANS_START_READ_WRITE);
			if ($connBD->errno != 0) {
			  throw new Exception('<strong>Error al comenzar transacción: </strong> ('.
				$connBD->errno.') '.$connBD->error);
			}
		}
	} catch (Exception $e) {
		$errorSql=$e->getMessage();
		$continuaSql=false;
		return null;
	}
}

/* ********************* */
/* Sql FIN TRANS */
/* ********************* */
function sqlFinTrans($connBD) {
	global $errorSql;
	global $continuaSql;

	try {
  	    if ( ($continuaSql) && (!is_null($connBD)) ) {
		    @ $connBD->commit();
			if ($connBD->errno != 0) {
			  throw new Exception('<strong>Error al completar transacción: </strong> ('.
				$connBD->errno.') '.$connBD->error);
			}
		}
  	    if ( (!$continuaSql) && (!is_null($connBD)) ) {
		    @ $connBD->rollback();
			if ($connBD->errno != 0) {
			  throw new Exception('<strong>Error al deshacer transacción: </strong> ('.
				$connBD->errno.') '.$connBD->error);
			}
		}
	} catch (Exception $e) {
		$errorSql=$e->getMessage();
		$continuaSql=false; 
		return null;
	}
}


/* ********************* */
/* Sql DESCONECTA */
/* ********************* */
function sqlDesconecta($connBD) {
	global $errorSql;
	global $continuaSql;
  
	try {
        
  	    if ( ($continuaSql) && (!is_null($connBD)) ) {
		    @ $connBD->commit();
			if ($connBD->errno != 0) {
			  throw new Exception('<strong>Error al completar transacción: </strong> ('.
				$connBD->errno.') '.$connBD->error);
			}
		}
  	    if ( (!$continuaSql) && (!is_null($connBD)) ) {
		    @ $connBD->rollback();
			if ($connBD->errno != 0) {
			  throw new Exception('<strong>Error al deshacer transacción: </strong> ('.
				$connBD->errno.') '.$connBD->error);
			}
		}
  	    if (!is_null($connBD))  {
			@ $connBD->close();
		}
		
	} catch (Exception $e) {
		$errorSql=$e->getMessage();
		$continuaSql=false;
		return null;
	}  
}

?>