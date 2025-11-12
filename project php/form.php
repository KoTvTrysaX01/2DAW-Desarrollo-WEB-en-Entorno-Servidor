<?php

require_once "./dao/include_mysql.php";
require_once "./dao/include_vars.php";

$sqlBD = sqlConecta($hostSql, $userSql, $passSql, $basedatosSql);


/* INICIAR DE DATOS */
$valores = array(
    'id' => "",
    'nombre' => "",
    'precio' => "",
    'old_price' => "",
    'descripcion' => "",
    'imagen' => "",
    'attributes' => "",
    'stock' => ""
);

/* RECOGIDA DE DATOS DE LA BASE DE DATOS */
$editar = false;
if (isset($_GET['edit'])) {
    $valores['id'] = addslashes(trim($_GET['edit']));
    if ($valores['id'] != "") {
        // SQL select
        $sqlSelect = "SELECT * FROM ice_creams WHERE id='" . $valores['id'] . "'";
        $sqlCursor = sqlQuery($sqlBD, $sqlSelect);
        $ice_creams = sqlObtenerRegistro($sqlBD, $sqlCursor);

        // Cargar valores
        if (count($ice_creams) > 0) {
            $valores['nombre'] = $ice_creams['nombre'];
            $valores['precio'] = $ice_creams['precio'];
            $valores['old_price'] = $ice_creams['old_price'];
            $valores['descripcion'] = $ice_creams['descripcion'];
            $valores['imagen'] = $ice_creams['imagen'];
            $valores['attributes'] = $ice_creams['attributes'];
            $valores['stock'] = $ice_creams['stock'];
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
    if (isset($_POST['precio'])) {
        $valores['precio'] = addslashes(trim($_POST['precio']));
    }
    if (isset($_POST['old_price'])) {
        $valores['old_price'] = addslashes(trim($_POST['old_price']));
    }
    if (isset($_POST['descripcion'])) {
        $valores['descripcion'] = addslashes(trim($_POST['descripcion']));
    }
    if (isset($_POST['imagen'])) {
        $valores['imagen'] = addslashes(trim($_POST['imagen']));
    }
    if (isset($_POST['attributes'])) {
        $valores['imagen'] = addslashes(trim($_POST['imagen']));
    }
    if (isset($_POST['stock'])) {
        $valores['stock'] = addslashes(trim($_POST['stock']));
    }

    $grabar = true;
}


/* VALIDACION */
if ($grabar) {
    // Campos obligatorios
    // if (
    //     ($valores['nombre'] == "") ||
    //     ($valores['categoria'] == "") ||
    //     ($valores['precio'] == "") ||
    //     ($valores['fabricante'] == "") ||
    //     ($valores['stock'] == "")
    // ) {
    //     $grabar = false;
    //     echo "Obligatorios";
    // }

    // // Longitudes 
    // if (
    //     (strlen($valores['nombre']) < 5) ||
    //     (strlen($valores['precio']) <= 0) ||
    //     (strlen($valores['fabricante']) < 4) ||
    //     (strlen($valores['stock']) == null)
    // ) {
    //     $grabar = false;
    //     echo "Longitudes";
    // }

    // Conversiones
    $valores['nombre'] = strtoupper($valores['nombre']);
}

/* PROCESO DE GRABACIÓN*/
if ($grabar) {
    if ($valores['id'] != "") {
        $sqlIns = "UPDATE ice_creams 
							SET 
								nombre='" . $valores['nombre'] . "',
								precio='" . $valores['precio'] . "',
								old_price='" . $valores['old_price'] . "',
								descripcion='" . $valores['descripcion'] . "',
                                imagen='" . $valores['imagen'] . "',
                                attributes='" . $valores['attributes'] . "',
                                stock='" . $valores['stock'] . "'
							WHERE 
								id='" . $valores['id'] . "'
						";
    } else {
        // El id se genera automáticamente porque es AUTO_INCREMENT en MySQL
        $sqlIns = "INSERT INTO ice_creams (nombre, precio, old_price, descripcion, imagen, attributes, stock) 
							VALUES (
								 '" . $valores['nombre'] . "',
								 '" . $valores['precio'] . "',
								 '" . $valores['old_price'] . "',
								 '" . $valores['descripcion'] . "',
                                 '" . $valores['imagen'] . "',
								 '" . $valores['attributes'] . "',
								 '" . $valores['stock'] . "'
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
    <title>ice_creams</title>

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
                        <i class="bi bi-geo-alt-fill me-2"></i>Gestión de ice_creams
                    </h2>

                    <!-- Mensaje de éxito al grabar (oculto inicialmente) -->
                    <div class="alert alert-success mt-4" role="alert" id="successAlert" style="display: none;">
                        <i class="bi bi-check-circle-fill me-2"></i> Los datos se han guardado correctamente.
                    </div>

                    <!-- Mensaje de éxito al borrar (oculto inicialmente) -->
                    <div class="alert alert-success mt-4" role="alert" id="successDelete" style="display: none;">
                        <i class="bi bi-check-circle-fill me-2"></i> La ice_creams $ice_creams ha sido borrada.
                    </div>


                    <!-- Mensaje de errores (oculto inicialmente) -->
                    <div class="alert alert-danger mt-4" role="alert" id="errorAlert" style="display: none;">
                        <i class="bi bi-x-circle-fill me-2"></i> Existen errores en los datos. Por favor, revíselos e intente grabar de nuevo.
                    </div>




                    <form id="ice_creamsForm"
                        name="ice_creamsForm"
                        novalidate
                        enctype="multipart/form-data"
                        method="POST"
                        action="#">
                        <!-- Campo ID (oculto para nuevas ice_creams, visible para edición) -->
                        <div class="mb-3" id="idFieldContainer" style="display: none;">
                            <label for="id" class="form-label">ID</label>
                            <input type="text" class="form-control" id="id" name="id" readonly>
                        </div>

                        <!-- Campo Nombre -->
                        <div class="mb-3">
                            <label for="nombre" class="form-label required-field">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" required
                                minlength="5" placeholder="Ingrese el nombre de la ice_creams">
                            <div class="invalid-feedback">
                                El nombre de la ice_creams es obligatorio y debe tener al menos 5 caracteres.
                            </div>
                        </div>

                        <!-- Campo Precio -->
                        <div class="mb-3">
                            <label for="precio" class="form-label required-field">Precio</label>
                            <input type="number" min="0" max="1000" step="0.01" class="form-control" id="precio" name="precio" required>
                            </input>
                            <div class="invalid-feedback">
                                Por favor seleccione un precio adecuado (0-1000).
                            </div>
                        </div>

                        <!-- Campo Old price -->
                        <div class="mb-3">
                            <label for="old_price" class="form-label">old_price</label>
                            <input type="number" min="0" max="1000" step="0.01" class="form-control" id="old_price" name="old_price">
                            </input>
                            <div class="invalid-feedback">
                                Por favor seleccione un precio adecuado (0-1000).
                            </div>
                        </div>

                        <!-- Campo Fabricante -->
                        <div class="mb-3">
                            <label for="descripcion" class="form-label required-field">descripcion</label>
                            <input type="text" class="form-control" id="descripcion" name="descripcion" required
                                minlength="4" placeholder="Ingrese la descripcion de la ice_creams">
                            <div class="invalid-feedback">
                                La fabricante es obligatoria y debe tener al menos 4 caracteres.
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="imagen" class="form-label required-field">imagen</label>
                            <input type="text" class="form-control" id="imagen" name="imagen" required
                                minlength="4" placeholder="Ingrese la imagen de la ice_creams">
                            <div class="invalid-feedback">
                                La fabricante es obligatoria y debe tener al menos 4 caracteres.
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="attributes" class="form-label required-field">attributes</label>
                            <input type="text" class="form-control" id="attributes" name="attributes" required
                                minlength="4" placeholder="Ingrese la attributes de la ice_creams">
                            <div class="invalid-feedback">
                                La fabricante es obligatoria y debe tener al menos 4 caracteres.
                            </div>
                        </div>

                        <!-- Campo Stock -->
                        <div class="mb-3">
                            <label for="stock" class="form-label required-field">Stock</label>
                            <input type="radio" id="1" name="stock" value="1" <?php if ($valores['stock'] == 1) echo "checked"; ?>>
                            <label for="1">True</label>
                            <input type="radio" id="0" name="stock" value="0" <?php if ($valores['stock'] == 0) echo "checked"; ?>>
                            <label for="0">False</label><br>
                            <div class="invalid-feedback">
                                El campo de stocks es obligatorio.
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
        // ice_creams
        // Métodos personalizados 
        function cargarDatosParaEdicion(id, nombre, precio, old_price, descripcion, imagen, attributes,stock) {
            if (id == "") {
                $("#idFieldContainer").hide(); // En nuevo registro
                $(".header-title").html('<i class="bi bi-pencil-square me-2"></i>Nueva ice_creams');
            } else {
                $("#idFieldContainer").show(); // En edición de registro
                $(".header-title").html('<i class="bi bi-pencil-square me-2"></i>Editar ice_creams');
            }
            $("#id").val(id);
            $("#nombre").val(nombre);
            $("#precio").val(precio);
            $("#old_price").val(old_price);
            $("#descripcion").val(descripcion);
            $("#imagen").val(imagen);
            $("#attributes").val(attributes);
            $("#stock").val(stock);
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
                    '<?php echo $valores['precio']; ?>',
                    '<?php echo $valores['old_price']; ?>',
                    '<?php echo $valores['descripcion']; ?>',
                    '<?php echo $valores['imagen']; ?>',
                    '<?php echo $valores['attributes']; ?>',
                    '<?php echo $valores['stock']; ?>'
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



            const form = $("#ice_creamsForm");

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
                window.location.href = "tables.php?section=<?php echo $_GET['section'];?>";
            });
        });
    </script>
</body>

</html>