<?php

$var_sql1 = "";
$var_sql2 = "";
$var_sql3 = "";
switch ($config['category']) {
    case "users":
        $var_sql1 = "SELECT * FROM {$config['category']}";
        $var_sql2 = "SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_NAME` ='users' AND `COLUMN_NAME` NOT LIKE '%CONNECTION%' AND `COLUMN_NAME` NOT LIKE 'USER'";
        $var_sql3 = "{$config['category']} WHERE ";
        break;
    case "sells":
        $var_sql1 = "SELECT * FROM {$config['category']}";
        $var_sql2 = "SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_NAME` ='sells'";
        $var_sql3 = "{$config['category']} WHERE ";
        break;
    case "reviews":
        $var_sql1 = "SELECT * FROM {$config['category']}";
        $var_sql2 = "SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_NAME` ='reviews'";
        $var_sql3 = "{$config['category']} WHERE ";
        break;
    case "mails":
        $var_sql1 = "SELECT * FROM {$config['category']}";
        $var_sql2 = "SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_NAME` ='mails'";
        $var_sql3 = "{$config['category']} WHERE ";
        break;
    case "all_products":
        $var_sql1 = "SELECT * FROM products";
        $var_sql2 = "SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_NAME` ='products'";
        $var_sql3 = "products WHERE ";
        break;
    default:
        $var_sql1 = "SELECT * FROM products WHERE category = '{$config['category']}'";
        $var_sql2 = "SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_NAME` ='products'";
        $var_sql3 = "products WHERE ";
        break;
}

$sqlBD = SqlConecta($hostSql, $userSql, $passSql, $basedatosSql);

$sqlSelect = "SELECT * FROM {$var_sql1}";
$sqlCursor = sqlQuery($sqlBD, $var_sql1);
$tableArray = sqlResultArray($sqlBD, $sqlCursor);

$sqlCursor = sqlQuery($sqlBD, $var_sql2);
$tableColumns = sqlResultArray($sqlBD, $sqlCursor);

$myColumns = array();
foreach ($tableColumns as $columnArray) {
    foreach ($columnArray as $value) {
        array_push($myColumns, $value);
    }
}

$borrado = false;
if (isset($_GET['del'])) {
    $valores['id'] = addslashes(htmlentities(trim($_GET['del'])));
    if ($valores['id'] != "") {
        $sqlDelete = "DELETE FROM {$var_sql3} id='{$valores['id']}'";
        sqlIniTrans($sqlBD);
        $sqlCursor = sqlQuery($sqlBD, $sqlDelete);
        if (!$continuaSql) {
            $numerror = $sqlBD->errno;
            $menerror = $sqlBD->error;
            $bdResultado = false;
            echo "<br>Error SQL: " . $menerror;
        } else {
            $bdResultado = true;
            $borrado = true;
        }
        sqlFinTrans($sqlBD);
        header('Location: ' . "tables.php?category={$config['category']}");
    }
}





?>
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
<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl">
            <div class="table-container">
                <h2 class="text-center">Table of <?php echo $config['category'] ?></h2>

                <div class="text-end mb-2">
                    <button class="btn btn-sm btn-add me-1">
                        <i class="fas fa-plus-square"></i> Nuevo
                    </button>
                </div>

                <table class="table table-striped table-hover">
                    <thead>

                        <tr>
                            <?php
                            for ($i = 0; $i < count($myColumns); $i++) {
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
                        foreach ($tableArray as $dataArray) {
                        ?><tr>
                                <?php
                                foreach ($dataArray as $data) {

                                ?> <td class="text-break"><?php echo $data; ?></td><?php
                                                                                }

                                                                                    ?>
                                <td>
                                    <button class="btn btn-sm btn-edit me-1"
                                        data-id="<?php echo $dataArray['id']; ?>">
                                        <i class="fas fa-edit"></i> Editar
                                    </button>
                                    <button class="btn btn-sm btn-delete"
                                        <?php if($config['category'] == 'users' && $dataArray['isAdmin']){
                                            echo "hidden";
                                        } ?>
                                        data-id="<?php echo $dataArray['id']; ?>"
                                        data-nombre="<?php

                                                        switch ($config['category']) {
                                                            case "sells";
                                                                echo  "selling";
                                                                break;
                                                            case "reviews";
                                                                echo  "review";
                                                            case "mails";
                                                                echo  "mail";
                                                                break;
                                                            case "users";
                                                                echo  "username";
                                                                break;
                                                            default:
                                                                echo $dataArray['name'];
                                                                break;
                                                        }
                                                        ?>">
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
            $(location).attr('href', 'forms.php?category=' + "<?php echo $config['category']; ?>" + '&edit=' + id);
        });

        $('.btn-delete').click(function() {
            registroDelete = $(this).data('id');
            nombreDelete = $(this).data('nombre');
            $('#mensajeConfirm').html("¿Estás seguro de eliminar la " + nombreDelete + "?");
            $('#confirmModal').modal('show');
        });

        $('.btn-add').click(function() {
            $(location).attr('href', 'forms.php?category=<?php echo $config['category']; ?>');
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
            $(location).attr('href', 'tables.php?category= <?php echo $config['category']; ?>&del=' + registroDelete);
        });


    });
</script>