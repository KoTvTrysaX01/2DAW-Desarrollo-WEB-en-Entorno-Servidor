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
} elseif (isset($_POST['delete'])) {
    array_splice($_SESSION['cart'], $_POST['id'], 1);

    print_r($_SESSION['cart']);
}
?>

<div class="cont-1">
    <div class="container">
        <h2>Your Food Cart</h2>

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
                    $total_price += $_SESSION['cart'][$i]['price'];

                    echo "<td>" . $_SESSION['cart'][$i]['name'] . "</td>";
                    echo "<td>" . $_SESSION['cart'][$i]['quantity'] . "</td>";
                    echo "<td>" . $_SESSION['cart'][$i]['price'] . "</td>";
                    echo "<form method='post'><input type='number'name='id' value='{$i}' hidden />";
            ?>
                    <td><input type='submit' name='delete' value='Delete' /></td>
                    </form>
            <?php

                    echo "</tr>";
                }
            }

            ?>
        </table>

        <div class="total">
            <strong><?php echo $total_price . "€"; ?></strong>
        </div>
        <?php

        if (!isset($_SESSION['user'])) {
            echo "<h3>To be able to proceed you must first Log In</h3>";
        }
        ?>
        <button class="btn" onclick="location.href='./index.php?category=purchase'"  <?php

                                                                                    if (!isset($_SESSION['user'])) {
                                                                                        echo 'id="btn-block"';
                                                                                        echo " disabled";
                                                                                    }

                                                                                    ?>  >Proceed to Checkout</button>

    </div>
    <button class="btn-back" onclick="location.href='./index.php?page=home'">Go Back</button>
</div>