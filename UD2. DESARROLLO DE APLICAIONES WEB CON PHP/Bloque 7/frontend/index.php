<?php
	/* SEGURIDAD */
	session_start();
	
	if (!isset($_SESSION['usuario'])) {
		$_SESSION['usuario']="";
	}
	
	if (isset($_GET['logout'])) {
		$_SESSION['usuario']="";
	}
	
	/* CONTROL DE PÁGINA */
	$config['page']="identifica";
	if (isset($_GET['page'])) {
		$config['page']=addslashes(trim($_GET['page']));
	}

	// EMOJIS => https://www.w3schools.com/html/html_emojis.asp
	$config['nav_title']="📩 Comunicaciones";
	switch ($config['page']) {
		case "identifica":
			$config['head_title']="Identificación";
			$config['nav_active']="identifica";
			break;
		case "mensajes":
			$config['head_title']="Mensajes";
			$config['nav_active']="mensajes";
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
		<?php	
			switch ($config['page']) {
				case "identifica":
					include "./content/section_usuarios_ident.php";
					break;
				case "mensajes":
					if ( (isset($_GET['edit'])) || (isset($_GET['new'])) ) {
						include "./content/section_mensajes_form.php";
					} else {
						include "./content/section_mensajes_crud.php";						
					}
					break;
				
			}		
		?>
	</main>

	<?php
		include "./inc/include_footer.php";
		include "./inc/include_scripts.php";
	?>
	
	<?php	
		// scripts en Javascript personalizados con PHP
		switch ($config['page']) {
			case "identifica":
				include "./content/section_usuarios_ident_js.php";
				break;
			case "mensajes":
				if ( (isset($_GET['edit'])) || (isset($_GET['new'])) ) {
					include "./content/section_mensajes_form_js.php";
				} else {
					include "./inc/electronica_crud.php";
				}
				break;
				
		}		
	?>	
</body>
</html>

