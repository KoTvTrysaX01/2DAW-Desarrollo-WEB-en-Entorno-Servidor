<?php
$sqlBD = SqlConecta($hostSql, $userSql, $passSql, $basedatosSql);

$where = "";
$orderby = "";
$filters = array();

if (isset($_POST['attributes'])) {
    $filters = explode(", ", $_POST['attributes']);
}

foreach ($filters as $filter) {
    switch ($filter) {
        case "Name":
            $orderby = " ORDER BY name ASC ";
            break;
        case "Stock":
            $where = " AND stock = 1 ";
            break;
        default:
            if ($filter != "") {
                if ($where == "") {
                    $where = " AND attributes LIKE '%" . lcfirst($filter) . "%'";
                } else {
                    $where .= " AND attributes LIKE '%" . lcfirst($filter) . "%'";
                }
            }
            break;
    }
}

$filter = "";
$filter = $where . $orderby;

$sqlSelect = "SELECT * FROM products WHERE category = '{$config['category']}' {$filter}";

// echo $sqlSelect;

$sqlCursor = sqlQuery($sqlBD, $sqlSelect);
$arrayProductos = sqlResultArray($sqlBD, $sqlCursor);


$sqlSelect = "SELECT * FROM products WHERE category = '{$config['category']}' ORDER BY LENGTH('attributes')";
$sqlCursor = sqlQuery($sqlBD, $sqlSelect);
$arrayResults = sqlResultArray($sqlBD, $sqlCursor);
$attributes = array();
for ($i = 0; $i < count($arrayResults); $i++) {
    $temp_array = explode(", ", $arrayResults[$i]['attributes']);
    foreach ($temp_array as $x) {
        if (!in_array($x, $attributes)) {
            array_push($attributes, $x);
        }
    }
}

SqlDesconecta($sqlBD);

?>

<section class="food-section">
    <h2>Ice Bars Paradise</h2>
    <form id="myForm" method="post">
        <input type="hidden" id="attributes" name="attributes" value="" />
        <div class="filtros">
            <button class="filter-button" onclick="myFunction(this)" name="Name">Name</button>
            <button class="filter-button" onclick="myFunction(this)" name="Stock">Stock</button>
            <?php
            foreach ($attributes as $attribute) {
            ?>
                <button class="filter-button <?php if(in_array(ucfirst($attribute), $filters)){echo "filtered";}?>" onclick="myFunction(this)" name="<?php echo ucfirst($attribute); ?>"><?php echo ucfirst($attribute); ?></button>
            <?php
            }
            ?>
        </div>
        <input class="filter-button" type="submit" name="submit" value="Filter" />
    </form>

    <div class="scroll-container">
        <?php for ($i = 0; $i < count($arrayProductos); $i++) { ?>
            <div class="food-item" onclick="location.href='<?php echo 'products.php?category=' . $config['category'] . '&id=' . $arrayProductos[$i]['id'] ?>'">
                <img src="<?php echo $arrayProductos[$i]['image']; ?>">
                <h3 class="name"><?php echo $arrayProductos[$i]['name']; ?></h3>
                <span class="price"><?php echo $arrayProductos[$i]['price']; ?>€</span>
                <button class="order-btn" onclick="location.href='<?php echo 'products.php?category=' . $config['category'] . '&id=' . $arrayProductos[$i]['id'] ?>'">Order Now</button>
            </div>
        <?php } ?>
    </div>
</section>