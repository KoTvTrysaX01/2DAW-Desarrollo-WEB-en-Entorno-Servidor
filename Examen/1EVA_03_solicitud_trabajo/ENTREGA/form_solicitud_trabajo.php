<?php

/* Carga de includes de BD */
require_once "dao/include_mysql.php";
require_once "dao/include_vars.php";

/* INICIAR DE DATOS */
$valores = array(
    'id' => "",
    'nombre' => "",
    'apellidos' => "",
    'telefono' => "",
    'email' => "",
    'direccion' => "",

    'puesto_solicitado' => "",
    'experiencia' => "",
    'educacion' => ""
);


/* RECOGER parámetros GET o POST */
$grabar = false;
if (isset($_POST['btnGrabar'])) {
    if (isset($_POST['nombre'])) {
        $valores['nombre'] = addslashes(trim($_POST['nombre']));
    }
    if (isset($_POST['apellidos'])) {
        $valores['apellidos'] = addslashes(trim($_POST['apellidos']));
    }
    if (isset($_POST['telefono'])) {
        $valores['telefono'] = addslashes(trim($_POST['telefono']));
    }
    if (isset($_POST['email'])) {
        $valores['email'] = addslashes(trim($_POST['email']));
    }
    if (isset($_POST['direccion'])) {
        $valores['direccion'] = addslashes(trim($_POST['direccion']));
    }
    if (isset($_POST['puesto_solicitado'])) {
        $valores['puesto_solicitado'] = addslashes(trim($_POST['puesto_solicitado']));
    }
    if (isset($_POST['experiencia'])) {
        $valores['experiencia'] = addslashes(trim($_POST['experiencia']));
    }
    if (isset($_POST['educacion'])) {
        $valores['educacion'] = addslashes(trim($_POST['educacion']));
    }

    $grabar = true;
}


/* VALIDACION */
if ($grabar) {
    // Campos obligatorios
    if (
        ($valores['nombre'] == "") ||
        ($valores['apellidos'] == "") ||
        ($valores['telefono'] == "") ||
        ($valores['email'] == "") ||
        ($valores['puesto_solicitado'] == "") ||
        ($valores['experiencia'] == "") ||
        ($valores['educacion'] == "")
    ) {
        $grabar = false;
        // echo "Obligatorios";
    }
}

/* PROCESO DE GRABACIÓN*/
$sqlSelect = "";
if ($grabar) {
    $sqlBD = sqlConecta($hostSql, $userSql, $passSql, $basedatosSql);

    $sqlSelect = "INSERT INTO solicitudes 
						(nombre, apellidos, telefono, email, 
							direccion, puesto_solicitado, experiencia, educacion) 
					VALUES (
								 '" . $valores['nombre'] . "',
								 '" . $valores['apellidos'] . "',
								 '" . $valores['telefono'] . "',
								 '" . $valores['email'] . "',
								 '" . $valores['direccion'] . "',
								 '" . $valores['puesto_solicitado'] . "',
                                 '" . $valores['experiencia'] . "',
								 '" . $valores['educacion'] . "'
							)
					";

    // echo $sqlSelect;
    sqlIniTrans($sqlBD);
    $sqlCursor = sqlQuery($sqlBD, $sqlSelect);
    $numerror = "";
    $menerror = "";
    if (!$continuaSql) {
        $bdResultado = false; // Ha habido algún error
    } else {
        $bdResultado = true;    // Grabación realizada
    }
    sqlFinTrans($sqlBD);

    sqlDesconecta($sqlBD);
}


