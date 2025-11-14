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
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        margin: 2em 0em;
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
if (isset($_POST['purchase'])) {
    $sqlBD = sqlConecta($hostSql, $userSql, $passSql, $basedatosSql);
    sqlIniTrans($sqlBD);
    $sql = "INSERT INTO sells (products,total_price,id_user,username,email,purchase_date)
    VALUES ('" . $_POST["products"] . "','" . $_POST["total_price"] . "','" . 1 . "','" . $_SESSION['usuario'] . "','" . "example@mail.com" . "','" . date("Y-m-d") . "')";
    sqlQuery($sqlBD, $sql);

    sqlFinTrans($sqlBD);
}
?>

<div class="cont-1">
    <div class="container">
        <h2>Your Food Cart</h2>
        <form>
            <table>
                <tr>
                    <th>Item</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
                <?php
                $total_price = 0;
                $array_id = 0;
                if (isset($_SESSION['cart'])) {
                    for ($i = 0; $i < count($_SESSION['cart']); $i++) {
                        $array_id = $i;
                        echo "<tr>";

                        $total_price .= $_SESSION['cart'][$i]['price'];
                        echo "<td>" . $_SESSION['cart'][$i]['name'] . "</td>";
                        echo "<td>" . $_SESSION['cart'][$i]['quantity'] . "</td>";
                        echo "<td>" . $_SESSION['cart'][$i]['price'] . "</td>";
                ?>
                        <td><input type='submit' name='{$array_id}' value='Delete' /></td>
                <?php

                        echo "</tr>";
                    }
                }

                ?>
            </table>

            <div class="total">
                <strong><?php echo $total_price . "€"; ?></strong>
            </div>
            <input type="submit" name="purchase" class="btn" value="Proceed to Checkout">
        </form>

    </div>
    <button class="btn-back" onclick="location.href='./index.php?page=home'">Go Back</button>
</div>