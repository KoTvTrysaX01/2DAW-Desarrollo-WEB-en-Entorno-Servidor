<style>
    :root {
        --header-bg-color-1: rgb(255, 255, 255);
        --header-bg-color-2: rgb(255, 181, 209);
    }

    .cont-1 {
        display: grid;
        align-items: center;
        justify-content: center;
        width: 100%;
    }

    .container {
        background: white;
        padding: 20px;
        width: 100%;
        margin: 2em 0;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 10px;
    }

    th,
    td {
        border: 1px solid #ddd;
        padding: 10px;
        text-align: center;
    }

    th {
        background: #ff5722;
        color: white;
    }

    .btn {
        background: #ff5722;
        color: white;
        border: none;
        padding: 8px 12px;
        border-radius: 5px;
        cursor: pointer;
    }

    .btn:hover,
    .btn-back:hover {
        background: #e64a19;
    }

    .total {
        font-size: 18px;
        margin-top: 15px;
    }

    .btn-back {
        background: #ff5722;
        color: white;
        border: none;
        padding: 1em 3em;
        font-size: 1.2em;
        border-radius: 15px;
        cursor: pointer;
    }
</style>
<?php
$filter = "";



$sqlBD = SqlConecta($hostSql, $userSql, $passSql, $basedatosSql);
$filter = " LIMIT 10";
$sqlSelect = "SELECT * FROM sells WHERE id_user = '{$_SESSION['user']['id']}' ORDER BY purchase_date DESC";
$sqlCursor = sqlQuery($sqlBD, $sqlSelect);
$arrayHistory = sqlResultArray($sqlBD, $sqlCursor);

$quantity = count($arrayHistory);

if ($quantity > 10) {
    $num_rows = 10;

    if (isset($_POST['show_all'])) {
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
                        echo $arrayHistory[$i]['total_price'];
                        ?>
                    </td>
                </tr>
            <?php
            }
            ?>
        </table>
        <?php if (count($arrayHistory) > 10) {
        ?>
            <form method="post">
                <input type="submit" name="show_all" value="Show All" />
            </form>
        <?php
        }; ?>
        <br>
    </div>
    <button class="btn-back" onclick="location.href='./index.php?page=home'">Go Back</button>
</div>