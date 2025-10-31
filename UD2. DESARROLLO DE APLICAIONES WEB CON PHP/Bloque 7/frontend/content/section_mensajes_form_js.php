
	<script>
	
		// MÉTODOS PERSONALIZADOS 
		function cargarDatosParaEdicion(id_reg, remitente, destinatario, mensaje, fecha_alta) {
			if (id_reg == "") {
				$("#idFieldContainer").hide();
				$(".header-title").html('<i class="bi bi-chat-text-fill me-2"></i>Nuevo Mensaje');
				$("#fecha_alta").closest('.mb-3').hide();
			} else {
				$("#idFieldContainer").show();
				$(".header-title").html('<i class="bi bi-chat-text-fill me-2"></i>Editar Mensaje');
				$("#fecha_alta").closest('.mb-3').show();
			}
			$("#id_reg").val(id_reg);
			$("#remitente").val(remitente);
			$("#destinatario").val(destinatario);
			$("#mensaje").val(mensaje);
			$("#fecha_alta").val(fecha_alta);
			
			// Actualizar contador de caracteres
			actualizarContadorCaracteres();
		}

		function cargarDatosParaNuevo() {
			cargarDatosParaEdicion("", "", "", "", "");
		}
		
		function actualizarContadorCaracteres() {
			const longitud = $("#mensaje").val().length;
			$("#contadorCaracteres").text(longitud);
			
			if (longitud > 1000) {
				$("#contadorCaracteres").addClass('text-danger');
			} else {
				$("#contadorCaracteres").removeClass('text-danger');
			}
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
						'<?php echo $valores['id_reg']; ?>', 
						'<?php echo $valores['remitente']; ?>',
						'<?php echo $valores['destinatario']; ?>',
						'<?php echo $valores['mensaje']; ?>',
						'<?php echo $valores['fecha_alta']; ?>'
					);
			<?php } else { ?>
				cargarDatosParaNuevo();
			<?php } ?>	
		}

		// Al cargar el documento
		$(document).ready(function () {
			
			// EDICIÓN
			refrescarDatos();
			
			const form = $("#mensajeForm");
			
			<?php if ($grabar) { 
				if ($bdResultado) { ?>
					mensajeExito();
			<?php } else { ?>
					mensajeErrores();
			<?php } 
			} ?>

			// Contador de caracteres para el mensaje
			$("#mensaje").on("input", function () {
				actualizarContadorCaracteres();
			});

			// Validación personalizada para evitar remitente = destinatario
			$("#remitente, #destinatario").change(function() {
				const remitente = $("#remitente").val();
				const destinatario = $("#destinatario").val();
				
				if (remitente !== "" && destinatario !== "" && remitente === destinatario) {
					// Mostrar error
					$("#destinatario")[0].setCustomValidity("El destinatario no puede ser el mismo que el remitente");
					$("#destinatario").addClass('is-invalid');
				} else {
					$("#destinatario")[0].setCustomValidity("");
					$("#destinatario").removeClass('is-invalid');
				}
			});

			// SUBMIT - GRABAR
			form.on("submit", function (event) {
				// Validación personalizada para remitente ≠ destinatario
				const remitente = $("#remitente").val();
				const destinatario = $("#destinatario").val();
				
				if (remitente === destinatario && remitente !== "" && destinatario !== "") {
					$("#destinatario")[0].setCustomValidity("El destinatario no puede ser el mismo que el remitente");
					$("#destinatario").addClass('is-invalid');
				} else {
					$("#destinatario")[0].setCustomValidity("");
				}

				if (!form[0].checkValidity()) {
					event.preventDefault();
					event.stopPropagation();

					// Validación de longitud del mensaje
					const mensaje = $("#mensaje");
					if (mensaje.val().length > 1000) {
						mensaje.next(".invalid-feedback").text("El mensaje no puede exceder los 1000 caracteres.");
					} else if (mensaje[0].validity.valueMissing) {
						mensaje.next(".invalid-feedback").text("El mensaje es obligatorio.");
					}

					form.addClass("was-validated");
					mensajeErrores();
					return false;
				} 
			});

			// CANCELAR
			$("#btnCancelar").on("click", function () {
				refrescarDatos();	
				form.removeClass("was-validated");
			});
			
			// VOLVER
			$("#btnVolver").on("click", function () {
				window.location.href = "<?php echo $_SERVER['PHP_SELF']; ?>?page=mensajes";	
			});			
		});
	</script>