?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trabaja con Nosotros</title>

    <!-- Bootstrap CSS -->
    <link href="extension/bootstrap/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons CSS -->
    <link rel="stylesheet" href="extension/bootstrap-icons/bootstrap-icons.css">

    <style>
        .container {
            max-width: 900px;
            width: 100%;
            background-color: #f8f9fa;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .header {
            background: linear-gradient(135deg, #1e3a8a, #3b82f6);
            color: white;
            padding: 25px;
            text-align: center;
        }

        .header h1 {
            margin: 0;
            font-size: 28px;
            font-weight: 700;
        }

        .header p {
            margin: 10px 0 0;
            opacity: 0.9;
            font-size: 16px;
        }

        .company-logo {
            font-size: 40px;
            margin-bottom: 15px;
        }

        .form-container {
            padding: 30px;
        }

        .form-section {
            background: white;
            border-radius: 10px;
            padding: 25px;
            margin-bottom: 25px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        }

        .section-title {
            color: #1e3a8a;
            border-bottom: 2px solid #3b82f6;
            padding-bottom: 10px;
            margin-bottom: 20px;
            font-weight: 600;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #374151;
        }

        input,
        textarea,
        select {
            width: 100%;
            padding: 12px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            font-size: 16px;
            transition: all 0.3s;
        }

        input:focus,
        textarea:focus,
        select:focus {
            border-color: #3b82f6;
            outline: none;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }

        textarea {
            min-height: 120px;
            resize: vertical;
        }

        .form-row {
            display: flex;
            gap: 15px;
        }

        .form-row>div {
            flex: 1;
        }

        .file-upload {
            border: 2px dashed #d1d5db;
            border-radius: 8px;
            padding: 20px;
            text-align: center;
            transition: all 0.3s;
            cursor: pointer;
        }

        .file-upload:hover {
            border-color: #3b82f6;
            background-color: #f0f7ff;
        }

        .file-upload i {
            font-size: 40px;
            color: #6b7280;
            margin-bottom: 10px;
        }

        .file-info {
            margin-top: 10px;
            font-size: 14px;
            color: #6b7280;
        }

        .checkbox-group {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .form-check {
            padding-left: 0;
        }

        .form-check-label {
            display: flex;
            align-items: center;
            cursor: pointer;
        }

        .form-check-input {
            width: 18px;
            height: 18px;
            margin-right: 10px;
        }

        .salary-display {
            background: #f0f7ff;
            border-radius: 8px;
            padding: 15px;
            text-align: center;
            margin-top: 10px;
        }

        .salary-amount {
            font-size: 24px;
            font-weight: 700;
            color: #1e3a8a;
        }

        .submit-btn {
            background: linear-gradient(135deg, #1e3a8a, #3b82f6);
            color: white;
            border: none;
            padding: 16px 30px;
            font-size: 18px;
            border-radius: 8px;
            cursor: pointer;
            width: 100%;
            font-weight: 600;
            transition: all 0.3s;
            margin-top: 20px;
        }

        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(59, 130, 246, 0.4);
        }

        .confirmation {
            text-align: center;
            padding: 40px;
            background-color: #f0f9ff;
            border-radius: 10px;
            border: 2px solid #3b82f6;
            margin-top: 20px;
        }

        .confirmation h3 {
            color: #1e3a8a;
            margin-top: 0;
            font-weight: 700;
        }

        .fw-bold {
            font-weight: bold;
        }

        .confirmation p {
            margin-bottom: 15px;
            font-size: 16px;
        }

        .required::after {
            content: " *";
            color: #ef4444;
        }

        .privacy-notice {
            font-size: 14px;
            color: #6b7280;
            margin-top: 5px;
        }

        @media (max-width: 768px) {
            .form-row {
                flex-direction: column;
                gap: 15px;
            }

            .form-container {
                padding: 20px;
            }

            .header {
                padding: 20px;
            }
        }
    </style>
</head>

<body>
    <div class="container p-0 my-5">
        <div class="header">
            <div class="company-logo">
                <i class="bi bi-building"></i>
            </div>
            <h1>Trabaja con Nosotros</h1>
            <p>Únete a nuestro equipo de profesionales. Envía tu solicitud y te contactaremos.</p>
        </div>

        <div class="p-2">
            <!-- Mensaje de éxito al grabar (oculto inicialmente) -->
            <div class="alert alert-success mt-4" role="alert" id="successAlert" style="display: none;">
                <i class="bi bi-check-circle-fill me-2"></i> Su solicitud se ha enviado correctamente.
            </div>

            <!-- Mensaje de errores (oculto inicialmente) -->
            <div class="alert alert-danger mt-4" role="alert" id="errorAlert" style="display: none;">
                <i class="bi bi-x-circle-fill me-2"></i> Existen errores en los datos. Por favor, revíselos e intente de nuevo.
            </div>

            <div id="form-container" name="form-container" class="form-container">
                <form id="formulario"
                    name="formulario"
                    novalidate
                    enctype="multipart/form-data"
                    method="POST"
                    action="#">

                    <!-- SECCIÓN INFORMACIÓN PERSONAL -->
                    <div class="form-section">
                        <h3 class="section-title">
                            <i class="bi bi-person-circle me-2"></i>Información Personal
                        </h3>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="nombre" class="form-label required">Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" required placeholder="Ingrese su nombre">
                                <div class="invalid-feedback">
                                    El nombre es obligatorio
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="apellidos" class="form-label required">Apellidos</label>
                                <input type="text" class="form-control" id="apellidos" name="apellidos" required placeholder="Ingrese sus apellidos">
                                <div class="invalid-feedback">
                                    Los apellidos son obligatorios
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="telefono" class="form-label required">Teléfono de contacto</label>
                                <input type="tel" class="form-control" id="telefono" name="telefono" required placeholder="Ingrese su número de teléfono">
                                <div class="invalid-feedback">
                                    El teléfono es obligatorio
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="email" class="form-label required">Correo electrónico</label>
                                <input type="email" class="form-control" id="email" name="email" required placeholder="Ingrese su correo electrónico">
                                <div class="invalid-feedback">
                                    El email es obligatorio y debe tener un formato válido
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="direccion" class="form-label">Dirección</label>
                            <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Ingrese su dirección completa">
                        </div>
                    </div>

                    <!-- SECCIÓN INFORMACIÓN PROFESIONAL -->
                    <div class="form-section">
                        <h3 class="section-title">
                            <i class="bi bi-briefcase me-2"></i>Información Profesional
                        </h3>

                        <div class="form-group">
                            <label for="puesto_solicitado" class="form-label required">Puesto solicitado</label>
                            <select class="form-control" id="puesto_solicitado" name="puesto_solicitado" required>
                                <option value="">Seleccione un puesto</option>
                                <option value="desarrollador_web">Desarrollador Web</option>
                                <option value="disenador_ux">Diseñador UX/UI</option>
                                <option value="marketing_digital">Especialista en Marketing Digital</option>
                                <option value="atencion_cliente">Atención al Cliente</option>
                                <option value="administrativo">Administrativo</option>
                                <option value="gerente_proyectos">Gerente de Proyectos</option>
                                <option value="otro">Otro</option>
                            </select>
                            <div class="invalid-feedback">
                                Debe seleccionar un puesto
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="experiencia" class="form-label required">Años de experiencia</label>
                            <select class="form-control" id="experiencia" name="experiencia" required>
                                <option value="">Seleccione años de experiencia</option>
                                <option value="0-1">0-1 años</option>
                                <option value="1-3">1-3 años</option>
                                <option value="3-5">3-5 años</option>
                                <option value="5-10">5-10 años</option>
                                <option value="10+">Más de 10 años</option>
                            </select>
                            <div class="invalid-feedback">
                                Debe seleccionar sus años de experiencia
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="educacion" class="form-label required">Nivel educativo</label>
                            <select class="form-control" id="educacion" name="educacion" required>
                                <option value="">Seleccione nivel educativo</option>
                                <option value="secundaria">Secundaria</option>
                                <option value="tecnico">Técnico/Tecnólogo</option>
                                <option value="pregrado">Pregrado/Universidad</option>
                                <option value="posgrado">Posgrado/Maestría</option>
                                <option value="doctorado">Doctorado</option>
                            </select>
                            <div class="invalid-feedback">
                                Debe seleccionar su nivel educativo
                            </div>
                        </div>

                    </div>


                    <!-- SECCIÓN INFORMACIÓN ADICIONAL -->
                    <div class="form-section">
                        <h3 class="section-title">
                            <i class="bi bi-chat-square-text me-2"></i>Política de privacidad
                        </h3>

                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="acepto_privacidad" name="acepto_privacidad" required>
                                <label class="form-check-label" for="acepto_privacidad">
                                    Acepto la política de privacidad y el tratamiento de mis datos con fines de reclutamiento
                                </label>
                                <div class="invalid-feedback">
                                    Debe aceptar la política de privacidad
                                </div>
                            </div>
                            <div class="privacy-notice">
                                Sus datos serán tratados de acuerdo con nuestra política de privacidad y conservados durante el proceso de selección.
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="submit-btn" id="btnGrabar" name="btnGrabar">
                        <i class="bi bi-send-check me-2"></i>Enviar Solicitud
                    </button>
                </form>
            </div>


            <div id="confirmation" name="confirmation" class="confirmation d-none my-3">
                <h3>¡Solicitud Enviada Exitosamente!</h3>
                <p>Hemos recibido su solicitud para el puesto de
                    <span id="confirmationPosition" class="fw-bold"><?= strtoupper($valores['puesto_solicitado']); ?></span>.
                </p>
                <p>Hemos enviado un correo de confirmación a
                    <span id="confirmationEmail" class="fw-bold"><?= $valores['email'] ?></span>.
                </p>
                <p>Revisaremos su perfil y nos pondremos en contacto con usted en un plazo máximo de 10 días hábiles.</p>
                <p>¡Gracias por su interés en formar parte de nuestro equipo!</p>
                <div>
                    <button class="btn btn-primary" id="btnNuevaSolicitud">
                        Nueva Solicitud
                    </button>
                </div>
            </div>
        </div>
    </div>


    <!-- <div class="container my-5">
        <div class="row">
            <div class="col-12"> -->
                <!-- Card con Tabla -->
                <!-- <div class="card shadow-sm">
                    <div class="card-header bg-warning text-center">
                        <h5 class="card-title mb-0">SQL Realizada (Eliminar en producción)</h5>
                    </div>
                    <div class="p-2">
                        <?php // echo $sqlSelect; ?>
                    </div>
                </div>
            </div> -->
            <?php // if ($errorSql != "") { ?>
                <!-- <div class="col-12"> -->
                    <!-- Card con Tabla -->
                    <!-- <div class="card shadow-sm">
                        <div class="card-header bg-danger text-white text-center">
                            <h5 class="card-title mb-0">Error</h5>
                        </div>
                        <div class="p-2">
                            <?php // echo $errorSql; ?>
                        </div>
                    </div>
                </div> -->
            <?php // } ?>
        <!-- </div>
    </div> -->

    <!-- Bootstrap JS -->
    <script src="extension/bootstrap/bootstrap.bundle.min.js"></script>

    <!-- jQuery JS -->
    <script src="extension/jquery/jquery-3.7.1.min.js"></script>

    <script>
        // RECOGER DATOS PARA EDICIÓN
        function cargarDatosParaEdicion(nombre, apellidos, telefono, email, direccion, puesto_solicitado, experiencia, educacion) {
            $("#nombre").val(nombre);
            $("#apellidos").val(apellidos);
            $("#telefono").val(telefono);
            $("#email").val(email);
            $("#direccion").val(direccion);

            $("#puesto_solicitado").val(puesto_solicitado);
            $("#experiencia").val(experiencia);
            $("#educacion").val(educacion);

        }


        // MENSAJES
        function mensajeExito() {
            $("#form-container").hide();
            $("#successAlert").fadeIn().delay(5000).fadeOut();

            $("#confirmation").removeClass('d-none');
        }

        function mensajeErrores() {
            $("#errorAlert").fadeIn().delay(5000).fadeOut();
        }

        // Al cargar el documento
        $(document).ready(function() {

            // Datos por defecto
            cargarDatosParaEdicion("", "", "", "", "", "", "", "");

            <?php

            if (isset($bdResultado)) {
                if ($bdResultado) {
            ?>
                    mensajeExito();
                <?php
                } else {
                ?>
                    mensajeErrores();
            <?php
                }
            }
            ?>




            // SUBMIT - GRABAR
            const form = $("#formulario");
            form.on("submit", function(event) {
                if (!form[0].checkValidity()) { // No se han validado los valores de los campos
                    event.preventDefault(); // Evita envío del formulario
                    event.stopPropagation(); // Evita que continue el evento a etiquetas padres del DOM

                    form.addClass("was-validated");
                    mensajeErrores();
                    return false;
                }
            });

            // Botón para nueva reserva
            $("#btnNuevaSolicitud").on("click", function() {
                $("#confirmation").addClass('d-none');
                $("#form-container").show();
                form.removeClass("was-validated");
            });

        });
    </script>
</body>

</html>