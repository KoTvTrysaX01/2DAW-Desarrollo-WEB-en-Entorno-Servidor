<header>
    <div class="logo">Helado Express</div>
    <div class="right-section">

        <?php
        if ($loggedroot) {
        ?>
            <a href="index.php?page=contents" class="button">Table of Products 📋</a>
        <?php
        }
        ?>
        <a href="index.php?page=reviews" class="button">Customer Reviews 🍧</a>
        <?php
        if (!$loggedin) {
        ?> <a href="#" class="button btn-block">Cart 🛒</a>
            <a href="#" class="button btn-block">History 📒</a>
            <a href="index.php?page=login" class="button">Login 🚪</a>
        <?php
        } else {
        ?>
            <a href="index.php?page=cart" class="button">Cart 🛒</a>
            <a href="index.php?page=history" class="button">History 📒</a>
            <a href="index.php?page=logout" class="button">Logout 💨</a>
        <?php
        }
        ?>

    </div>
</header>