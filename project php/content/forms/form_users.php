<?php

$sqlBD = sqlConecta($hostSql, $userSql, $passSql, $basedatosSql);


/* INICIAR DE DATOS */
$valores = array(
    'id' => "",
    'nombre' => "",
    'email' => "",
    'telefono' => "",
    'birth_date' => "",
    'username' => "",
    'password' => "",
    'address' => ""
);

/* RECOGIDA DE DATOS DE LA BASE DE DATOS */
$editar = false;
if (isset($_GET['edit'])) {
    $valores['id'] = addslashes(trim($_GET['edit']));
    if ($valores['id'] != "") {
        // SQL select
        $sqlSelect = "SELECT * FROM {$config['category']} WHERE id='" . $valores['id'] . "'";
        $sqlCursor = sqlQuery($sqlBD, $sqlSelect);
        $products = sqlObtenerRegistro($sqlBD, $sqlCursor);

        // Cargar valores
        if (count($products) > 0) {
            $valores['nombre'] = $products['nombre'];
            $valores['email'] = $products['email'];
            $valores['telefono'] = $products['telefono'];
            $valores['birth_date'] = $products['birth_date'];
            $valores['username'] = $products['username'];
            $valores['password'] = $products['password'];
            $valores['address'] = $products['address'];
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
    if (isset($_POST['email'])) {
        $valores['email'] = addslashes(trim($_POST['email']));
    }
    if (isset($_POST['telefono'])) {
        $valores['telefono'] = addslashes(trim($_POST['telefono']));
    }
    if (isset($_POST['birth_date'])) {
        $valores['birth_date'] = addslashes(trim($_POST['birth_date']));
    }
    if (isset($_POST['username'])) {
        $valores['username'] = addslashes(trim($_POST['username']));
    }
    if (isset($_POST['password'])) {
        $valores['password'] = addslashes(trim($_POST['password']));
    }
    if (isset($_POST['address'])) {
        $valores['address'] = addslashes(trim($_POST['address']));
    }

    $grabar = true;
}


/* VALIDACION */
if ($grabar) {

    $valores['nombre'] = strtoupper($valores['nombre']);
}

/* PROCESO DE GRABACIÓN*/
if ($grabar) {
    if ($valores['id'] != "") {
        $sqlIns = "UPDATE {$config['category']} 
							SET 
								nombre='" . $valores['nombre'] . "',
								email='" . $valores['email'] . "',
								telefono='" . $valores['telefono'] . "',
								birth_date='" . $valores['birth_date'] . "',
                                username='" . $valores['username'] . "',
                                password='" . $valores['password'] . "',
                                address='" . $valores['address'] . "'
							WHERE 
								id='" . $valores['id'] . "'
						";
    } else {
        // El id se genera automáticamente porque es AUTO_INCREMENT en MySQL
        $sqlIns = "INSERT INTO {$config['category']} (nombre, email, telefono, birth_date, username, password, address) 
							VALUES (
								 '" . $valores['nombre'] . "',
								 '" . $valores['email'] . "',
								 '" . $valores['telefono'] . "',
								 '" . $valores['birth_date'] . "',
                                 '" . $valores['username'] . "',
								 '" . $valores['password'] . "',
								 '" . $valores['address'] . "'
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
        $bdResultado = true;    // Grabación realizada
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
    <title>products</title>

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
                        <i class="bi bi-geo-alt-fill me-2"></i>Gestión de products
                    </h2>

                    <!-- Mensaje de éxito al grabar (oculto inicialmente) -->
                    <div class="alert alert-success mt-4" role="alert" id="successAlert" style="display: none;">
                        <i class="bi bi-check-circle-fill me-2"></i> Los datos se han guardado correctamente.
                    </div>

                    <!-- Mensaje de éxito al borrar (oculto inicialmente) -->
                    <div class="alert alert-success mt-4" role="alert" id="successDelete" style="display: none;">
                        <i class="bi bi-check-circle-fill me-2"></i> La products $products ha sido borrada.
                    </div>


                    <!-- Mensaje de errores (oculto inicialmente) -->
                    <div class="alert alert-danger mt-4" role="alert" id="errorAlert" style="display: none;">
                        <i class="bi bi-x-circle-fill me-2"></i> Existen errores en los datos. Por favor, revíselos e intente grabar de nuevo.
                    </div>


                    <form id="<?php echo $config['category']; ?>Form"
                        name="<?php echo $config['category']; ?>Form"
                        novalidate
                        enctype="multipart/form-data"
                        method="POST"
                        action="#">
                        <!-- Campo ID (oculto para nuevas products, visible para edición) -->
                        <div class="mb-3" id="idFieldContainer" style="display: none;">
                            <label for="id" class="form-label">ID</label>
                            <input type="text" class="form-control" id="id" name="id" readonly>
                        </div>

                        <!-- Campo Nombre -->
                        <div class="mb-3">
                            <label for="nombre" class="form-label required-field">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" required
                                placeholder="Ingrese el nombre de la products">
                            <div class="invalid-feedback">
                                El nombre de la products es obligatorio y debe tener al menos 5 caracteres.
                            </div>
                        </div>

                        <!-- Campo email -->
                        <div class="mb-3">
                            <label for="email" class="form-label required-field">email</label>
                            <input type="email" class="form-control" id="email" name="email" required
                                placeholder="Ingrese la email de la products">
                            <div class="invalid-feedback">
                                La email es obligatoria y debe tener al menos 4 caracteres.
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="telefono" class="form-label required-field">telefono</label>
                            <input type="tel" class="form-control" id="telefono" name="telefono" required
                                placeholder="Ingrese la telefono de la products">
                            <div class="invalid-feedback">
                                La fabricante es obligatoria y debe tener al menos 4 caracteres.
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="birth_date" class="form-label required-field">birth_date</label>
                            <input type="date" class="form-control" id="birth_date" name="birth_date" required
                                placeholder="Ingrese la birth_date de la products">
                            <div class="invalid-feedback">
                                La fabricante es obligatoria y debe tener al menos 4 caracteres.
                            </div>
                        </div>



                        <div class="mb-3">
                            <label for="username" class="form-label required-field">Username</label>
                            <input type="text" class="form-control" id="username" name="username" required
                                placeholder="Ingrese el username de la products">
                            <div class="invalid-feedback">
                                El username de la products es obligatorio y debe tener al menos 5 caracteres.
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label required-field">password</label>
                            <input type="text" class="form-control" id="password" name="password" required
                                placeholder="Ingrese el password de la products">
                            <div class="invalid-feedback">
                                El password de la products es obligatorio y debe tener al menos 5 caracteres.
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="address" class="form-label required-field">Address</label>
                            <input type="text" class="form-control" id="address" name="address" required
                                placeholder="Ingrese el address de la products">
                            <div class="invalid-feedback">
                                El address de la products es obligatorio y debe tener al menos 5 caracteres.
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
        // products
        // Métodos personalizados 
        function cargarDatosParaEdicion(id, nombre, email, telefono, birth_date, username, password, address) {
            if (id == "") {
                $("#idFieldContainer").hide(); // En nuevo registro
                $(".header-title").html('<i class="bi bi-pencil-square me-2"></i>Nueva products');
            } else {
                $("#idFieldContainer").show(); // En edición de registro
                $(".header-title").html('<i class="bi bi-pencil-square me-2"></i>Editar products');
            }
            $("#id").val(id);
            $("#nombre").val(nombre);
            $("#email").val(email);
            $("#telefono").val(telefono);
            $("#birth_date").val(birth_date);
            $("#username").val(username);
            $("#password").val(password);
            $("#address").val(address);
        }

        function cargarDatosParaNuevo() {
            cargarDatosParaEdicion("", "", "", "", "", "", "", "");
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
                    '<?php echo $valores['email']; ?>',
                    '<?php echo $valores['telefono']; ?>',
                    '<?php echo $valores['birth_date']; ?>',
                    '<?php echo $valores['username']; ?>',
                    '<?php echo $valores['password']; ?>',
                    '<?php echo $valores['address']; ?>'
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



            const form = $("#<?php echo $config['category']; ?>Form");

            <?php if ($grabar) {
                if ($bdResultado) {        ?>
                    mensajeExito();
                <?php         } else { ?>
                    mensajeErrores();
            <?php         }
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
                window.location.href = "tables.php?category=<?php echo $_GET['category']; ?>";
            });
        });
    </script>
</body>

</html>