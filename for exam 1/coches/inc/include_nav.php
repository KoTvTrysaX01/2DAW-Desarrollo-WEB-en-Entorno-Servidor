<?php
	$config['classActive']=' active ';
?>

<!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top shadow-sm">
    <div class="container">
      <a class="navbar-brand" href="#">
        <img src="img/logo-empresa.png" alt="Alquiler Vehículos Balmis">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link <?php if ($config['nav_active']=="empresa") echo $config['classActive']; ?>" 
				href="<?php echo $_SERVER['PHP_SELF']; ?>?page=empresa">EMPRESA</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php if ($config['nav_active']=="servicios") echo $config['classActive']; ?>" 
				href="<?php echo $_SERVER['PHP_SELF']; ?>?page=servicios">SERVICIOS</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php if ($config['nav_active']=="alquiler") echo $config['classActive']; ?>" 
				href="<?php echo $_SERVER['PHP_SELF']; ?>?page=alquiler">ALQUILER</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php if ($config['nav_active']=="contacto") echo $config['classActive']; ?>" 
				href="<?php echo $_SERVER['PHP_SELF']; ?>?page=contacto">CONTACTO</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php if ($config['nav_active']=="descuentos") echo $config['classActive']; ?>" 
				href="<?php echo $_SERVER['PHP_SELF']; ?>?page=descuentos">DESCUENTOS</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
