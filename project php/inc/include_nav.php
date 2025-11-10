<?php


?>

<nav>
    <ul>
        <li><a href="index.php?page=home">Home</a></li>
        <li><a href="index.php?page=products&category=ice_creams">Ice Creams</a></li>
        <li><a href="index.php?page=products&category=ice_bars">Ice Bars</a></li>
        <li><a href="index.php?page=products&category=cookies">Cookies</a></li>
        <li><a href="index.php?page=products&category=chocolates">Chocolates</a></li>
        <li>
            <div class="dropdown">
                <button class="dropbtn" onclick="toggleDropdown()">Drinks</button>
                <div class="dropdown-content" id="dropdownMenu">
                    <a href="index.php?page=products&category=milkshakes">Milkshakes</a>
                    <a href="index.php?page=products&category=juices">Juices</a>
                    <a href="index.php?page=products&category=smoothies">Smoothies</a>
                </div>
            </div>
        <li>
    </ul>
</nav>