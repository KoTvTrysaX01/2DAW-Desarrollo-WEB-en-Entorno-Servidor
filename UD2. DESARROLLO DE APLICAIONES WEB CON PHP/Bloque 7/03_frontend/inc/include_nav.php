<?php
	$config['classActive']=' active fw-bold ';
	$config['ariaActive'] =' aria-current="page" ';
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
			<a 	class="nav-link <?php if ($config['nav_active']=="identifica") echo $config['classActive']; ?>" 
				<?php if ($config['nav_active']=="identifica") echo $config['ariaActive']; ?> 
				href="index.php?page=identifica">Identificación</a>
          </li>
		  <?php if ($_SESSION['usuario']!="") { ?>
          <li class="nav-item">
            <a 	class="nav-link <?php if ($config['nav_active']=="electronica") echo $config['classActive']; ?>" 
				<?php if ($config['nav_active']=="electronica") echo $config['ariaActive']; ?> 
				href="index.php?page=electronica">Electronica</a>
          </li>
		  <?php } ?>
        </ul>
      </div>
    </div>
  </nav>