<?php

/* INICIAR DE DATOS */

$valores = array(
    'id' => "",
    'products' => "",
    'total_price' => "",
    'id_user' => "",
    'username' => "",
    'email' => "",
    'tel' => "",
    'address' => "",
    'purchase_date' => ""
);


if (isset($_SESSION['cart'])) {
    // SQL select

    $productsNams = "";
    $productsPrice = 0;
    foreach ($_SESSION['cart'] as $product) {
        if ($productsNams == "") {
            $productsNams .= "{$product['name']} x {$product['quantity']}";
        } else {
            $productsNams .= ", {$product['name']} x {$product['quantity']}";
        }
        $productsPrice += $product['price'];
    }

    $valores['products'] = $productsNams;
    $valores['total_price'] = $productsPrice;
    $valores['id_user'] = $_SESSION['user']['id'];
    $valores['username'] = $_SESSION['user']['username'];
    $valores['email'] = $_SESSION['user']['email'];
} else {
    header('Location: ' . "products.php");
}


/* INSERT - - RECOGIDA DE DATOS DEL FORMULARIO */
$grabar = false;
if (isset($_POST['btnGrabar'])) {
    if (isset($_POST['products'])) {
        $valores['products'] = addslashes(trim($_POST['products']));
    }
    if (isset($_POST['total_price'])) {
        $valores['total_price'] = addslashes(trim($_POST['total_price']));
    }
    if (isset($_POST['id_user'])) {
        $valores['id_user'] = addslashes(trim($_POST['id_user']));
    }
    if (isset($_POST['username'])) {
        $valores['username'] = addslashes(trim($_POST['username']));
    }
    if (isset($_POST['email'])) {
        $valores['email'] = addslashes(trim($_POST['email']));
    }
    if (isset($_POST['tel'])) {
        $valores['tel'] = addslashes(trim($_POST['tel']));
    }
    if (isset($_POST['address'])) {
        $valores['address'] = addslashes(trim($_POST['address']));
    }
    $valores['purchase_date'] = date("Y-m-d");
    $grabar = true;
}

/* PROCESO DE GRABACIÓN*/
if ($grabar) {
    $sqlBD = sqlConecta($hostSql, $userSql, $passSql, $basedatosSql);

    // El id se genera automáticamente porque es AUTO_INCREMENT en MySQL
    $sqlIns = "INSERT INTO sells (products, total_price, id_user, username, email, tel, address, purchase_date)
							VALUES (
                                 '" . $valores['products'] . "',
								 '" . $valores['total_price'] . "',
								 '" . $valores['id_user'] . "',
                                 '" . $valores['username'] . "',
								 '" . $valores['email'] . "',
								 '" . $valores['tel'] . "',
                                 '" . $valores['address'] . "',
								 '" . $valores['purchase_date'] . "'
							)
					";
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
    sqlDesconecta($sqlBD);
    $_SESSION['cart'] = array();


    sendMail($valores['products'], $valores['total_price'], $valores['username'], $valores['email'], $valores['address'], $valores['purchase_date']);


    echo '<script>alert("Thanks for the purchase!")</script>';
    header("Refresh: 0.1;" . "index.php?category=home");
}



?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

        .header-products {
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
                    <h2 class="text-center header-products">
                        <i class="bi bi-geo-alt-fill me-2"></i>Gestión de Purchases
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

                        <!-- Campo Products -->
                        <div class="mb-3">
                            <label for="products" class="form-label required-field">Selected Products</label>
                            <input type="text" class="form-control" id="products" name="products" readonly
                                minlength="7">
                            <div class="invalid-feedback">
                                The products' name is required and must be 7 letters long.
                            </div>
                        </div>

                        <!-- Campo total_price -->
                        <div class="mb-3">
                            <label for="total_price" class="form-label required-field">Total Price</label>
                            <input type="number" min="0" max="1000" step="0.01" class="form-control" id="total_price" name="total_price" readonly>
                            </input>
                            <div class="invalid-feedback">
                                The price is required and must be bigger than 0.
                            </div>
                        </div>

                        <!-- Campo username -->
                        <div class="mb-3">
                            <label for="username" class="form-label required-field">Your name</label>
                            <input type="text" class="form-control" id="username" name="username" required
                                minlength="4" placeholder="Write your name">
                            <div class="invalid-feedback">
                                The username is required and must be 4 letters long.
                            </div>
                        </div>

                        <!-- Campo email -->
                        <div class="mb-3">
                            <label for="email" class="form-label required-field">Your email</label>
                            <input type="email" class="form-control" id="email" name="email" required
                                minlength="4" placeholder="Write your email">
                            <div class="invalid-feedback">
                                The email is required and must be 4 letters long.
                            </div>
                        </div>

                        <!-- Campo tel -->
                        <div class="mb-3">
                            <label for="tel" class="form-label required-field">Your Telephone</label>
                            <input type="tel" class="form-control" id="tel" name="tel" required
                                minlength="8" placeholder="Write your telephone">
                            <div class="invalid-feedback">
                                The telehpone is required and must be 8 letters long.
                            </div>
                        </div>

                        <!-- Campo address -->
                        <div class="mb-3">
                            <label for="address" class="form-label required-field">Your Address</label>
                            <textarea class="form-control" id="address" name="address" required
                                minlength="5" maxlength="300" rows="3" placeholder="Write your address"></textarea>
                            <div class="invalid-feedback">
                                The address is required and must be 5 letters long.
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
        function cargarDatosParaEdicion(id, products, total_price, id_user, username, email) {
            $("#idFieldContainer").hide(); // En nuevo registro
            $(".header-products").html('<i class="bi bi-pencil-square me-2"></i>New Purchase');

            $("#id").val(id);
            $("#products").val(products);
            $("#total_price").val(total_price);
            $("#id_user").val(id_user);
            $("#username").val(username);
            $("#email").val(email);

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
            cargarDatosParaEdicion(
                '<?php echo $valores['id']; ?>',
                '<?php echo $valores['products']; ?>',
                '<?php echo $valores['total_price']; ?>',
                '<?php echo $valores['id_user']; ?>',
                '<?php echo $valores['username']; ?>',
                '<?php echo $valores['email']; ?>',
            )
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
                window.location.href = "index.php?category=cart";
            });
        });
    </script>
</body>

</html>