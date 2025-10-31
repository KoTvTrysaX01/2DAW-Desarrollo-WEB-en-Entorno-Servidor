<?php

require_once "dao/include_mysql.php";
require_once "dao/include_vars.php";

$sqlBD = sqlConecta($hostSql, $userSql, $passSql, $basedatosSql);

/* INICIAR DE DATOS */
$valores = array(
    'id_reg' => "",
    'remitente' => "",
    'destinatario' => "",
    'mensaje' => "",
    'fecha_alta' => ""
);

/* OBTENER LISTA DE USUARIOS PARA LOS SELECT */
$sqlUsuarios = "SELECT * FROM usuarios ORDER BY usuario";
$sqlCursorUsuarios = sqlQuery($sqlBD, $sqlUsuarios);
$arrayUsuarios = sqlResultArray($sqlBD, $sqlCursorUsuarios);

/* RECOGIDA DE DATOS DE LA BASE DE DATOS */
$editar = false;
if (isset($_GET['edit'])) {
    $valores['id_reg'] = addslashes(trim($_GET['edit']));
    if ($valores['id_reg'] != "") {
        // SQL select
        $sqlSelect = "SELECT * FROM mensajes WHERE id_reg='" . $valores['id_reg'] . "'";
        $sqlCursor = sqlQuery($sqlBD, $sqlSelect);
        $mensaje = sqlObtenerRegistro($sqlBD, $sqlCursor);
        
        // Cargar valores
        if (count($mensaje) > 0) {
            $valores['remitente'] = $mensaje['remitente'];
            $valores['destinatario'] = $mensaje['destinatario'];
            $valores['mensaje'] = $mensaje['mensaje'];
            $valores['fecha_alta'] = $mensaje['fecha_alta'];
        }
        
        $editar = true;
    }
}

/* INSERT - UPDATE - RECOGIDA DE DATOS DEL FORMULARIO */
$grabar = false;
if (isset($_POST['btnGrabar'])) {
    if (isset($_POST['id_reg'])) {
        $valores['id_reg'] = addslashes(trim($_POST['id_reg']));
    }
    if (isset($_POST['remitente'])) {
        $valores['remitente'] = addslashes(trim($_POST['remitente']));
    }
    if (isset($_POST['destinatario'])) {
        $valores['destinatario'] = addslashes(trim($_POST['destinatario']));
    }
    if (isset($_POST['mensaje'])) {
        $valores['mensaje'] = addslashes(trim($_POST['mensaje']));
    }
    
    $grabar = true;
}

/* VALIDACION */
if ($grabar) {
    // Campos obligatorios
    if ( 
        ($valores['remitente'] == "") ||
        ($valores['destinatario'] == "") ||
        ($valores['mensaje'] == "")
    ) {
        $grabar = false;
        echo "Campos obligatorios";
    }
    
    // Longitudes 
    if ( 
        (strlen($valores['remitente']) < 1) ||
        (strlen($valores['destinatario']) < 1) ||
        (strlen($valores['mensaje']) < 1) ||
        (strlen($valores['mensaje']) > 1000)
    ) {
        $grabar = false;
        echo "Longitudes incorrectas";
    }
    
    // Validar que remitente y destinatario sean diferentes
    if ($valores['remitente'] == $valores['destinatario']) {
        $grabar = false;
        echo "Remitente y destinatario no pueden ser el mismo";
    }
}

/* PROCESO DE GRABACIÓN */
if ($grabar) {
    if ($valores['id_reg'] != "") {
        $sqlIns = "UPDATE mensajes 
                    SET 
                        remitente='" . $valores['remitente'] . "',
                        destinatario='" . $valores['destinatario'] . "',
                        mensaje='" . $valores['mensaje'] . "'
                    WHERE 
                        id_reg='" . $valores['id_reg'] . "'
                ";
    } else {
        $sqlIns = "INSERT INTO mensajes (remitente, destinatario, mensaje) 
                    VALUES (
                         '" . $valores['remitente'] . "',
                         '" . $valores['destinatario'] . "',
                         '" . $valores['mensaje'] . "'
                    )
            ";
    }
    
    sqlIniTrans($sqlBD);					
    $sqlCursor = sqlQuery($sqlBD, $sqlIns);
    $numerror = "";
    $menerror = "";
    if (!$continuaSql) {
        $numerror = $sqlBD->errno;
        $menerror = $sqlBD->error;
        $bdResultado = false;
        echo "<br>Error SQL: " . $menerror;
    } else {
        $bdResultado = true;
    }
    sqlFinTrans($sqlBD);
} 

sqlDesconecta($sqlBD);

