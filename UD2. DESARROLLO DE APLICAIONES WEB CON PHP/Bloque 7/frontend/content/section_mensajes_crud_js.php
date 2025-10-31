
	<!-- Script para manejar los eventos con jQuery -->
    <script>
        $(document).ready(function() {
			var registroDelete = "";
			var mensajeDelete = "";
			
			// Botones de la tabla
            $('.btn-edit').click(function() {
                const id = $(this).data('id');
                $(location).attr('href', '<?php echo $_SERVER['PHP_SELF']; ?>?page=mensajes&edit=' + id);
			});

            $('.btn-delete').click(function() {
                registroDelete = $(this).data('id');
                mensajeDelete = $(this).data('mensaje');
                $('#mensajeConfirm').html("¿Estás seguro de eliminar el mensaje de \"" + mensajeDelete + "\"?");
                $('#confirmModal').modal('show');
			});

			$('.btn-add').click(function() {
                $(location).attr('href', '<?php echo $_SERVER['PHP_SELF']; ?>?page=mensajes&new');
			});

			// Botones del mensaje
            $('#btn-cancelDelete').click(function() {
                registroDelete = "";
                $('#confirmModal').modal('hide');
			});

            $('#btn-closeDelete').click(function() {
                registroDelete = "";
                $('#confirmModal').modal('hide');
			});

            $('#btn-confirmDelete').click(function() {
                $(location).attr('href', '<?php echo $_SERVER['PHP_SELF']; ?>?page=mensajes&del=' + registroDelete);
			});
		});
	</script>
