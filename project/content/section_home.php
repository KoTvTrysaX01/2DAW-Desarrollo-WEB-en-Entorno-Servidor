<section class="hero">
    <?php
    if ($loggedin) {
    ?>
        <h1 class="welcome-msg">Welcome <?php echo $_SESSION['usuario'] ?></h1>
    <?php
    }
    ?>
    <h2>All your faves, all in one place. </h2>
    <p>Discover our wide range of the most exclusive products, handmade creations made with top quality
        ingredients.
    </p>
    <button>Order Now</button>
</section>

<section class="restaurants">
    <h2>Today's special offers</h2>

    <?php
    $sqlBD = SqlConecta($hostSql, $userSql, $passSql, $basedatosSql);
    $sqlSelect = "SELECT * FROM special_offers";
    $sqlCursor = sqlQuery($sqlBD, $sqlSelect);
    $arraySpecials = sqlResultArray($sqlBD, $sqlCursor);

    echo count($arraySpecials);
    ?>

    <div class="carousel">
        <div class="group">
            <?php for ($i = 0; $i < count($arraySpecials); $i++) { ?>
                <div class="card">
                    <img src="<?php echo $arraySpecials[$i]['imagen']; ?>" alt="<?php echo $arraySpecials[$i]['nombre']; ?>"
                        onclick="location.href='./categories/product/product.html'">
                </div>
            <?php } ?>
        </div>
        <div aria-hidden class="group">
            <?php for ($i = 0; $i < count($arraySpecials); $i++) { ?>
                <div class="card">
                    <img src="<?php echo $arraySpecials[$i]['imagen']; ?>" alt="<?php echo $arraySpecials[$i]['nombre']; ?>"
                        onclick="location.href='./categories/product/product.html'">
                </div>
            <?php } ?>
        </div>
    </div>
</section>