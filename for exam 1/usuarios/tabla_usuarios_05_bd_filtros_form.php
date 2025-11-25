<?php

	/* Carga de includes de BD */
	require_once "dao/include_mysql.php";
	require_once "dao/include_vars.php";
	
	/* RECOGER parámetros GET o POST */
	$filtros= array(
			'estado' => "",
			'rol' 	 => ""
	);

	if (isset($_POST['btnFiltros'])) {
		if(isset($_POST['estado'])){
			$filtros['estado']=addslashes(trim($_POST['estado']));
		}
		if(isset($_POST['rol'])){
			$filtros['rol']=addslashes(trim($_POST['rol']));
		}
	}		
	
	/* PREPARAR SQL */
	$condicion="";
	if ($filtros['estado']!="") {
		if ($condicion=="") $condicion=$condicion." WHERE "; else  $condicion=$condicion." AND ";
		$condicion=$condicion." estado='".$filtros['estado']."' ";
	}
	if ($filtros['rol']!="") {
		if ($condicion=="") $condicion=$condicion." WHERE "; else  $condicion=$condicion." AND ";
		$condicion=$condicion." rol='".$filtros['rol']."' ";
	}
	$sqlSelect="SELECT * FROM usuarios ".$condicion." ORDER BY nombre";

	/* RECOGIDA DE DATOS de la BD */
	$sqlBD = SqlConecta($hostSql, $userSql, $passSql, $basedatosSql);
	$sqlCursor=sqlQuery($sqlBD, $sqlSelect);
	$usuarios=sqlResultArray($sqlBD, $sqlCursor);
	SqlDesconecta($sqlBD);	


	/* FUNCIONES DEFINIDAS POR EL USUARIO */
	
	// Función para obtener la clase CSS con el color de fondo según el rol
	function obtenerColorRol($rol) {
					
		$clases = [
				'Administrador' => 'bg-primary',
				'Editor' => 'bg-success',
				'Usuario' => 'bg-info',
				'Moderador' => 'bg-warning text-dark',
				'Invitado' => 'bg-secondary'
			];
		$resul="bg-secondary"; // Valor por defecto
		if (isset($clases[$rol])) {
			$resul=$clases[$rol];
		}
					
		return $resul;
	}

	// Función para obtener la clase CSS del estado
	function obtenerClaseEstado($estado) {
		return $estado === 'activo' ? 'status-activo' : 'status-inactivo';
	}

	// Función para obtener el texto del estado
	function obtenerTextoEstado($estado) {
		return $estado === 'activo' ? 'Activo' : 'Inactivo';
	}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla Bootstrap con PHP</title>
	
    <!-- Bootstrap 5 CSS -->
    <link href="extension/bootstrap/bootstrap.min.css" rel="stylesheet">
	
    <style>
        .table-hover tbody tr:hover {
            background-color: rgba(0, 123, 255, 0.1);
        }
        .status-activo {
            color: #198754;
        }
        .status-inactivo {
            color: #dc3545;
        }
        .badge-custom {
            font-size: 0.75em;
        }
    </style>
