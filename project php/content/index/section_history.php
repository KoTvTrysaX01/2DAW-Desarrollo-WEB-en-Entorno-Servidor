<?php

// Searches for sales by user ID
$sqlBD = SqlConecta($hostSql, $userSql, $passSql, $basedatosSql);
$sqlSelect = "SELECT * FROM sells WHERE id_user = '{$_SESSION['user']['id']}' ORDER BY purchase_date DESC, id DESC";
$sqlCursor = sqlQuery($sqlBD, $sqlSelect);
$arrayHistory = sqlResultArray($sqlBD, $sqlCursor);

// Initially, it shows only the 10 most recent entries, but if the user wishes, it can show all purchases associated with it.
$quantity = count($arrayHistory);
$showedAll = false;
if ($quantity > 10) {
    $num_rows = 10;

    if (isset($_POST['show_all'])) {
        $showedAll = true;
        $num_rows = $quantity;
    }
} else {
    $num_rows = $quantity;
}
?>
<div class="cont-1">
    <div class="container">
        <h2>Your Purchase History</h2>
        <table>
            <tr>
                <th>Order ID</th>
                <th>Date</th>
                <th>Items</th>
                <th>Price</th>
            </tr>
            <?php for ($i = 0; $i < $num_rows; $i++) { ?>
                <tr>
                    <td>
                        <?php
                        echo $arrayHistory[$i]['id'];
                        ?>
                    </td>
                    <td>

                        <?php
                        echo $arrayHistory[$i]['purchase_date'];
                        ?>
                    </td>
                    <td>
                        <?php
                        echo $arrayHistory[$i]['products'];
                        ?>
                    </td>
                    <td>
                        <?php
                        echo $arrayHistory[$i]['total_price'] . "€";
                        ?>
                    </td>
                </tr>
            <?php
            }
            ?>
        </table>
        <?php if (count($arrayHistory) > 10 && !$showedAll) {
        ?>
            <form method="post">
                <p>You 10 last orders.</p>
                <input type="submit" class="btn" name="show_all" value="Show All" />
            </form>
        <?php
        }; ?>
        <button class="btn-back" onclick="location.href='./index.php?page=home'">Go Back</button>
    </div>

</div>