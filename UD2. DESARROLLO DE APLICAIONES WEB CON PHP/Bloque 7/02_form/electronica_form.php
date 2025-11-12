<?php

require_once "./include_mysql.php";
require_once "./include_vars.php";

$sqlBD = sqlConecta($hostSql, $userSql, $passSql, $basedatosSql);


/* INICIAR DE DATOS */
$valores = array(
	'id' => "",
	'nombre' => "",
	'categoria' => "",
	'precio' => "",
	'fabricante' => "",
	'stock' => ""
);

/* RECOGIDA DE DATOS DE LA BASE DE DATOS */
$editar = false;
if (isset($_GET['edit'])) {
	$valores['id'] = addslashes(trim($_GET['edit']));
	if ($valores['id'] != "") {
		// SQL select
		$sqlSelect = "SELECT * FROM electronica WHERE id='".$valores['id']."'";
		$sqlCursor = sqlQuery($sqlBD, $sqlSelect);
		$electronica = sqlObtenerRegistro($sqlBD, $sqlCursor);

		// Cargar valores
		if (count($electronica) > 0) {
			$valores['nombre'] = $electronica['nombre'];
			$valores['categoria'] = $electronica['categoria'];
			$valores['precio'] = $electronica['precio'];
			$valores['fabricante'] = $electronica['fabricante'];
			$valores['stock'] = $electronica['stock'];
		}

		$editar = true;
	}
}

/* INSERT - UPDATE - RECOGIDA DE DATOS DEL FORMULARIO */
$grabar = false;
if (isset($_POST['btnGrabar'])) {
	if (isset($_POST['id'])) {
		$valores['id'] = addslashes(trim($_POST['id']));
	}
	if (isset($_POST['nombre'])) {
		$valores['nombre'] = addslashes(trim($_POST['nombre']));
	}
	if (isset($_POST['categoria'])) {
		$valores['categoria'] = addslashes(trim($_POST['categoria']));
	}
	if (isset($_POST['precio'])) {
		$valores['precio'] = addslashes(trim($_POST['precio']));
	}
	if (isset($_POST['fabricante'])) {
		$valores['fabricante'] = addslashes(trim($_POST['fabricante']));
	}
	if (isset($_POST['stock'])) {
		$valores['stock'] = addslashes(trim($_POST['stock']));
	}

	$grabar = true;
}


/* VALIDACION */
if ($grabar) {
	// Campos obligatorios
	if (
		($valores['nombre'] == "") ||
		($valores['categoria'] == "") ||
		($valores['precio'] == "") ||
		($valores['fabricante'] == "") ||
		($valores['stock'] == "")
	) {
		$grabar = false;
		echo "Obligatorios";
	}

	// Longitudes 
	if (
		(strlen($valores['nombre']) < 5) ||
		(strlen($valores['precio']) <= 0) ||
		(strlen($valores['fabricante']) < 4) ||
		(strlen($valores['stock']) == null)
	) {
		$grabar = false;
		echo "Longitudes";
	}

	// Conversiones
	$valores['nombre'] = strtoupper($valores['nombre']);
}

/* PROCESO DE GRABACIÓN*/
if ($grabar) {
	if ($valores['id'] != "") {
		$sqlIns = "UPDATE electronica 
							SET 
								nombre='" . $valores['nombre'] . "',
								categoria='" . $valores['categoria'] . "',
								precio='" . $valores['precio'] . "',
								fabricante='" . $valores['fabricante'] . "',
								stock='" . $valores['stock'] . "'
							WHERE 
								id='" . $valores['id'] . "'
						";
	} else {
		// El id se genera automáticamente porque es AUTO_INCREMENT en MySQL
		$sqlIns = "INSERT INTO electronica (nombre, categoria, precio, fabricante, stock) 
							VALUES (
								 '" . $valores['nombre'] . "',
								 '" . $valores['categoria'] . "',
								 '" . $valores['precio'] . "',
								 '" . $valores['fabricante'] . "',
								 '" . $valores['stock'] . "'
							)
					";
	}

	// echo $sqlIns;
	sqlIniTrans($sqlBD);
	$sqlCursor = sqlQuery($sqlBD, $sqlIns);
	$numerror = "";
	$menerror = "";
	if (!$continuaSql) {
		$numerror = $sqlBD->errno;
		$menerror = $sqlBD->error;
		$bdResultado = false; // Ha habido algún error
		echo "<br>Error SQL: " . $menerror;
	} else {
		$bdResultado = true;	// Grabación realizada
	}
	sqlFinTrans($sqlBD);
}