</head>
<body class="bg-light">

  <!-- Filter -->
  <div class="container mb-5">
        <div class="row">
            <div class="col-12">
                <!-- Título Simple -->
                <h1 class="h3 text-center mb-4">Lista de Usuarios</h1>
			</div>
		</div>
	<form 	id="filtrosForm" 
			name="filtrosForm"
							novalidate
							enctype="multipart/form-data"
							method="POST" 
							action="#"
						>
    <div class="filter-section">
      <div class="row g-3 align-items-center">
        <div class="col-md-4">
          <label for="estado" class="form-label fw-bold">Estado de usuario</label>
          <select class="form-select" id="estado" name="estado">
            <option value=""            <?php if ($filtros['estado']=="") echo " selected "; ?>>Todos los estados</option>
            <option value="activo"      <?php if ($filtros['estado']=="activo") echo " selected "; ?>>Activo</option>
            <option value="inactivo"    <?php if ($filtros['estado']=="inactivo") echo " selected "; ?>>Inactivo</option>
          </select>
        </div>
        <div class="col-md-4">
          <label for="rol" class="form-label fw-bold">Rol del usuario</label>
          <select class="form-select" id="rol" name="rol">
            <option value=""      <?php if ($filtros['rol']=="") echo " selected "; ?>>Todos los roles</option>
            <option value="Administrador" <?php if ($filtros['rol']=="Administrador") echo " selected "; ?>>Administrador</option>
            <option value="Moderador"     <?php if ($filtros['rol']=="Moderador") echo " selected "; ?>>Moderador</option>
            <option value="Editor"        <?php if ($filtros['rol']=="Editor") echo " selected "; ?>>Editor</option>
			<option value="Usuario"       <?php if ($filtros['rol']=="Usuario") echo " selected "; ?>>Usuario</option>
			<option value="Invitado"      <?php if ($filtros['rol']=="Invitado") echo " selected "; ?>>Invitado</option>
          </select>
        </div>
        <div class="col-md-4 d-flex align-items-end mt-auto">
          <button class="btn btn-primary w-100" id="btnFiltros" name="btnFiltros">Aplicar filtros</button>
        </div>
      </div>
    </div>
	</form>
  </div>

    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <!-- Card con Tabla -->
                <div class="card shadow-sm">
                    <div class="card-header bg-white text-center">
                        <h5 class="card-title mb-0">Usuarios Registrados</h5>
                    </div>
                    
                    <div class="card-body p-0">
                        <!-- Tabla Responsive -->
                        <div class="table-responsive">
                            <table class="table table-hover table-striped mb-0">
                                <thead class="table-dark">
                                    <tr>
                                        <th scope="col" class="text-center">#</th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Email</th>
                                        <th scope="col" class="text-center">Rol</th>
                                        <th scope="col" class="text-center">Estado</th>
                                        <th scope="col" class="text-center">Fecha Registro</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // Recorrer el array de usuarios con un bucle for
                                    for ($i = 0; $i < count($usuarios); $i++) {
                                        $usuario = $usuarios[$i];
                                        $claseColorRol = obtenerColorRol($usuario['rol']);
                                        $claseEstado = obtenerClaseEstado($usuario['estado']);
                                        $textoEstado = obtenerTextoEstado($usuario['estado']);
                                    ?>
                                    <tr>
                                        <th scope="row" class="text-center"><?php echo $usuario['id']; ?></th>
                                        <td><?php echo $usuario['nombre']; ?></td>
                                        <td><?php echo $usuario['email']; ?></td>
                                        <td class="text-center">
                                            <span class="badge <?php echo $claseColorRol; ?> badge-custom">
                                                <?php echo $usuario['rol']; ?>
                                            </span>
                                        </td>
                                        <td class="text-center">
                                            <span class="<?php echo $claseEstado; ?>">
                                                <?php echo $textoEstado; ?>
                                            </span>
                                        </td>
                                        <td class="text-center"><?php echo $usuario['fecha_registro']; ?></td>
                                    </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Información adicional usando foreach -->
                <div class="card mt-4">
                    <div class="card-header">
                        <h6 class="card-title mb-0">Resumen de Usuarios</h6>
                    </div>
                    <div class="card-body">
                        <?php
                        // Contar usuarios por estado usando foreach
                        $activos = 0;
                        $inactivos = 0;
                        
                        foreach ($usuarios as $usuario) {
                            if ($usuario['estado'] === 'activo') {
                                $activos++;
                            } else {
                                $inactivos++;
                            }
                        }
                        
                        // Contar usuarios por rol
                        $roles = [];
                        foreach ($usuarios as $usuario) {
                            $rol = $usuario['rol'];
                            if (!isset($roles[$rol])) {
                                $roles[$rol] = 0;
                            }
                            $roles[$rol]++;
                        }
                        ?>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <h6>Por Estado:</h6>
                                <ul class="list-unstyled">
                                    <li><span class="badge bg-success"><?php echo $activos; ?></span> 
										Activos
									</li>
                                    <li><span class="badge bg-danger"><?php echo $inactivos; ?></span> 
										Inactivos
									</li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <h6>Por Rol:</h6>
                                <ul class="list-unstyled">
                                    <?php
                                    foreach ($roles as $rol => $cantidad) {
                                        $claseColorRol = obtenerColorRol($rol);
                                        echo "<li>";
										echo "<span class='badge ".$claseColorRol."'>".$cantidad."</span> ";
										echo $rol;
										echo "</li>";
                                    }
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container my-5">
        <div class="row">
            <div class="col-12">
                <!-- Card con Tabla -->
                <div class="card shadow-sm">
                    <div class="card-header bg-warning text-center">
                        <h5 class="card-title mb-0">SQL Realizada (Eliminar en producción)</h5>
                    </div>
					<div class="p-2">
						<?php echo $sqlSelect; ?>
					</div>
				</div>
			</div>
			<?php if ($errorSql!="") { ?>
				<div class="col-12">
					<!-- Card con Tabla -->
					<div class="card shadow-sm">
						<div class="card-header bg-danger text-white text-center">
							<h5 class="card-title mb-0">Error</h5>
						</div>
						<div class="p-2">
							<?php echo $errorSql; ?>
						</div>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>

    <!-- Bootstrap JS -->
    <script src="extension/bootstrap/bootstrap.bundle.min.js"></script>
	
</body>
</html>