<?php
$sqlSelect = "SHOW TABLES FROM helado_express";

$sqlBD = SqlConecta($hostSql, $userSql, $passSql, $basedatosSql);
$sqlCursor = sqlQuery($sqlBD, $sqlSelect);
$tablesDB = sqlResultArray($sqlBD, $sqlCursor);

SqlDesconecta($sqlBD);



$myTable = array();

foreach ($tablesDB as $tableArray) {
    foreach ($tableArray as $value) {
        array_push($myTable, $value);
    }
}

print_r($myTable);



?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="table-container">
                <h2 class="text-center">Table of Contents</h2>
                <?php
                foreach ($myTable as $table) {
                ?>
                    <h2 class="text-center">Table of <?php echo $table; ?></h2>
                    <table class="<?php echo $table; ?> table table-striped table-hover">

                        <?php
                        $sqlSelect = "SELECT * FROM " . $table;
                        $sqlBD = SqlConecta($hostSql, $userSql, $passSql, $basedatosSql);
                        $sqlCursor = sqlQuery($sqlBD, $sqlSelect);
                        $tableData = sqlResultArray($sqlBD, $sqlCursor);

                        $sqlSelect = "SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_NAME` ='" . $table . "'";
                        $sqlBD = SqlConecta($hostSql, $userSql, $passSql, $basedatosSql);
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
                        <tr>
                            <?php
                            foreach ($myColumns as $column) {
                            ?>

                                <th><?php echo $column; ?></th>
                            <?php
                            }
                            ?>
                        </tr>

                        <?php
                        foreach ($tableData as $dataArray) {
                        ?><tr>
                                <?php
                                foreach ($dataArray as $data) {
                                ?> <td><?php echo $data; ?></td><?php
                                                            }
                                                                ?></tr><?php
                                                                        } ?>

                    </table>
                <?php
                }

                ?>
            </div>
        </div>
    </div>
</div>