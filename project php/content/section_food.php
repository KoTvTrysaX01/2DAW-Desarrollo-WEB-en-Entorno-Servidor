<?php
$sqlSelect = "SELECT * FROM " . $config['page'] . " ORDER BY nombre";

$sqlBD = SqlConecta($hostSql, $userSql, $passSql, $basedatosSql);
$sqlCursor = sqlQuery($sqlBD, $sqlSelect);
$arrayProductos = sqlResultArray($sqlBD, $sqlCursor);
SqlDesconecta($sqlBD);
?>



<section class="food-section">
    <h2>Ice Bars Paradise</h2>
    <div class="filtros">
        <button class="filter-button" onclick="myFunction(this)">Fruits</button>
        <button class="filter-button" onclick="myFunction(this)">Berries</button>
        <button class="filter-button" onclick="myFunction(this)">Ice Pops</button>
        <button class="filter-button" onclick="myFunction(this)">Nuts</button>
        <button class="filter-button" onclick="myFunction(this)">Chocolate</button>
        <button class="filter-button" onclick="myFunction(this)">0% Sugar</button>
        <button class="filter-button" onclick="myFunction(this)">Discount</button>
        <button class="filter-button" onclick="myFunction(this)">Stock</button>
    </div>
    <div class="scroll-container">
        <?php for ($i = 0; $i < count($arrayProductos); $i++) { ?>
            <div class="food-item">
                <img src="<?php echo $arrayProductos[$i]['imagen']; ?>" onclick="location.href='./product/product.html'">
                <h3 class="nombre"><?php echo $arrayProductos[$i]['nombre']; ?></h3>
                <span class="price"><?php echo $arrayProductos[$i]['precio']; ?></span>
                <button class="order-btn" onclick="location.href='../login/los.html'">Order Now</button>
            </div>
        <?php } ?>
    </div>
</section>