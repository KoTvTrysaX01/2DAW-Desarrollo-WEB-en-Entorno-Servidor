<?php

$sqlBD = sqlConecta($hostSql, $userSql, $passSql, $basedatosSql);


/* INICIAR DE DATOS */
$valores = array(
    'id' => "",
    'category' => "",
    'name' => "",
    'price' => "",
    'old_price' => "",
    'description' => "",
    'image' => "",
    'attributes' => "",
    'stock' => ""
);

/* RECOGIDA DE DATOS DE LA BASE DE DATOS */
$editar = false;
if (isset($_GET['edit'])) {
    $valores['id'] = addslashes(trim($_GET['edit']));
    if ($valores['id'] != "") {
        // SQL select
        $sqlSelect = "SELECT * FROM products WHERE id='" . $valores['id'] . "'";

        $sqlCursor = sqlQuery($sqlBD, $sqlSelect);
        $products = sqlObtenerRegistro($sqlBD, $sqlCursor);

        // Cargar valores
        if (count($products) > 0) {
            $valores['category'] = $products['category'];
            $valores['name'] = $products['name'];
            $valores['price'] = $products['price'];
            $valores['old_price'] = $products['old_price'];
            $valores['description'] = $products['description'];
            $valores['image'] = $products['image'];
            $valores['attributes'] = $products['attributes'];
            $valores['stock'] = $products['stock'];
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
    if (isset($_POST['category'])) {
        $valores['category'] = addslashes(trim($_POST['category']));
    }
    if (isset($_POST['name'])) {
        $valores['name'] = addslashes(trim($_POST['name']));
    }
    if (isset($_POST['price'])) {
        $valores['price'] = addslashes(trim($_POST['price']));
    }
    if (isset($_POST['old_price'])) {
        $valores['old_price'] = addslashes(trim($_POST['old_price']));
    }
    if (isset($_POST['description'])) {
        $valores['description'] = addslashes(trim($_POST['description']));
    }
    // if (isset($_POST['image'])) {
    //     $valores['image'] = addslashes(trim($_POST['image']));
    // }

    
    if (!isset($_FILES["image"]) && $_FILES["image"]["error"] != 0) {
        echo "Eror: couldn't load the image";
    } else {
        $target_dir = "./assets/{$config['category']}/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);


        // Known bug. Sometimes method cannot read name of the destiny file correctly. For some reason
        move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
        $valores['image'] = $target_file;
    }
    if (isset($_POST['attributes'])) {
        $valores['attributes'] = addslashes(trim($_POST['attributes']));
    }
    if (isset($_POST['stock'])) {
        $valores['stock'] = addslashes(trim($_POST['stock']));
    }

    $grabar = true;
}

/* PROCESO DE GRABACIÓN*/
if ($grabar) {
    if ($valores['id'] != "") {
        $sqlIns = "UPDATE products
							SET 
                                category='" . $valores['category'] . "',
								name='" . $valores['name'] . "',
								price='" . $valores['price'] . "',
								old_price='" . $valores['old_price'] . "',
								description='" . $valores['description'] . "',
                                image='" . $valores['image'] . "',
                                attributes='" . $valores['attributes'] . "',
                                stock='" . $valores['stock'] . "'
							WHERE 
								id='" . $valores['id'] . "'
						";
    } else {
        // El id se genera automáticamente porque es AUTO_INCREMENT en MySQL
        $sqlIns = "INSERT INTO products (category, name, price, old_price, description, image, attributes, stock) 
							VALUES (
                                 '" . $valores['category'] . "',
								 '" . $valores['name'] . "',
								 '" . $valores['price'] . "',
								 '" . $valores['old_price'] . "',
								 '" . $valores['description'] . "',
                                 '" . $valores['image'] . "',
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

                        <!-- Campo Category -->
                        <div class="mb-3">
                            <label for="category" class="form-label required-field">Category</label>
                            <select class="form-select" id="category" name="category" required>
                                <option value="" selected disabled>Select the product's category.</option>
                                <option value="ice_creams">Ice Creams</option>
                                <option value="ice_bars">Ice Bars</option>
                                <option value="cookies">Cookies</option>
                                <option value="chocolates">Chocolates</option>
                                <option value="milkshakes">Milkshakes</option>
                                <option value="juices">Juices</option>
                                <option value="smoothies">Smoothies</option>
                            </select>
                            <div class="invalid-feedback">
                                You must select the product's category.
                            </div>
                        </div>

                        <!-- Campo Name -->
                        <div class="mb-3">
                            <label for="name" class="form-label required-field">Product Name</label>
                            <input type="text" class="form-control" id="name" name="name" required
                                minlength="5" placeholder="Write Product's name">
                            <div class="invalid-feedback">
                                The name is required and must be at least 5 letter length.
                            </div>
                        </div>

                        <!-- Campo Price -->
                        <div class="mb-3">
                            <label for="price" class="form-label required-field">Price</label>
                            <input type="number" min="0" max="1000" step="0.01" class="form-control" id="price" name="price" placeholder="Write Product's price" required>
                            </input>
                            <div class="invalid-feedback">
                                Please indicate an adequate price.
                            </div>
                        </div>

                        <!-- Campo Old Price -->
                        <div class="mb-3">
                            <label for="old_price" class="form-label">Old Price</label>
                            <input type="number" min="0" max="1000" step="0.01" class="form-control" id="old_price" name="old_price" placeholder="Write Product's old price">
                            </input>
                            <div class="invalid-feedback">
                                Please indicate an adequate price.
                            </div>
                        </div>

                        <!-- Campo Description -->
                        <div class="mb-3">
                            <label for="description" class="form-label required-field">Description</label>
                            <input type="text" class="form-control" id="description" name="description" required
                                minlength="10" placeholder="Write Product's description">
                            <div class="invalid-feedback">
                                The description is required and must be at least 10 letter length.
                            </div>
                        </div>

                        <!-- Campo Image -->
                        <!-- <div class="mb-3">
                            <label for="image" class="form-label required-field">Image Source</label>
                            <input type="text" class="form-control" id="image" name="image" required
                                minlength="6" placeholder="Write Product's image source">
                            <div class="invalid-feedback">
                                The image source is required and must be at least 6 letter length.
                            </div>
                        </div> -->
                        <div class="mb-3">
                            <label for="image" class="form-label required-field">Image Source</label>
                            <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
                            <!-- <div class="invalid-feedback">
                                The image source is required and must be at least 6 letter length.
                            </div> -->
                        </div>

                        <!-- Campo Attributes -->
                        <div class="mb-3">
                            <label for="attributes" class="form-label required-field">Attributes</label>
                            <input type="text" class="form-control" id="attributes" name="attributes" required
                                minlength="4" placeholder="Write Product's attributes">
                            <div class="invalid-feedback">
                                The attributes are required and must be at least 4 letter length.
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
                                The stock is required.
                            </div>
                        </div>

                        <!-- Botones de acción -->
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
                            <button type="button" class="btn btn-warning btn-action" id="btnVolver">
                                <i class="bi bi-arrow-left-circle me-1"></i> Go Back
                            </button>
                            <button type="button" class="btn btn-secondary btn-action" id="btnCancelar">
                                <i class="bi bi-x-circle me-1"></i> Cancel
                            </button>
                            <button id="btnGrabar" name="btnGrabar" type="submit" class="btn btn-primary btn-action">
                                <i class="bi bi-check-circle me-1"></i> Save
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
        function cargarDatosParaEdicion(id, category, name, price, old_price, description, attributes, stock) {
            if (id == "") {
                $("#idFieldContainer").hide(); // En nuevo registro
                $(".header-title").html('<i class="bi bi-pencil-square me-2"></i>New Product');
            } else {
                $("#idFieldContainer").show(); // En edición de registro
                $(".header-title").html('<i class="bi bi-pencil-square me-2"></i>Edit Product');
            }



            $("#id").val(id);
            $("#category").val(category);
            $("#name").val(name);
            $("#price").val(price);
            $("#old_price").val(old_price);
            $("#description").val(description);
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
                    '<?php echo $valores['category']; ?>',
                    '<?php echo $valores['name']; ?>',
                    '<?php echo $valores['price']; ?>',
                    '<?php echo $valores['old_price']; ?>',
                    '<?php echo $valores['description']; ?>',
                    // '<?php //echo $valores['image']; 
                        ?>',
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



            const form = $("#<?php echo $config['category']; ?>Form");

            <?php if ($grabar) {
                if ($bdResultado) {        ?>
                    mensajeExito();
                <?php         } else { ?>
                    mensajeErrores();
            <?php         }
            }
            ?>


            // SUBMIT - GRABAR
            form.on("submit", function(event) {
                if (!form[0].checkValidity()) { // No se han validado los valores de los campos
                    event.preventDefault(); // Evita envío del formulario
                    event.stopPropagation(); // Evita que continue el evento a etiquetas padres del DOM

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
                console.log("algo");

                window.location.href = "tables.php?category=<?php echo $_GET['category']; ?>";
            });
        });
    </script>
</body>

</html>