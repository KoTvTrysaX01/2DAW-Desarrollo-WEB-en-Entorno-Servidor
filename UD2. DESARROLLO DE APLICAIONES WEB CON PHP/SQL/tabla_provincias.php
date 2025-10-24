<?php

	require_once "include_mysql.php";
	require_once "include_vars.php";
	
	/* RECOGIDA DE DATOS */
	$sqlSelect="SELECT * FROM electronica ORDER BY nombre";

	$sqlBD = SqlConecta($hostSql, $userSql, $passSql, $basedatosSql);
	$sqlCursor=sqlQuery($sqlBD, $sqlSelect);
	$arrayProvincias=sqlResultArray($sqlBD, $sqlCursor);
	SqlDesconecta($sqlBD);		
	
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Provincias</title>
	
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    
	<!-- Font Awesome para iconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
	
    <style>
		.container {
			margin: 20px auto;
		}
        .table-container {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-top: 20px;
        }
        .table thead {
            background-color: #0d6efd;
            color: white;
        }
		.btn:hover {
			background-color: #222222;
			color: white;
		}
        .btn-edit {
            background-color: #ffc107;
            border: none;
            color: white;
        }
        .btn-delete {
            background-color: #dc3545;
            border: none;
            color: white;
        }
        h2 {
            color: #0d6efd;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="table-container">
					<h2 class="text-center">WELCOME TO OUR STORE!</h2>
					
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Categoría</th>
                                <th>Precio</th>
                                <th>Fabricante</th>
                                <th>Stock</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
							<?php for ($i=0;$i<count($arrayProvincias);$i++) { ?>
                            <tr>
                                <td><?php echo $arrayProvincias[$i]['id']; ?></td>
								<td><?php echo $arrayProvincias[$i]['nombre']; ?></td>
								<td><?php echo $arrayProvincias[$i]['categoria']; ?></td>
								<td><?php echo $arrayProvincias[$i]['precio']; ?></td>
								<td><?php echo $arrayProvincias[$i]['fabricante']; ?></td>
                                <td><?php echo $arrayProvincias[$i]['stock']; ?></td>
                                <td>
                                    <button class="btn btn-sm btn-edit me-1" data-id="<?php echo $arrayProvincias[$i]['id']; ?>">
                                        <i class="fas fa-edit"></i> Editar
                                    </button>
                                    <button class="btn btn-sm btn-delete"    data-id="<?php echo $arrayProvincias[$i]['id']; ?>">
                                        <i class="fas fa-trash"></i> Borrar
                                    </button>
                                </td>
                            </tr>
							<?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS y dependencias -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
	
	<!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
	
	<!-- Script para manejar los eventos con jQuery -->
    <script>
        $(document).ready(function() {

            $('.btn-edit').click(function() {
                const id = $(this).data('id');
				alert("Editar "+id);
				$(location).attr('href', '<?php echo $_SERVER['PHP_SELF']; ?>?edit='+id);
			});

            $('.btn-delete').click(function() {
                const id = $(this).data('id');
				alert("Borrar "+id);
				$(location).attr('href', '<?php echo $_SERVER['PHP_SELF']; ?>?del='+id);
			});

		});
	</script>
</body>
</html>