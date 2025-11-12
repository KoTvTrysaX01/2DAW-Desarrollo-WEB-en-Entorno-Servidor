<?php
$sqlBD = SqlConecta($hostSql, $userSql, $passSql, $basedatosSql);

$where = "";
$orderby = "";
$filters = array();

if (isset($_POST['attributes'])) {
    $filters = explode(", ", $_POST['attributes']);
}

print_r($filters);

foreach ($filters as $filter) {
    switch ($filter) {
        case "Nombre":
            $orderby = " ORDER BY nombre ASC ";
            break;
        case "Stock":
            $where = " WHERE stock = 1 ";
            break;
        default:
            if ($filter != "") {
                if ($where == "") {
                    $where = " WHERE attributes LIKE '%" . lcfirst($filter) . "%'";
                } else {
                    $where .= " AND attributes LIKE '%" . lcfirst($filter) . "%'";
                }
            }
            break;
    }
}

$filter = "";
$filter = $where . $orderby;



$sqlSelect = "SELECT * FROM " . $config['category'] . $filter;

echo $sqlSelect;

$sqlCursor = sqlQuery($sqlBD, $sqlSelect);
$arrayProductos = sqlResultArray($sqlBD, $sqlCursor);


$sqlSelect = "SELECT * FROM " . $config['category'] . " ORDER BY LENGTH('attributes')";
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



function filter() {}

?>

<section class="food-section">
    <h2>Ice Bars Paradise</h2>
    <form id="myForm" method="post">
        <input type="hidden" id="attributes" name="attributes" value="" />
        <div class="filtros">
            <button class="filter-button" onclick="myFunction(this)" name="Nombre">Name</button>
            <button class="filter-button" onclick="myFunction(this)" name="Stock">Stock</button>
            <!-- <input type="hidden" id="attributes" name="atributes" /> -->
            <?php
            foreach ($attributes as $attribute) {
            ?>
                <!-- <input type="submit" class="filter-button" onclick="myFunction(this)" name="submit"  value="" /> -->
                <button class="filter-button <?php if(in_array(ucfirst($attribute), $filters)){echo "filtered";}?>" onclick="myFunction(this)" name="<?php echo ucfirst($attribute); ?>"><?php echo ucfirst($attribute); ?></button>
            <?php
            }
            ?>
        </div>
        <input class="filter-button" type="submit" name="submit" value="Filter" />
    </form>

    <div class="scroll-container">
        <?php for ($i = 0; $i < count($arrayProductos); $i++) { ?>
            <div class="food-item">
                <img src="<?php echo $arrayProductos[$i]['imagen']; ?>" onclick="location.href='./product/product.html'">
                <h3 class="nombre"><?php echo $arrayProductos[$i]['nombre']; ?></h3>
                <span class="price"><?php echo $arrayProductos[$i]['precio']; ?>€</span>
                <button class="order-btn" onclick="location.href='../login/los.html'">Order Now</button>
            </div>
        <?php } ?>
    </div>
</section>