<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#">
            <i class="fas fa-globe-americas me-2"></i>ExploraMundo
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link <?php if($config['navActive'] == "inicio"){echo "active";} ?>" href="index.php?page=inicio">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if($config['navActive'] == "destinos"){echo "active";} ?>" href="index.php?page=destinos">Destinos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if($config['navActive'] == "servicios"){echo "active";} ?>" href="index.php?page=servicios">Servicios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if($config['navActive'] == "contacto"){echo "active";} ?>" href="index.php?page=contacto">Contacto</a>
                </li>
            </ul>
        </div>
    </div>
</nav>