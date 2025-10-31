<?php

require_once "dao/include_mysql.php";
require_once "dao/include_vars.php";

$sqlBD = SqlConecta($hostSql, $userSql, $passSql, $basedatosSql);

/* DELETE REGISTRO */
$borrado = false;
if (isset($_GET['del'])) {
    $valores['id_reg'] = addslashes(htmlentities(trim($_GET['del'])));
    if ($valores['id_reg'] != "") {
        $sqlDelete = "DELETE FROM mensajes WHERE id_reg='" . $valores['id_reg'] . "'";
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


/* PREPARAR BD */
	$sqlCursor = sqlQuery($sqlBD, "SHOW TABLES LIKE 'mensajes'");
	if ($sqlCursor->num_rows == 0) {
	
		sqlIniTrans($sqlBD);
		sqlQuery($sqlBD, "
							CREATE TABLE `mensajes` (
							  `id_reg` 			INT PRIMARY KEY AUTO_INCREMENT,
							  `remitente` 		VARCHAR(50) NOT NULL,
							  `destinatario` 	VARCHAR(50) NOT NULL,
							  `mensaje` 		VARCHAR(1000) NOT NULL,
							  `fecha_alta` 		TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
							);
						");

		sqlQuery($sqlBD, "
							ALTER TABLE `mensajes`
							  ADD CONSTRAINT `mensajes_remt` FOREIGN KEY (`remitente`) REFERENCES `usuarios` (`usuario`);
						");

		sqlQuery($sqlBD, "
							ALTER TABLE `mensajes`
							  ADD CONSTRAINT `mensajes_dest` FOREIGN KEY (`destinatario`) REFERENCES `usuarios` (`usuario`);
						");



		sqlFinTrans($sqlBD);
	}


/* RECOGIDA DE DATOS */
$sqlSelect = "SELECT * FROM mensajes ORDER BY fecha_alta DESC";
$sqlCursor = sqlQuery($sqlBD, $sqlSelect);
$arrayMensajes = sqlResultArray($sqlBD, $sqlCursor);

/* OBTENER LISTA DE USUARIOS PARA LOS SELECT */
$sqlUsuarios = "SELECT * FROM usuarios ORDER BY usuario";
$sqlCursorUsuarios = sqlQuery($sqlBD, $sqlUsuarios);
$arrayUsuarios = sqlResultArray($sqlBD, $sqlCursorUsuarios);

SqlDesconecta($sqlBD);		

?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="table-container">
					<h2 class="text-center">Gestión de Mensajes</h2>
					
					<div class="text-end mb-2">
						<button class="btn btn-sm btn-add me-1">
							<i class="fas fa-plus-square"></i> Nuevo Mensaje
						</button>
					</div>				
				
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Remitente</th>
                                <th>Destinatario</th>
                                <th>Mensaje</th>
                                <th>Fecha</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
							<?php for ($i = 0; $i < count($arrayMensajes); $i++) { ?>
                            <tr>
                                <td><?php echo $arrayMensajes[$i]['id_reg']; ?></td>
								<td><?php echo $arrayMensajes[$i]['remitente']; ?></td>
								<td><?php echo $arrayMensajes[$i]['destinatario']; ?></td>
								<td class="mensaje-corto" title="<?php echo htmlspecialchars($arrayMensajes[$i][3]); ?>">
                                    <?php echo htmlspecialchars($arrayMensajes[$i]['mensaje']); ?>
                                </td>
								<td><?php echo $arrayMensajes[$i]['fecha_alta']; ?></td>
                                <td>
									<?php if ($_SESSION['usuario']==$arrayMensajes[$i]['remitente']) { ?>
                                    <button class="btn btn-sm btn-edit me-1" 
                                            data-id="<?php echo $arrayMensajes[$i]['id_reg']; ?>">
                                        <i class="fas fa-edit"></i> Editar
                                    </button>
                                    <button class="btn btn-sm btn-delete"    
                                            data-id="<?php echo $arrayMensajes[$i]['id_reg']; ?>"
                                            data-mensaje="<?php echo $arrayMensajes[$i]['remitente']; ?>">
                                        <i class="fas fa-trash"></i> Borrar
                                    </button>
									<?php } ?>
                                </td>
                            </tr>
							<?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>

			<!-- Modal de Confirmación -->
			<div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="confirmModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="confirmModalLabel">Confirmar Acción</h5>
							<button type="button" id="btn-closeDelete" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div id="mensajeConfirm" class="modal-body">
							¿Estás seguro de que deseas eliminar este mensaje?
						</div>
						<div class="modal-footer">
							<button type="button" id="btn-cancelDelete" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
							<button type="button" id="btn-confirmDelete" class="btn btn-danger">Eliminar</button>
						</div>
					</div>
				</div>
			</div>
        </div>
    </div>
	