sqlDesconecta($sqlBD);

?>
<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>electronica</title>

	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

	<!-- Bootstrap Icons -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">

	<!-- Font Awesome para iconos -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">


	<style>
		.form-container {
			background-color: #eeeeee;
			border-radius: 10px;
			padding: 25px;
			box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
			margin-top: 20px;
		}

		.header-title {
			color: #0d6efd;
			border-bottom: 2px solid #0d6efd;
			padding-bottom: 10px;
			margin-bottom: 20px;
		}

		.required-field::after {
			content: "*";
			color: red;
			margin-left: 4px;
		}

		.btn-action {
			min-width: 100px;
		}
	</style>
</head>

<body>
	<div class="container py-5">
		<div class="row justify-content-center">
			<div class="col-lg-8">
				<div class="form-container">
					<h2 class="text-center header-title">
						<i class="bi bi-geo-alt-fill me-2"></i>Gestión de electronica
					</h2>

					<!-- Mensaje de éxito al grabar (oculto inicialmente) -->
					<div class="alert alert-success mt-4" role="alert" id="successAlert" style="display: none;">
						<i class="bi bi-check-circle-fill me-2"></i> Los datos se han guardado correctamente.
					</div>

					<!-- Mensaje de éxito al borrar (oculto inicialmente) -->
					<div class="alert alert-success mt-4" role="alert" id="successDelete" style="display: none;">
						<i class="bi bi-check-circle-fill me-2"></i> La electronica $electronica ha sido borrada.
					</div>


					<!-- Mensaje de errores (oculto inicialmente) -->
					<div class="alert alert-danger mt-4" role="alert" id="errorAlert" style="display: none;">
						<i class="bi bi-x-circle-fill me-2"></i> Existen errores en los datos. Por favor, revíselos e intente grabar de nuevo.
					</div>




					<form id="electronicaForm"
						name="electronicaForm"
						novalidate
						enctype="multipart/form-data"
						method="POST"
						action="#">
						<!-- Campo ID (oculto para nuevas electronica, visible para edición) -->
						<div class="mb-3" id="idFieldContainer" style="display: none;">
							<label for="id" class="form-label">ID</label>
							<input type="text" class="form-control" id="id" name="id" readonly>
						</div>

						<!-- Campo Nombre -->
						<div class="mb-3">
							<label for="nombre" class="form-label required-field">Nombre</label>
							<input type="text" class="form-control" id="nombre" name="nombre" required
								minlength="5" placeholder="Ingrese el nombre de la electronica">
							<div class="invalid-feedback">
								El nombre de la electronica es obligatorio y debe tener al menos 5 caracteres.
							</div>
						</div>

						<!-- Campo Categoría -->
						<div class="mb-3">
							 <label for="categoria" class="form-label required-field">Categoría</label>
                            <select class="form-select" id="categoria" name="categoria" required>
                                <option value="" selected disabled>Seleccione una categoría de la electronica</option>
                                <option value="Tarjeta Gráfica">Tarjeta Gráfica</option>
								<option value="Placa Base">Placa Base</option>
                                <option value="CPU">CPU</option>
                                <option value="PSU">PSU</option>
                                <option value="Caja">Caja</option>
                                <option value="RAM">RAM</option>
                            </select>
							<div class="invalid-feedback">
								Por favor seleccione una categoría.
							</div>
						</div>

						<!-- Campo Precio -->
						<div class="mb-3">
							<label for="precio" class="form-label required-field">Precio</label>
							<input type="number" min="0" max="1000" step="0.01" class="form-control" id="precio" name="precio" required>
							</input>
							<div class="invalid-feedback">
								Por favor seleccione un precio adecuado (0-1000).
							</div>
						</div>

						<!-- Campo Fabricante -->
						<div class="mb-3">
							<label for="fabricante" class="form-label required-field">Fabricante</label>
							<input type="text" class="form-control" id="fabricante" name="fabricante" required
								minlength="4" placeholder="Ingrese la fabricante de la electronica">
							<div class="invalid-feedback">
								La fabricante es obligatoria y debe tener al menos 4 caracteres.
							</div>
						</div>

						<!-- Campo Stock -->
						<div class="mb-3">
							<label for="stock" class="form-label required-field">Stock</label>
							<input type="radio" id="1" name="stock" value="1" <?php if($valores['stock'] == 1) echo "checked";?>>
							<label for="1">True</label>
							<input type="radio" id="0" name="stock" value="0" <?php if($valores['stock'] == 0) echo "checked";?>>
							<label for="0">False</label><br>
							<div class="invalid-feedback">
								El campo de stocks es obligatorio.
							</div>
						</div>

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

	<!-- Bootstrap JS y dependencias -->
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

	<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
	<script>
		// electronica
		// Métodos personalizados 
		function cargarDatosParaEdicion(id, nombre, categoria, precio, fabricante, stock) {
			if (id == "") {
				$("#idFieldContainer").hide(); // En nuevo registro
				$(".header-title").html('<i class="bi bi-pencil-square me-2"></i>Nueva Electronica');
			} else {
				$("#idFieldContainer").show(); // En edición de registro
				$(".header-title").html('<i class="bi bi-pencil-square me-2"></i>Editar Electronica');
			}
			$("#id").val(id);
			$("#nombre").val(nombre);
			$("#categoria").val(categoria);
			$("#precio").val(precio);
			$("#fabricante").val(fabricante);
			$("#stock").val(stock);
		}

		function cargarDatosParaNuevo() {
			cargarDatosParaEdicion("", "", "", "", "", "");
		}


		// MENSAJES
		function mensajeExito() {
			$("#successAlert").fadeIn().delay(5000).fadeOut();
		}

		function mensajeDelete() {
			$("#successDelete").fadeIn().delay(5000).fadeOut();
		}

		function mensajeErrores() {
			$("#errorAlert").fadeIn().delay(5000).fadeOut();
		}

		function refrescarDatos() {
			<?php if ($editar) { ?>
				cargarDatosParaEdicion(
					'<?php echo $valores['id']; ?>',
					'<?php echo $valores['nombre']; ?>',
					'<?php echo $valores['categoria']; ?>',
					'<?php echo $valores['precio']; ?>',
					'<?php echo $valores['fabricante']; ?>',
					'<?php echo $valores['stock']; ?>'
				);
			<?php } else { ?>
				cargarDatosParaNuevo();
			<?php } ?>
		}

		// Al cargar el documento
		$(document).ready(function() {

			// ***********************************
			// EDICIÓN
			refrescarDatos();
			// ***********************************			



			const form = $("#electronicaForm");

			<?php if ($grabar) {
				if ($bdResultado) {		?>
					mensajeExito();
				<?php 		} else { ?>
					mensajeErrores();
			<?php 		}
			}
			?>


			/*
					// Convertir Categoría a mayúsculas automáticamente en Javascript
					$("#categoria").on("input", function () {
						$(this).val($(this).val().toUpperCase());
					});
			*/


			// SUBMIT - GRABAR
			form.on("submit", function(event) {
				if (!form[0].checkValidity()) { // No se han validado los valores de los campos
					event.preventDefault(); // Evita envío del formulario
					event.stopPropagation(); // Evita que continue el evento a etiquetas padres del DOM

					// Campos con mensaje variable
					// const categoria = $("#categoria");
					// if (categoria[0].validity.patternMismatch) {
					// 	categoria.next(".invalid-feedback").text("Debe teclear al menos 3 letras.");
					// } else {
					// 	categoria.next(".invalid-feedback").text("El Categoría es obligatorio.");
					// }

					// Activar validación de campos y mensaje de error
					form.addClass("was-validated");
					mensajeErrores();
					return false;
				}
			});

			// CANCELAR
			$("#btnCancelar").on("click", function() {
				// Recargar los datos iniciales
				refrescarDatos();
			});

			// VOLVER
			$("#btnVolver").on("click", function() {
				// Recargar los datos iniciales
				window.location.href = "table.php";
			});
		});
	</script>
</body>

</html>