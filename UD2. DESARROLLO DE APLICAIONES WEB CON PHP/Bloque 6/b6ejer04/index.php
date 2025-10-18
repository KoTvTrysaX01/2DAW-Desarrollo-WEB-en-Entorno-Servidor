<?php
	$config['page']="mountain";
	if (isset($_GET['page'])) {
		$config['page']=addslashes(trim($_GET['page']));
	}
	if (!file_exists("./content/section_".$config['page'].".php")) {
		$config['page']="mountain";
	}

	//nav_title siempre es igual a "Geografía"?
	$config['nav_title']="🌍 Geografía";

	switch ($config['page']) {
		case "mountain":
			$config['head_title']="Montañas";
			$config['nav_active']="mountain";
			//$config['nav_title']="🌍 Geografía";
			break;
		case "lagos":
			$config['head_title']="Lagos";
			$config['nav_active']="lagos";
			//$config['nav_title']="🌍 Geografía";
			break;
		case "rios":
			$config['head_title']="Ríos";
			$config['nav_active']="rios";
			//$config['nav_title']="🌍 Geografía";
			break;
		case "mares":
			$config['head_title']="Mares";
			$config['nav_active']="mares";
			//$config['nav_title']="🌍 Geografía";
			break;
		case "valles":
			$config['head_title']="Valles";
			$config['nav_active']="valles";
			//$config['nav_title']="🌍 Geografía";
			break;

		default:
			$config['head_title']="Montañas";
			$config['nav_active']="mountain";
			//$config['nav_title']="🌍 Geografía";
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
	<main class="flex-fill d-flex align-items-center">
		<?php	include "./content/section_".$config['page'].".php";  ?>
	</main>

	<?php
		include "./inc/include_footer.php";
		include "./inc/include_scripts.php";
	?>
</body>
</html>