?>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="form-container">
                    <h2 class="text-center header-title">
                        <i class="bi bi-chat-text-fill me-2"></i>Gestión de Mensajes
                    </h2>
					
					<!-- Mensaje de éxito al grabar (oculto inicialmente) -->
					<div class="alert alert-success mt-4" role="alert" id="successAlert" style="display: none;">
						<i class="bi bi-check-circle-fill me-2"></i> El mensaje se ha guardado correctamente.
					</div>

					<!-- Mensaje de éxito al borrar (oculto inicialmente) -->
					<div class="alert alert-success mt-4" role="alert" id="successDelete" style="display: none;">
						<i class="bi bi-check-circle-fill me-2"></i> El mensaje ha sido borrado.
					</div>

					<!-- Mensaje de errores (oculto inicialmente) -->
					<div class="alert alert-danger mt-4" role="alert" id="errorAlert" style="display: none;">
						<i class="bi bi-x-circle-fill me-2"></i> Existen errores en los datos. Por favor, revíselos e intente grabar de nuevo.
					</div>
                    
                    <form 	id="mensajeForm" 
                            name="mensajeForm"
                            novalidate
                            enctype="multipart/form-data"
                            method="POST" 
                            action="#"
                        >
                        <!-- Campo ID (oculto para nuevos mensajes, visible para edición) -->
                        <div class="mb-3" id="idFieldContainer" style="display: none;">
                            <label for="id_reg" class="form-label">ID</label>
                            <input type="text" class="form-control" id="id_reg" name="id_reg" readonly>
                        </div>
                        
                        <!-- Campo Remitente -->
                        <div class="mb-3">
                            <label for="remitente" class="form-label required-field">Remitente</label>
                            <select class="form-select" id="remitente" name="remitente" required>
                                <option value="" selected disabled>Seleccione el remitente</option>
                                <?php foreach ($arrayUsuarios as $usuario): ?>
									<?php if ($_SESSION['usuario']==$usuario['usuario']) { ?>
                                    <option value="<?php echo $usuario['usuario']; ?>">
                                        <?php echo htmlspecialchars($usuario['usuario'] . " (" . $usuario['email'] . ")"); ?>
                                    </option>
									<?php } ?>
                                <?php endforeach; ?>
                            </select>
                            <div class="invalid-feedback">
                                Por favor seleccione un remitente.
                            </div>
                        </div>
                        
                        <!-- Campo Destinatario -->
                        <div class="mb-3">
                            <label for="destinatario" class="form-label required-field">Destinatario</label>
                            <select class="form-select" id="destinatario" name="destinatario" required>
                                <option value="" selected disabled>Seleccione el destinatario</option>
                                <?php foreach ($arrayUsuarios as $usuario): ?>
                                    <option value="<?php echo $usuario['usuario']; ?>">
                                        <?php echo htmlspecialchars($usuario['usuario'] . " (" . $usuario['email'] . ")"); ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                            <div class="invalid-feedback">
                                Por favor seleccione un destinatario.
                            </div>
                        </div>
                                
                        <!-- Campo Mensaje -->
                        <div class="mb-3">
                            <label for="mensaje" class="form-label required-field">Mensaje</label>
                            <textarea class="form-control" id="mensaje" name="mensaje" required 
                                      maxlength="1000" placeholder="Escriba el mensaje (máximo 1000 caracteres)"
                                      rows="5"></textarea>
                            <div class="form-text">
                                <span id="contadorCaracteres">0</span>/1000 caracteres
                            </div>
                            <div class="invalid-feedback">
                                El mensaje es obligatorio y no puede exceder los 1000 caracteres.
                            </div>
                        </div>
                        
                        <!-- Campo Fecha (solo lectura para edición) -->
                        <?php if ($editar): ?>
                        <div class="mb-3">
                            <label for="fecha_alta" class="form-label">Fecha de Creación</label>
                            <input type="text" class="form-control" id="fecha_alta" name="fecha_alta" 
                                   value="<?php echo $valores['fecha_alta']; ?>" readonly>
                        </div>
                        <?php endif; ?>
                        
                        <!-- Botones de acción -->
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
							<button type="button" class="btn btn-warning btn-action" id="btnVolver">
                                <i class="bi bi-arrow-left-circle me-1"></i> Volver
                            </button>
                            <button type="button" class="btn btn-secondary btn-action" id="btnCancelar">
                                <i class="bi bi-x-circle me-1"></i> Cancelar
                            </button>
                            <button id="btnGrabar" name="btnGrabar" type="submit" class="btn btn-primary btn-action">
                                <i class="bi bi-check-circle me-1"></i> Grabar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
