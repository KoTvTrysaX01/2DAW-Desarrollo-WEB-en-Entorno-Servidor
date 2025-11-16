<?php


?>


<header>
    <div class="logo" onclick="location.href='index.php'">Helado Express</div>
    <div class="right-section">

        <?php

        if ($loggedroot) {
        ?>
            <a href="tables.php" class="button">Table of Products 📋</a>
        <?php
        }
        ?>
        <a href="index.php?category=review" class="button">Customer Reviews 🍧</a>
        <a href="index.php?category=contact" class="button">Contact Us ✉️</a>
        <?php
        if (!$loggedin) {
        ?> <a href="index.php?category=cart" class="button">Cart 🛒</a>
            <a href="#" id="btn-block" class=" button">History 📒</a>
            <a href="logs.php" class="button">Login 🚪</a>
        <?php
        } else {
        ?>
            <a href="index.php?category=cart" class="button">Cart 🛒</a>
            <a href="index.php?category=history" class="button">History 📒</a>
            <a href="index.php?category=logout" class="button">Logout 💨</a>
        <?php
        }
        ?>

    </div>
</header>