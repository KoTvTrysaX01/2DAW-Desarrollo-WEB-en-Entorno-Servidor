<?php
require_once "./dao/include_mysql.php";
require_once "./dao/include_vars.php";


$sqlBD = SqlConecta($hostSql, $userSql, $passSql, $basedatosSql);

$sqlSelect = "SELECT * FROM " . $config['section'];
$sqlCursor = sqlQuery($sqlBD, $sqlSelect);
$tableArray = sqlResultArray($sqlBD, $sqlCursor);

$sqlSelect = "SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_NAME` ='" . $config['section'] . "'";
$sqlCursor = sqlQuery($sqlBD, $sqlSelect);
$tableColumns = sqlResultArray($sqlBD, $sqlCursor);

SqlDesconecta($sqlBD);

$myColumns = array();
foreach ($tableColumns as $columnArray) {
    foreach ($columnArray as $value) {
        array_push($myColumns, $value);
    }
}
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Electronica</title>

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

        .btn-add {
            background-color: #0d6efd;
            border: none;
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
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="table-container">
                <h2 class="text-center">Table of <?php echo $config['section']?></h2>

                <div class="text-end mb-2">
                    <button class="btn btn-sm btn-add me-1">
                        <i class="fas fa-plus-square"></i> Nuevo
                    </button>
                </div>

                <table class="table table-striped table-hover">
                    <thead>

                        <tr>
                            <?php
                            for($i = 0; $i < count($myColumns); $i++){
                            // foreach ($myColumns as $column) {
                            ?>

                                <th><?php echo $myColumns[$i]; ?></th>
                            <?php
                            }
                            ?>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        for($i = 0; $i < count($tableArray); $i++){
                            echo count($tableArray[1]);
                        // foreach ($tableArray as $dataArray) {
                        ?><tr>
                                <?php
                                for($y = 0; $y < count($tableArray[$i]); $y++){
                                // foreach ($dataArray as $data) {
                                echo count($tableArray[$i][1]);
                                ?> <td><?php echo $tableArray[$i][$y]; ?></td><?php
                                                            }
                                                                ?>
                                <td>
                                    <button class="btn btn-sm btn-edit me-1"
                                        data-id="<?php echo $tableArray[$i][$y]; ?>">
                                        <i class="fas fa-edit"></i> Editar
                                    </button>
                                    <button class="btn btn-sm btn-delete"
                                        data-id="<?php echo $tableArray[$i][$y]; ?>"
                                        data-nombre="<?php echo $tableArray[$i][$y]; ?>">
                                        <i class="fas fa-trash"></i> Borrar
                                    </button>
                                </td>

                            </tr><?php
                                } ?>
                    </tbody>
                </table>
            </div>
        </div>


        <!-- Modal de Confirmación -->
        <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="confirmModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="confirmModalLabel">Confirmar Acción</h5>
                        <button type="button" id="btn-closeDelete" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div id="mensajeConfirm" class="modal-body">
                        ¿Estás seguro de que deseas eliminar este elemento?
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btn-cancelDelete" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="button" id="btn-confirmDelete" class="btn btn-danger">Eliminar</button>
                    </div>
                </div>
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
        var registroDelete = "";
        var nombreDelete = "";

        // Botones de la tabla
        $('.btn-edit').click(function() {
            const id = $(this).data('id');
            // alert("Editar "+id);
            $(location).attr('href', 'electronica_form.php?edit=' + id);
        });

        $('.btn-delete').click(function() {
            registroDelete = $(this).data('id');
            nombreDelete = $(this).data('nombre');
            $('#mensajeConfirm').html("¿Estás seguro de eliminar la electronica " + nombreDelete + "?");
            $('#confirmModal').modal('show');
        });

        $('.btn-add').click(function() {
            $(location).attr('href', 'electronica_form.php');
        });

        // Botones del mensaje
        $('#btn-cancelDelete').click(function() {
            registroDelete = "";
            // alert("Delete cancelado");
            $('#confirmModal').modal('hide');
        });

        $('#btn-closeDelete').click(function() {
            registroDelete = "";
            // alert("Delete cancelado");
            $('#confirmModal').modal('hide');
        });


        $('#btn-confirmDelete').click(function() {
            // alert("Regitro eliminado");
            $(location).attr('href', '<?php echo $_SERVER['PHP_SELF']; ?>?del=' + registroDelete);
        });


    });
</script>