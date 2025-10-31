
    <!-- JS -->
	<script>
	
		// MENSAJES
		function mensajeExito() {
			$("#successAlert").fadeIn().delay(5000).fadeOut();
		}
		
		function mensajeErrores() {
			$("#errorAlert").fadeIn().delay(5000).fadeOut();
		}

		// Al cargar el documento
		$(document).ready(function () {
			
			<?php if ($identificado) { ?>
			// Refrescar si acabamos de identificarnos para mostrar el menú completo
			window.location.href = "<?php echo $_SERVER['PHP_SELF']; ?>?page=identifica";
			<?php } ?>
			
			const form = $("#identForm");
			
			<?php   if (isset($_POST['btnEntrar'])) {
						if ($identificado) {		?>
							mensajeExito();
			<?php 		} else { ?>
							mensajeErrores();
			<?php 		} 
					}
			?>
			
			
			// SUBMIT - ENTRAR
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

			// CANCELAR
			$("#btnCancelar").on("click", function () {
				$("#usuario").val("");
				$("#password").val("");
			});
			
			// SEGURIDAD - Desconectar
			$("#btnDesconectar").on("click", function () {
				window.location.href = "<?php echo $_SERVER['PHP_SELF']; ?>?page=identifica&logout";
			});
			
		});
	</script>