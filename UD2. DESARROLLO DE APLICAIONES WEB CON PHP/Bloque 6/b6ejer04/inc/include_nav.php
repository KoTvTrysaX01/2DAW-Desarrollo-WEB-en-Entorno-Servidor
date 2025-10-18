<?php
$config['classActive'] = ' active fw-bold ';
$config['ariaActive'] = ' aria-current="page" ';
?>
<!-- Menú de navegación -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary bg-gradient shadow">
  <div class="container">
    <a class="navbar-brand fw-bold" href="#"><?php echo $config['nav_title']; ?></a>
    <button class="navbar-toggler"
      type="button"
      data-bs-toggle="collapse"
      data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link <?php if ($config['nav_active'] == "mountain") echo $config['classActive']; ?>"
            <?php if ($config['nav_active'] == "mountain") echo $config['ariaActive']; ?>
            href="index.php?page=mountain">Montañas</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if ($config['nav_active'] == "lagos") echo $config['classActive']; ?>"
            <?php if ($config['nav_active'] == "lagos") echo $config['ariaActive']; ?>
            href="index.php?page=lagos">Lagos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if ($config['nav_active'] == "rios") echo $config['classActive']; ?>"
            <?php if ($config['nav_active'] == "rios") echo $config['ariaActive']; ?>
            href="index.php?page=rios">Ríos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if ($config['nav_active'] == "mares") echo $config['classActive']; ?>"
            <?php if ($config['nav_active'] == "mares") echo $config['ariaActive']; ?>
            href="index.php?page=mares">Mares</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if ($config['nav_active'] == "valles") echo $config['classActive']; ?>"
            <?php if ($config['nav_active'] == "valles") echo $config['ariaActive']; ?>
            href="index.php?page=valles">Valles</a>
        </li>
      </ul>
    </div>
  </div>
</nav>