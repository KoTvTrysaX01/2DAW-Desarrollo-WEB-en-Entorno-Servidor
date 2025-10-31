<?php
	
	/* GESTIÓN DE BASE DE DATOS */
	require_once "dao/include_mysql.php";
	require_once "dao/include_vars.php";

	$sqlBD = sqlConecta($hostSql, $userSql, $passSql, $basedatosSql);
	
	
	$sqlCursor = sqlQuery($sqlBD, "SHOW TABLES LIKE 'usuarios'");
	if ($sqlCursor->num_rows == 0) {
	
		sqlIniTrans($sqlBD);
		sqlQuery($sqlBD, "
							CREATE TABLE usuarios (
								usuario	VARCHAR(50)  PRIMARY KEY,
								clave	VARCHAR(100) NOT NULL,
								email	VARCHAR(100) NOT NULL DEFAULT ''
							)
						");

		sqlQuery($sqlBD, "INSERT INTO usuarios(usuario,clave) 
								VALUES ('adminsys', '".password_hash('1234',PASSWORD_DEFAULT)."')");
		sqlQuery($sqlBD, "INSERT INTO usuarios(usuario,clave) 
								VALUES ('adminbd',  '".password_hash('5678',PASSWORD_DEFAULT)."')");
		sqlQuery($sqlBD, "INSERT INTO usuarios(usuario,clave) 
								VALUES ('user',  	  '".password_hash('1234',PASSWORD_DEFAULT)."')");
		sqlFinTrans($sqlBD);
	}

	/* INICIAR DE DATOS */
	$valores= array(
		'usuario' => "",
		'password' => ""
	);
	

	/* RECOGIDA DE DATOS DEL FORMULARIO */
	$entrar=false;
	if (isset($_POST['btnEntrar'])) {
		if(isset($_POST['usuario'])){
			$valores['usuario']=addslashes(trim($_POST['usuario']));
		}
		if(isset($_POST['password'])){
			$valores['password']=addslashes(trim($_POST['password']));
		}
		$entrar=true;
	}
		
		
	/* VALIDACION */
	if ($entrar) {
		// Campos obligatorios
		if ( 
				($valores['usuario']=="") ||
				($valores['password']=="") 
			){
				$entrar=false;
				echo "Obligatorios";
		}
		
		// Longitudes 
		if ( 
				(strlen($valores['usuario'])<3) ||
				(strlen($valores['password'])<4) 
			){
				$entrar=false;
				echo "Longitudes";
		}
		
		// Conversiones
		
	
	}

	/* PROCESO DE IDENTIFICACIÓN */
	$identificado=false;
	if ($entrar) {	
		$sqlSelect="SELECT * FROM usuarios WHERE usuario='".$valores['usuario']."'";
		$sqlCursor=sqlQuery($sqlBD, $sqlSelect);
		$regUsuario=sqlObtenerRegistro($sqlBD, $sqlCursor);
		if (!is_null($regUsuario)) {
			if (isset($regUsuario['clave'])) {
				if (password_verify($valores['password'],$regUsuario['clave'])) {
					$identificado=true;
					$_SESSION['usuario']=$valores['usuario'];
				}
			}
		}
	}

	/* ARRAY DE USUARIOS */
	$sqlSelect="SELECT * FROM usuarios ORDER BY usuario";
	$sqlCursor=sqlQuery($sqlBD, $sqlSelect);
	$listaUsuarios=sqlResultArray($sqlBD, $sqlCursor);
	
	SqlDesconecta($sqlBD);	
	
?>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="form-container">
                    <h2 class="text-center header-title">
                        <i class="bi bi-geo-alt-fill me-2"></i>Identificación de usuarios
                    </h2>
					
					<?php if ($_SESSION['usuario']!="") { ?>

						<!-- Mensaje de éxito (oculto inicialmente) -->
						<div class="alert alert-success mt-4" role="alert" id="successIdentificado" >
							Está identificado como <?php echo $_SESSION['usuario']; ?>
						</div>

					
                        <!-- Botones de acción -->
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
                            <button type="button" class="btn btn-secondary btn-action" id="btnDesconectar">
                                <i class="bi bi-x-circle me-1"></i> Desconectar
                            </button>
                        </div>				

						<!-- Aclaraciones -->
                        <div class="my-3 p-2 border rounded bg-warning-subtle">
							<p>Este formulario en HTML comprueba si ya hemos indeificado al usuario.</p>

							<p>El $_POST recibido es:
								<?php
									echo "<pre>";
									echo "<b>";
									echo "<span class='text-danger'>";
									print_r($_POST);
									echo "</span>";
									echo "</b>";
									echo "</pre>";
								?>	
							</p>						
							
							<p>La información grabada en $_SESSION del servidor es:
								<?php
									echo "<pre>";
									echo "<b>";
									echo "<span class='text-danger'>";
									print_r($_SESSION);
									echo "</span>";
									echo "</b>";
									echo "</pre>";
								?>	
							</p>
							
						</div>							
					
					<?php } else { ?>
					
					<!-- Mensaje de éxito (oculto inicialmente) -->
					<div class="alert alert-success mt-4" role="alert" id="successAlert" style="display: none;">
						<i class="bi bi-check-circle-fill me-2"></i> Identificación correcta
					</div>

					<!-- Mensaje de errores (oculto inicialmente) -->
					<div class="alert alert-danger mt-4" role="alert" id="errorAlert" style="display: none;">
						<i class="bi bi-x-circle-fill me-2"></i> Existen errores en los datos. Por favor, revíselos e inténtelo de nuevo.
					</div>
                    
					
					
					
                    <form 	id="identForm" 
							name="identForm"
							novalidate
							enctype="multipart/form-data"
							method="POST" 
							action="<?php echo $_SERVER['PHP_SELF']; ?>?page=identifica"
						>
                        
                        <!-- Campo Usuario -->
                        <div class="mb-3">
                            <label for="usuario" class="form-label required-field">Usuario</label>
                            <input type="text" class="form-control" id="usuario" name="usuario" required 
                                   minlength="3" placeholder="Ingrese el usuario">
                            <div class="invalid-feedback">
                                El usuario debe tener al menos 3 caracteres.
                            </div>
                        </div>
                        
                        <!-- Campo Código -->
                        <div class="mb-3">
                            <label for="password" class="form-label required-field">Contraseña</label>
                            <input type="password" class="form-control" id="password" name="password" required 
                                   minlength="4" placeholder="Ingrese el password">
                            <div class="invalid-feedback">
                                El password debe tener al menos 4 caracteres.
                            </div>
                        </div>
                                
                        <!-- Botones de acción -->
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
                            <button type="button" class="btn btn-secondary btn-action" id="btnCancelar">
                                <i class="bi bi-x-circle me-1"></i> Cancelar
                            </button>
                            <button id="btnEntrar" name="btnEntrar" type="submit" class="btn btn-primary btn-action">
                                <i class="bi bi-check-circle me-1"></i> Entrar
                            </button>
                        </div>
						
						<!-- Aclaraciones -->
                        <div class="mt-3 p-2 border rounded bg-warning-subtle">
							<p>Este formulario en HTML valida que los campos se hayan completado correctamente según las restricciones indicadas en los campos &lt;input&gt;</p>
							
							<p>Además, en PHP se recogen los valores del formulario al grabar que son:
								<?php
									echo "<pre>";
									echo "<b>";
									echo "<span class='text-danger'>";
									print_r($_POST);
									echo "</span>";
									echo "</b>";
									echo "</pre>";
								?>							
							y se comprueban las restricciones establecidas como campos obligatorios o longitudes mínimas.</p>
							
							<p>Por último, también en PHP comprueba que los valores se encuentren en la tabla de usuarios para dar un mensaje de éxito.<br>							
							La clave o password se guardan encriptados.<br>
							Los usuarios <b>adminsys</b> y <b>user</b> tienen la clave <b>1234</b>
								y la de <b>admin</b> es  <b>5678</b><br>
							Los datos actuales existentes en la BD son:</p>
						</div>
						<div class="p-2 border rounded bg-warning-subtle overflow-auto">
							<table class="table table-sm table-bordered table-dark">
								<thead class="table-dark">
									<tr>
										<td>usuario</td>
										<td>clave</td>
										<td>email</td>
									</tr>
								</thead>
								<tbody class="table-light">
								<?php foreach ($listaUsuarios as $reg) { ?>
									<tr>
										<td><?= $reg['usuario']; ?></td>
										<td><?= $reg['clave']; ?></td>
										<td><?= $reg['email']; ?></td>
									</tr>
								<?php } ?>
								</tbody>
							</table>
						</div>
						<div class="mb-3 p-2 border rounded bg-warning-subtle overflow-auto">
							<p>
							En este formulario más completo se guarda en $_SESSION el usuario identificado.<br>
							Si no hay ningún usuario identifiado se muestra el formulario, <br>
							y en caso contrario, mostramos los datos del usuario y un botón para desconectar.
							</p>
						</div>	
                    </form>
					
					<?php } ?>
                </div>
                

                
            </div>
        </div>
    </div>
