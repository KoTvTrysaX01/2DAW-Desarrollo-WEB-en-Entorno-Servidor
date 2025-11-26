<?php
require_once "dao/include_mysql.php";
require_once "dao/include_vars.php";


/* PREPARAR SQL */
$sqlSelect = "";
$sqlBD = SqlConecta($hostSql, $userSql, $passSql, $basedatosSql);
$sqlSelect = "SELECT * FROM peliculas";
$sqlCursor = sqlQuery($sqlBD, $sqlSelect);
$arrayPeliculas = sqlResultArray($sqlBD, $sqlCursor);
/* RECOGIDA DE DATOS de la BD */



/* FUNCIONES DEFINIDAS POR EL USUARIO */

// Obtener clase del Género
function obtenerClaseGenero($genero)
{

    $clases = [
        'Ciencia Ficción' => 'genre-scifi',
        'Drama Histórico' => 'genre-drama',
        'Drama Fantástico' => 'genre-drama',
        'Acción/Ciencia Ficción' => 'genre-accion',
        'Drama/Thriller' => 'genre-drama',
        'Drama/Terror' => 'genre-terror'
    ];
    $resul = "genre-drama"; // Valor por defecto
    if (isset($clases[$genero])) {
        $resul = $clases[$genero];
    }

    return $resul;
}

// Mostrar estrellas según el rating
function generarEstrellas($rating, $maximo = 10)
{
    // Convertir rating de 0-10 a 0-5 que son las estrellas que se muestran
    $ratingNormalizado = $rating / ($maximo / 5);

    // Ejemplos
    // 3.3 => 3 estrellas llenas
    // 3.7 => 3 estrellas llenas y media estrella
    // 3.9 => 3 estrellas llenas y media estrella
    $estrellasLlenas = floor($ratingNormalizado);
    $tieneMediaEstrella = ($ratingNormalizado - $estrellasLlenas) >= 0.5;
    $estrellasVacias = 5 - $estrellasLlenas - ($tieneMediaEstrella ? 1 : 0);

    $html = '<div class="rating-stars">';

    // Estrellas llenas
    for ($i = 0; $i < $estrellasLlenas; $i++) {
        $html .= '<i class="fas fa-star"></i>';
    }

    // Media estrella (si aplica)
    if ($tieneMediaEstrella) {
        $html .= '<i class="fas fa-star-half-alt"></i>';
    }

    // Estrellas vacías
    for ($i = 0; $i < $estrellasVacias; $i++) {
        $html .= '<i class="far fa-star"></i>';
    }

    $html .= '</div>';

    return $html;
}

?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo de Películas</title>

    <!-- Bootstrap 5 CSS -->
    <link href="extension/bootstrap/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="extension/font-awesome/all.min.css">

    <!-- CSS Personalizado -->
    <link rel="stylesheet" href="css/style.css">

</head>

<body>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-12">
                <!-- Título con estilo -->
                <h1 class="page-title text-center mb-4"><i class="fas fa-film me-3 clapperboard-icon"></i>Catálogo de Películas</h1>

                <!-- Card con Tabla -->
                <div class="card card-custom">
                    <div class="card-header card-header-custom text-center">
                        <h3 class="card-title mb-0"><i class="fas fa-ticket-alt me-2"></i>Las Mejores Películas de la Década</h3>
                        <p class="mb-0 mt-2 opacity-75">Críticas, puntuaciones y datos técnicos</p>
                    </div>

                    <div class="card-body p-0">
                        <!-- Tabla Responsive -->
                        <div class="table-responsive">
                            <table class="table table-custom table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th scope="col" class="text-center">#</th>
                                        <th scope="col">Película / Director</th>
                                        <th scope="col" class="text-center">Año</th>
                                        <th scope="col" class="text-center">Género</th>
                                        <th scope="col" class="text-center">Duración</th>
                                        <th scope="col" class="text-center">Rating</th>
                                        <th scope="col" class="text-center">Premios</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    for ($i = 0; $i < count($arrayPeliculas); $i++) {
                                    ?>
                                        <tr class="movie-row-top">
                                            <th scope="row" class="text-center"><?php echo $arrayPeliculas[$i]['id'] ?></th>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="movie-poster poster-<?php echo $i + 1 ?> me-3">
                                                        <?php echo $arrayPeliculas[$i]['poster'] ?>
                                                    </div>
                                                    <div>
                                                        <div class="movie-title"><?php echo $arrayPeliculas[$i]['titulo'] ?></div>
                                                        <div class="movie-director"><?php echo $arrayPeliculas[$i]['director'] ?></div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <span class="year-badge"><?php echo $arrayPeliculas[$i]['anio'] ?></span>
                                            </td>
                                            <td class="text-center">
                                                <span class="genre-badge <?php echo obtenerClaseGenero($arrayPeliculas[$i]['genero']) ?>"><?php echo $arrayPeliculas[$i]['genero'] ?></span>
                                            </td>
                                            <td class="text-center duration"><?php echo $arrayPeliculas[$i]['duracion'] ?></td>
                                            <td class="text-center">
                                                <?php echo generarEstrellas($arrayPeliculas[$i]['rating']) ?>
                                                <div class="rating-number"><?php echo $arrayPeliculas[$i]['rating'] . "/10" ?></div>
                                            </td>
                                            <td class="text-center">
                                                <i class="fas <?php if ($arrayPeliculas[$i]['oscar_winner']) {
                                                                                echo "fa-trophy oscar-winner";
                                                                            }else{echo "fa-award oscar-nominee";} ?>  me-1"></i>
                                                <span><?php echo $arrayPeliculas[$i]['premios'] ?></span>
                                            </td>
                                        </tr>
                                    <?php
                                    }


                                    ?>


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Información adicional -->
                <div class="mt-4 text-center text-muted">
                    <small><i class="fas fa-info-circle me-1"></i>Datos actualizados a Noviembre 2023 - Fuente: IMDb y Box Office Mojo</small>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="extension/bootstrap/bootstrap.bundle.min.js"></script>

    <!-- Font Awesome -->
    <script src="extension/font-awesome/all.min.js"></script>

</body>

</html>