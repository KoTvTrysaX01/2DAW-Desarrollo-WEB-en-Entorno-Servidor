<style>
    /* Basic Styling */
    html,
    body {
        height: 100%;
        width: 100%;
        margin: 0;
        font-family: 'Roboto', sans-serif;

        background: url(<?php echo "'./assets/bg/{$config['category']}.png'"; ?>);

        background-size: cover;
        background-repeat: no-repeat;
        background-attachment: fixed;

        display: flex;
        flex-flow: column;
        justify-content: center;
        height: 100%;
    }

    .container {
        flex: 1 1 auto;
        max-width: 800px;
        padding: 15px;
        display: flex;
        background-color: rgb(255, 255, 255);
        border-radius: 35px;
        margin: 0.5em;
        align-self: center;
    }

    /* Columns */
    .left-column {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 50%;
        position: relative;
    }

    .right-column {
        width: 50%;
        margin-top: 60px;
    }

    /* Left Column */
    .left-column img {
        align-self: center;
        max-width: 12vw;
        transition: all 0.3s ease;
    }


    /* Product Description */
    .product-description {
        border-bottom: 1px solid #E1E8EE;
        margin-bottom: 20px;
    }

    .product-description span {
        font-size: 12px;
        color: #358ED7;
        letter-spacing: 1px;
        text-transform: uppercase;
        text-decoration: none;
    }

    .product-description h1 {
        font-weight: 300;
        font-size: 52px;
        color: #43484D;
        letter-spacing: -2px;
    }

    .product-description p {
        font-size: 16px;
        font-weight: 300;
        color: #86939E;
        line-height: 24px;
    }


    .product-price {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .prices {
        margin-right: 20px;
    }

    .price-now {
        font-size: 26px;
        font-weight: 300;
        color: #43474D;
        margin-right: 5px;
    }

    .price-before {
        font-size: 20px;
        font-weight: 250;
        color: #7b7f85;
        text-decoration: line-through;
    }

    .cart-btn {
        display: inline-block;
        background-color: #7DC855;
        border-radius: 6px;
        font-size: 16px;
        color: #FFFFFF;
        text-decoration: none;
        padding: 12px 30px;
        transition: all .5s;
    }

    .cart-btn:hover {
        background-color: #64af3d;
    }

    @media (max-width: 940px) {
        .container {
            flex-direction: column;
            margin-top: 60px;
        }

        .left-column,
        .right-column {
            width: 100%;
        }

        .left-column img {
            width: 300px;
            right: 0;
            top: -65px;
            left: initial;
        }
    }

    @media (max-width: 535px) {
        .left-column img {
            width: 220px;
            top: -85px;
        }
    }
</style>
<?php
$sqlBD = SqlConecta($hostSql, $userSql, $passSql, $basedatosSql);
$sqlSelect = "SELECT * FROM products WHERE id = '{$_GET['id']}'";
$sqlCursor = sqlQuery($sqlBD, $sqlSelect);
$arraySpecials = sqlResultArray($sqlBD, $sqlCursor);

if (isset($_POST['add'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $quantity = (int)$_POST['quantity'];
    $price = $_POST['price'] * $_POST['quantity'];

    $product = array(
        "id" => $id,
        "name" => $name,
        "quantity" => $quantity,
        "price" => $price
    );

    $sameProduct = false;

    for ($i = 0; $i < count($_SESSION['cart']); $i++) {
        if ($_SESSION['cart'][$i]['id'] == $product['id']) {
            $_SESSION['cart'][$i]['quantity'] += $product['quantity'];
            $_SESSION['cart'][$i]['price'] = $product['price'] * $_SESSION['cart'][$i]['quantity'];
            $sameProduct = true;
            break;
        }
    }
    if (!$sameProduct) {
        array_push($_SESSION['cart'], $product);
    }
    // print_r($_SESSION['cart']);
}
?>


<main class="container">

    <!-- Left Column / Headphones Image -->
    <div class="left-column">
        <img data-image="red" class="active" src="<?php echo $arraySpecials[0]['image']; ?>" alt="<?php echo $arraySpecials[0]['name']; ?>">
    </div>


    <!-- Right Column -->
    <div class="right-column">

        <!-- Product Description -->
        <div class="product-description">
            <span onclick="location.href='products.php?category=<?php echo $config['category'] ?>'"><?php echo $config['category'] ?></span>
            <h1><?php echo $arraySpecials[0]['name'] ?></h1>
            <p><?php echo $arraySpecials[0]['description'] ?></p>
        </div>

        <!-- Product Pricing -->
        <div class="product-price">
            <div class="prices">
                <span class="price-now"><?php echo $arraySpecials[0]['price'] ?>€</span>
                <span class="price-before"><?php echo $arraySpecials[0]['old_price'] ?>€</span>
            </div>


        </div>
        <form method="post">
            <input type="id" name="id" value="<?php echo $arraySpecials[0]['id'] ?>" hidden />
            <input type="text" name="name" value="<?php echo $arraySpecials[0]['name'] ?>" hidden />
            <input type="number" name="price" value="<?php echo $arraySpecials[0]['price'] ?>" hidden />
            <input type="number" min="1" max="10" value="1" name="quantity" />
            <input type="submit" name="add" class="cart-btn" value="Add to cart">
        </form>

    </div>
</main>