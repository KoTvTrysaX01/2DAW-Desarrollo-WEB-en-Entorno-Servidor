<?php

	/* Carga de includes de BD */
	require_once "dao/include_mysql.php";
	require_once "dao/include_vars.php";

	/* INICIAR DE DATOS */
	$valores= array(
		'id' => "",
		'nombre_completo' => "",
		'telefono' => "",
		'email' => "",
		'fecha_cita' => "",
		'hora_cita' => "",
		'observaciones' => ""
	);
	
	
	/* RECOGER parámetros GET o POST */
	$grabar=false;
	if (isset($_POST['btnGrabar'])) {
		if(isset($_POST['nombre_completo'])){
			$valores['nombre_completo']=addslashes(trim($_POST['nombre_completo']));
		}
		if(isset($_POST['telefono'])){
			$valores['telefono']=addslashes(trim($_POST['telefono']));
		}
		if(isset($_POST['email'])){
			$valores['email']=addslashes(trim($_POST['email']));
		}
		if(isset($_POST['fecha_cita'])){
			$valores['fecha_cita']=addslashes(trim($_POST['fecha_cita']));
		}
		if(isset($_POST['hora_cita'])){
			$valores['hora_cita']=addslashes(trim($_POST['hora_cita']));
		}
		if(isset($_POST['observaciones'])){
			$valores['observaciones']=addslashes(trim($_POST['observaciones']));
		}
		
		$grabar=true;
		
	}
		
		
	/* VALIDACION */
	if ($grabar) {
		// Campos obligatorios
		if ( 
				($valores['nombre_completo']=="") ||
				($valores['telefono']=="") ||
				($valores['email']=="") ||
				($valores['fecha_cita']=="") ||
				($valores['hora_cita']=="") 
			){
				$grabar=false;
				// echo "Obligatorios";
		}
	}

	/* PROCESO DE GRABACIÓN*/
	$sqlSelect="";
	if ($grabar) {
		$sqlBD = sqlConecta($hostSql, $userSql, $passSql, $basedatosSql);
		
		$sqlSelect="INSERT INTO citas 
						(nombre_completo, telefono, email, fecha_cita, 
							hora_cita, observaciones) 
					VALUES (
								 '".$valores['nombre_completo']."',
								 '".$valores['telefono']."',
								 '".$valores['email']."',
								 '".$valores['fecha_cita']."',
								 '".$valores['hora_cita']."',
								 '".$valores['observaciones']."'
							)
					";
			
		// echo $sqlSelect;
		sqlIniTrans($sqlBD);					
		$sqlCursor = sqlQuery($sqlBD, $sqlSelect);
		$numerror="";
		$menerror="";
		if (!$continuaSql) {
			$bdResultado=false; // Ha habido algún error
		} else {
			$bdResultado=true;	// Grabación realizada
		}
		sqlFinTrans($sqlBD);
		
		sqlDesconecta($sqlBD);	
	} 
	

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solicitud de Cita Dental</title>
	
    <!-- Bootstrap CSS -->
    <link href="extension/bootstrap/bootstrap.min.css" rel="stylesheet">
	
    <style>
        
        .container {
            max-width: 800px;
            width: 100%;
            background-color: #f0f8ff;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        
        .header {
            background-color: #2c7fb8;
            color: white;
            padding: 20px;
            text-align: center;
        }
        
        .header h1 {
            margin: 0;
            font-size: 24px;
        }
        
        .header p {
            margin: 10px 0 0;
            opacity: 0.9;
        }
        
        .form-container {
            padding: 30px;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #333;
        }
        
        input, textarea, select {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 16px;
            transition: border-color 0.3s;
        }
        
        input:focus, textarea:focus, select:focus {
            border-color: #2c7fb8;
            outline: none;
            box-shadow: 0 0 0 2px rgba(44, 127, 184, 0.2);
        }
        
        textarea {
            min-height: 120px;
            resize: vertical;
        }
        
        .datetime-group {
            display: flex;
            gap: 15px;
        }
        
        .datetime-group > div {
            flex: 1;
        }
        
        .submit-btn {
            background-color: #2c7fb8;
            color: white;
            border: none;
            padding: 14px 20px;
            font-size: 16px;
            border-radius: 8px;
            cursor: pointer;
            width: 100%;
            font-weight: 600;
            transition: background-color 0.3s;
        }
        
        
        .confirmation {
            text-align: center;
            padding: 30px;
            background-color: #f8fff8;
            border-radius: 10px;
            border: 1px solid #4CAF50;
            margin-top: 20px;
        }
        
        .confirmation h3 {
            color: #4CAF50;
            margin-top: 0;
        }
        
        .confirmation p {
            margin-bottom: 15px;
        }
        
        .required::after {
            content: " *";
            color: #e74c3c;
        }
        
        @media (max-width: 600px) {
            .datetime-group {
                flex-direction: column;
                gap: 15px;
            }
            
            .form-container {
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="container p-0 mt-5">
        <div class="header">
            <h1>Solicitud de Cita Dental</h1>
            <p>Complete el formulario para solicitar su cita. Nos pondremos en contacto para confirmar.</p>
        </div>

		<div class="p-2">
			<!-- Mensaje de éxito al grabar (oculto inicialmente) -->
			<div class="alert alert-success mt-4" role="alert" id="successAlert" style="display: none;">
				<i class="bi bi-check-circle-fill me-2"></i> Los datos se han guardado correctamente.
			</div>

			<!-- Mensaje de errores (oculto inicialmente) -->
			<div class="alert alert-danger mt-4" role="alert" id="errorAlert" style="display: none;">
				<i class="bi bi-x-circle-fill me-2"></i> Existen errores en los datos. Por favor, revíselos e intente grabar de nuevo.
			</div>
						
						
						
						
			
			<div id="form-container" name="form-container" class="form-container">
				<form 	id="formulario" 
						name="formulario"
						novalidate
						enctype="multipart/form-data"
						method="POST" 
						action="#"
						>
						
					<div class="form-group">
						<label for="nombre_completo" class="form-label required">Nombre completo</label>
						<input type="text" class="form-control" id="nombre_completo" name="nombre_completo" required placeholder="Ingrese su nombre completo">
						<div class="invalid-feedback">
							 El nombre es obligatorio
						</div>
					</div>
					
					<div class="form-group">
						<label for="telefono" class="form-label required">Teléfono de contacto</label>
						<input type="tel" class="form-control" id="telefono" name="telefono" required placeholder="Ingrese su número de teléfono">
						<div class="invalid-feedback">
							 El teléfono es obligatorio
						</div>
					</div>
					
					<div class="form-group">
						<label for="email" class="form-label required">Correo electrónico</label>
						<input type="email" class="form-control" id="email" name="email" required placeholder="Ingrese su correo electrónico" >
						<div class="invalid-feedback">
							 El email es obligatorio
						</div>
					</div>
					
					<div class="form-group datetime-group">
						<div>
							<label for="fecha_cita" class="form-label required">Día de la cita</label>
							<input type="date" class="form-control" id="fecha_cita" name="fecha_cita" required>
							<div class="invalid-feedback">
								 La fecha es obligatoria
							</div>
						</div>
						
						<div>
							<label for="hora_cita" class="form-label required">Hora de la cita</label>
							<select id="hora_cita" name="hora_cita" class="form-control" required>
								<option value="">Seleccione una hora</option>
								<option value="09:00">09:00</option>
								<option value="09:30">09:30</option>
								<option value="10:00">10:00</option>
								<option value="10:30">10:30</option>
								<option value="11:00">11:00</option>
								<option value="11:30">11:30</option>
								<option value="12:00">12:00</option>
								<option value="12:30">12:30</option>
								<option value="13:00">13:00</option>
								<option value="13:30">13:30</option>
								<option value="14:00">14:00</option>
								<option value="14:30">14:30</option>
								<option value="15:00">15:00</option>
								<option value="15:30">15:30</option>
								<option value="16:00">16:00</option>
								<option value="16:30">16:30</option>
								<option value="17:00">17:00</option>
							</select>
							<div class="invalid-feedback">
								 La hora es obligatoria
							</div>
						</div>
					</div>
					
					<div class="form-group">
						<label for="observaciones" class="form-label">Observaciones</label>
						<textarea id="observaciones" name="observaciones" 
								  class="form-control" 
								  rows="4"
								  placeholder="Describa el motivo de su consulta o cualquier observación relevante"></textarea>
					</div>
					
					<button type="submit" class="btn btn-dark" id="btnGrabar" name="btnGrabar">Solicitar Cita</button>
				</form>
			 </div>   
			 
			 
			 <div class="confirmation d-none my-3" id="confirmation" name="confirmation">
					<h3>¡Cita Solicitada Exitosamente!</h3>
					<p>Hemos recibido su solicitud de cita para el día 
						<span id="confirmationDate"><?php echo date('d/m/Y', strtotime($valores['fecha_cita'])); ?></span> a las 
						<span id="confirmationTime"><?php echo $valores['hora_cita']; ?></span>.</p>
					<p>Nos pondremos en contacto con usted en las próximas 24 horas para confirmar la cita.</p>
					<p>Gracias por confiar en nosotros.</p>
					<div>
						<a class="btn btn-dark" href="<?php echo $_SERVER['PHP_SELF']; ?>" >
							Volver
						</a>
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

	<!-- Jquery JS -->
	<script src="extension/jquery/jquery-3.7.1.min.js"></script>
	
	<script>
	
		// RECOGER DATOS PARA EDICIÓN
		function cargarDatosParaEdicion(nombre_completo, telefono, email, fecha_cita, hora_cita, observaciones) {
			$("#nombre_completo").val(nombre_completo);
			$("#telefono").val(telefono);
			$("#email").val(email);
			$("#fecha_cita").val(fecha_cita);
			$("#hora_cita").val(hora_cita);
			$("#observaciones").val(observaciones);
		}

		// MENSAJES
		function mensajeExito() {
			$("#form-container").hide();
			$("#successAlert").fadeIn().delay(5000).fadeOut();
			
			$("#confirmation").removeClass('d-none');
		}
		
		function mensajeErrores() {
			$("#errorAlert").fadeIn().delay(5000).fadeOut();
		}

		// Al cargar el documento
		$(document).ready(function () {
			
			// Datos por defecto
			cargarDatosParaEdicion("", "", "", "", "", "");
			
			<?php   if ($grabar) { 
						if ($bdResultado) {		?>
							mensajeExito();
			<?php 		} else { ?>
							mensajeErrores();
			<?php 		} 
					}
			?>
			
			// SUBMIT - GRABAR
			const form = $("#formulario");
			form.on("submit", function (event) {
				if (!form[0].checkValidity()) { // No se han validado los valores de los campos
					event.preventDefault(); 	// Evita envío del formulario
					event.stopPropagation();	// Evita que continue el evento a etiquetas padres del DOM

					// Activar validación de campos y mensaje de error
					form.addClass("was-validated");
					mensajeErrores();
					return false;
				} 
			});

		});
	</script>
</body>
</html>