<?php
// *****************************
// Recoger variables GET
// *****************************
$fecha = "";


if (isset($_GET['fecha'])) {
	$fecha = $_GET['fecha'];
}

// *****************************
// FUNCIONES 
// *****************************

function diaFecha($fecha)
{
	$dia = "";
	$timestamp = strtotime($fecha);
	if (is_int($timestamp)) {
		echo 'Fecha válida<br>';
		switch (date('l', $timestamp)) {
			case "Monday":
				$dia = "Lunes";
				break;
			case "Tuesday":
				$dia = "Martes";
				break;
			case "Wednesday":
				$dia = "Miercoles";
				break;
			case "Thursday":
				$dia = "Jueves";
				break;
			case "Friday":
				$dia = "Viernes";
				break;
			case "Saturday":
				$dia = "Sabado";
				break;
			case "Sunday":
				$dia = "Domingo";
				break;
			default:
				echo 'Fecha no válida<br>';
				break;
		}
	} else {
		echo 'Fecha no válida<br>';
	}


	return $dia;
}

// *****************************
// Procesar
// *****************************
$resultado = diaFecha($fecha);

// *****************************
// Mostrar resultado en HTML
// *****************************
?>
<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Día de la semana</title>

	<style>
		table {
			border-collapse: collapse;
			/* Combina los bordes para que no haya espacio entre ellos */
			width: auto;
			/* Ancho de la tabla */
		}

		th,
		td {
			border: 1px solid #000;
			/* Bordes de las celdas */
			padding: 10px;
			/* Espaciado interno para las celdas */
			text-align: left;
			/* Alineación del texto */
		}

		th {
			background-color: #f2f2f2;
			/* Color de fondo para los encabezados */
		}
	</style>
</head>

<body>
	<h2>Día de la semana de fechas</h2>
	<p>Se desea obtener automáticamente el día de la semana de una fecha</p>

	<?php
	// Obtener datos
	if ($resultado != "") {
	?>
		<div>
			<h3>Resultado: </h3>
			<p>
			<table>
				<tr>
					<th>Fecha</th>
					<td> <?= $fecha ?> </td>
				</tr>
				<tr>
					<th>Día de la semana</th>
					<td><?= $resultado ?></td>
				</tr>
				<tr>
					<th>URL</th>
					<td><?= basename($_SERVER['PHP_SELF']); ?>?fecha=<?= $fecha ?></td>
				</tr>
			</table>
			</p>
		</div>
	<?php }	?>

	<!-- Ejemplos -->
	<div>
		<h3>Ejemplos: </h3>
		<?php
		$ejemplos = array(
			'1990-05-15',
			'2023-12-25',
			'2024-06-15',
			'2024-01-01',
			'2000-02-29',
			'2024-07-15',
			'2024-02-15',
			'2023-03-15'
		);

		for ($i = 0; $i < count($ejemplos); $i++) {
		?>
			<p>
				<a href="<?php echo $_SERVER['PHP_SELF']; ?>?fecha=<?php echo $ejemplos[$i]; ?>">
					<?php echo basename($_SERVER['PHP_SELF']); ?>?fecha=<?php echo $ejemplos[$i]; ?>
				</a>
			</p>
		<?php
		}
		?>
	</div>
</body>

</html>