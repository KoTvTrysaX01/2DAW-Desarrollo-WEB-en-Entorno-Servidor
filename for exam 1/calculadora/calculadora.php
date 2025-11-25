<?php

// *****************************
// Recoger variables GET
// *****************************
$numero1=0;
if (isset($_GET['num1'])) {
	$numero1=floatval($_GET['num1']);
}
$numero2=0;
if (isset($_GET['num2'])) {
	$numero2=floatval($_GET['num2']);
}
$operacion="suma";
if (isset($_GET['operacion'])) {
	$operacion=$_GET['operacion'];
}

// *****************************
// FUNCIONES
// *****************************
function calcular($num1, $num2, $operacion) {
    switch($operacion) {
        case 'suma':
            return $num1 + $num2;
        case 'resta':
            return $num1 - $num2;
        case 'multiplicacion':
            return $num1 * $num2;
        case 'division':
            return $num2 != 0 ? $num1 / $num2 : 'Error: División por cero';
        default:
            return 'Operación no válida';
    }
}


// *****************************
// Procesar
// *****************************
$resultado = calcular($numero1, $numero2, $operacion);


// *****************************
// Mostrar resultado en HTML
// *****************************
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora</title>
</head>
<body>
    <h2>Calculadora PHP</h2>
    
    <!-- Formulario que pasa variables por GET -->
	<div>
		<form method="GET">
			<input type="number" name="num1" value="<?= $numero1 ?>" step="any" required>
			<select name="operacion">
				<option value="suma" <?= $operacion=='suma'?'selected':'' ?>>+</option>
				<option value="resta" <?= $operacion=='resta'?'selected':'' ?>>-</option>
				<option value="multiplicacion" <?= $operacion=='multiplicacion'?'selected':'' ?>>*</option>
				<option value="division" <?= $operacion=='division'?'selected':'' ?>>/</option>
			</select>
			<input type="number" name="num2" value="<?= $numero2 ?>" step="any" required>
			<button type="submit">Calcular</button>
		</form>
	</div>
	
    <?php if (isset($_GET['num1'])): ?>
	<div>
        <h3>Resultado: <?= $resultado ?></h3>
        <p>URL generada: calculadora.php?num1=<?= $numero1 ?>&num2=<?= $numero2 ?>&operacion=<?= $operacion ?></p>
	</div>
    <?php endif; ?>
</body>
</html>