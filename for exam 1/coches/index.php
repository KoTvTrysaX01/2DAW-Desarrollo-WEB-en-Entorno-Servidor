<?php
	
	$config['page']="empresa";
	if (isset($_GET['page'])) {
		$config['page']=addslashes(trim($_GET['page']));
	}

	// EMOJIS => https://www.w3schools.com/html/html_emojis.asp
	switch ($config['page']) {
		case "empresa":
			$config['head_title']="EMPRESA";
			$config['nav_active']="empresa";
			break;
		case "servicios":
			$config['head_title']="SERVICIOS";
			$config['nav_active']="servicios";
			break;
		case "alquiler":
			$config['head_title']="ALQUILER";
			$config['nav_active']="alquiler";
			break;
		case "contacto":
			$config['head_title']="CONTACTO";
			$config['nav_active']="contacto";
			break;
		case "descuentos":
			$config['head_title']="DESCUENTOS";
			$config['nav_active']="descuentos";
			break;
		
	}
	
?>
<!DOCTYPE html>
<html lang="es">

<?php	include "./inc/include_head.php"; ?>
	
<body class="d-flex flex-column min-vh-100 bg-light">
	<?php	
		include "./inc/include_nav.php";  
	?>

	<!-- Contenido principal -->
	<?php	
			switch ($config['page']) {
				case "empresa":
					include "./content/section_empresa.php";
					break;
				case "servicios":
					include "./content/section_servicios.php";
					break;
				case "alquiler":
					include "./content/section_alquiler.php";
					break;
				case "contacto":
					include "./content/section_contacto.php";
					break;
				case "descuentos":
					include "./content/section_descuentos.php";
					break;
			}		
	?>

	<?php
		include "./inc/include_footer.php";
		include "./inc/include_scripts.php";
	?>
</body>
</html>

