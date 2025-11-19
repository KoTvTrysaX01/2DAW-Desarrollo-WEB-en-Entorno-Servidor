<?php
// Deletes the product with the specified ID
if (isset($_POST['delete'])) {
    array_splice($_SESSION['cart'], $_POST['id'], 1);
}


// Known bug. If try access the cart after loggin in, the cart products might not display correctly. Deletting them and start over would be the solution

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
            // Displays all items from the cart and sums their prices


            $total_price = 0;
            if (isset($_SESSION['cart'])) {
                for ($i = 0; $i < count($_SESSION['cart']); $i++) {
                    echo "<tr>";
                    $total_price += $_SESSION['cart'][$i]['price'];

                    echo "<td>" . $_SESSION['cart'][$i]['name'] . "</td>";
                    echo "<td>" . $_SESSION['cart'][$i]['quantity'] . "</td>";
                    echo "<td>" . $_SESSION['cart'][$i]['price'] . "</td>";
                    echo "<form method='post'><input type='number'name='id' value='{$i}' hidden />";
            ?>
                    <td><input type='submit' class="btn"  name='delete' value='Delete' /></td>
                    </form>
            <?php
                    echo "</tr>";
                }
            }
            ?>
        </table>

        <div class="total">
            <strong>Total: <?php echo $total_price . "€"; ?></strong>
        </div>
        <?php
        //Shows a warning if the user is not logged in.
        if (empty($_SESSION['user'])) {
            echo "<h3>To be able to proceed you must first Log In</h3>";
        }
        ?>
        <button class="btn" onclick="location.href='./index.php?category=purchase'" <?php
        
                                                                                    if (empty($_SESSION['user']) || count($_SESSION['cart']) == 0 ){
                                                                                        echo 'id="btn-block"';
                                                                                        echo " disabled";
                                                                                    }

                                                                                    ?>>Proceed to Checkout</button>

    </div>
    <button class="btn-back" onclick="location.href='./index.php?page=home'">Go Back</button>
</div>