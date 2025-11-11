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
    <div class="carousel">
        <div class="group">
            <div class="card">
                <img src="../assets/heladeria/ice-bars/Caramel_Gold.png" alt="Caramel_Gold"
                    onclick="location.href='./categories/product/product.html'">
            </div>
            <div class="card">
                <img src="../assets/heladeria/milkshakes/Bananalicious.png" alt="Bananalicious">
            </div>
            <div class="card">
                <img src="../assets/heladeria/cookies/Caja_White_Chocolate_&_Walnut.png"
                    alt="Caja_White_Chocolate_">
            </div>
            <div class="card">
                <img src="../assets/heladeria/ice-creams/Bombón_Praline.png" alt="Bombón_Praline">
            </div>
            <div class="card">
                <img src="../assets/heladeria/juices/Green_Power.png" alt="Green_Power">
            </div>
            <div class="card">
                <img src="../assets/heladeria/smoothies/Dragon_Fruit_Mix.png" alt="Dragon_Fruit_Mix">
            </div>
        </div>
        <div aria-hidden class="group">
            <div class="card">
                <img src="../assets/heladeria/ice-bars/Caramel_Gold.png" alt="Caramel_Gold">
            </div>
            <div class="card">
                <img src="../assets/heladeria/milkshakes/Bananalicious.png" alt="Bananalicious">
            </div>
            <div class="card">
                <img src="../assets/heladeria/cookies/Caja_White_Chocolate_&_Walnut.png"
                    alt="Caja_White_Chocolate_">
            </div>
            <div class="card">
                <img src="../assets/heladeria/ice-creams/Bombón_Praline.png" alt="Bombón_Praline">
            </div>
            <div class="card">
                <img src="../assets/heladeria/juices/Green_Power.png" alt="Green_Power">
            </div>
            <div class="card">
                <img src="../assets/heladeria/smoothies/Dragon_Fruit_Mix.png" alt="Dragon_Fruit_Mix">
            </div>
        </div>
    </div>
</section>