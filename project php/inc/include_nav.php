<?php


?>

<nav>
    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="products.php?category=ice_creams">Ice Creams</a></li>
        <li><a href="products.php?category=ice_bars">Ice Bars</a></li>
        <li><a href="products.php?category=cookies">Cookies</a></li>
        <li><a href="products.php?category=chocolates">Chocolates</a></li>
        <li>
            <div class="dropdown">
                <button class="dropbtn" onclick="toggleDropdown()">Drinks</button>
                <div class="dropdown-content" id="dropdownMenu">
                    <a href="products.php?category=milkshakes">Milkshakes</a>
                    <a href="products.php?category=juices">Juices</a>
                    <a href="products.php?category=smoothies">Smoothies</a>
                </div>
            </div>
        <li>
    </ul>
</nav>