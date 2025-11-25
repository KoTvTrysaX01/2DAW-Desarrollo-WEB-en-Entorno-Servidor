
  <!-- Hero Section -->
  <section class="hero-section text-center">
    <div class="container">
      <h1 class="display-4 fw-bold mb-3">ALQUILER VEHÍCULOS BALMIS</h1>
      <p class="lead mb-4">Descuentos exclusivos durante todo el año</p>
      <a href="#ofertas" class="btn btn-warning btn-lg">Ver ofertas especiales</a>
    </div>
  </section>

  <!-- Main Content -->
  <main class="container">
    <!-- Discount Icon Section -->
    <section class="text-center mb-5">
      <div class="discount-icon">
        <i class="bi bi-percent"></i>
      </div>
      <h2 class="mb-4">DESCUENTOS ESPECIALES</h2>
      <p class="lead mb-4">Aprovecha nuestras promociones temporales y ahorra en tu alquiler</p>
    </section>

    <!-- Calendar Discounts Section -->
    <section class="mb-5">
      <div class="row justify-content-center">
        <div class="col-lg-10">
          <h3 class="text-center mb-4">CALENDARIO DE DESCUENTOS ANUAL</h3>
          
          <div class="table-responsive">
            <table class="discount-table">
              <thead>
                <tr>
                  <th>Enero</th>
                  <th>Febrero</th>
                  <th>Marzo</th>
                  <th>Abril</th>
                  <th>Mayo</th>
                  <th>Junio</th>
                  <th>Julio</th>
                  <th>Agosto</th>
                  <th>Septiembre</th>
                  <th>Octubre</th>
                  <th>Noviembre</th>
                  <th>Diciembre</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td colspan="4" class="discount-10">10% DE DESCUENTO</td>
                  <td colspan="2" class="discount-5">5% DE DESCUENTO</td>
                  <td colspan="2" class="no-discount">PRECIO REGULAR</td>
                  <td colspan="2" class="discount-5">5% DE DESCUENTO</td>
                  <td class="discount-10">10% DE DESCUENTO</td>
                  <td class="no-discount">PRECIO REGULAR</td>
                </tr>
              </tbody>
            </table>
          </div>
          
          <div class="text-center mt-4">
            <p class="text-muted">* Los descuentos aplican para reservas de 3 días o más</p>
          </div>
        </div>
      </div>
    </section>

    <!-- Special Offers Section -->
    <section id="ofertas" class="mb-5">
      <h2 class="text-center mb-5">OFERTAS ESPECIALES</h2>
      
      <div class="row">
        <!-- Oferta 1 -->
        <div class="col-md-4 mb-4">
          <div class="card promo-card">
            <div class="card-header">
              <h4 class="mb-0">Fin de Semana Largo</h4>
              <span class="promo-badge">-10%</span>
            </div>
            <div class="card-body">
              <h5 class="card-title text-primary">Enero - Abril</h5>
              <p class="card-text">Aprovecha nuestro descuento de temporada baja para escapadas de fin de semana.</p>
              <ul class="feature-list">
                <li><i class="bi bi-check-circle-fill text-success me-2"></i> Válido de jueves a domingo</li>
                <li><i class="bi bi-check-circle-fill text-success me-2"></i> Mínimo 3 días de alquiler</li>
                <li><i class="bi bi-check-circle-fill text-success me-2"></i> Todos los vehículos incluidos</li>
              </ul>
            </div>
            <div class="card-footer bg-transparent text-center">
              <button class="btn btn-primary">Reservar ahora</button>
            </div>
          </div>
        </div>
        
        <!-- Oferta 2 -->
        <div class="col-md-4 mb-4">
          <div class="card promo-card">
            <div class="card-header">
              <h4 class="mb-0">Primavera Verde</h4>
              <span class="promo-badge">-5%</span>
            </div>
            <div class="card-body">
              <h5 class="card-title text-primary">Mayo - Junio</h5>
              <p class="card-text">Disfruta de la primavera con nuestros vehículos ecológicos con descuento especial.</p>
              <ul class="feature-list">
                <li><i class="bi bi-check-circle-fill text-success me-2"></i> Vehículos de bajas emisiones</li>
                <li><i class="bi bi-check-circle-fill text-success me-2"></i> Combustible incluido (primer tanque)</li>
                <li><i class="bi bi-check-circle-fill text-success me-2"></i> Seguro básico incluido</li>
              </ul>
            </div>
            <div class="card-footer bg-transparent text-center">
              <button class="btn btn-primary">Reservar ahora</button>
            </div>
          </div>
        </div>
        
        <!-- Oferta 3 -->
        <div class="col-md-4 mb-4">
          <div class="card promo-card">
            <div class="card-header">
              <h4 class="mb-0">Otoño Dorado</h4>
              <span class="promo-badge">-10%</span>
            </div>
            <div class="card-body">
              <h5 class="card-title text-primary">Septiembre - Noviembre</h5>
              <p class="card-text">Vuelta al trabajo con energías renovadas y nuestro mejor descuento de otoño.</p>
              <ul class="feature-list">
                <li><i class="bi bi-check-circle-fill text-success me-2"></i> Válido para alquileres mensuales</li>
                <li><i class="bi bi-check-circle-fill text-success me-2"></i> Entrega a domicilio gratuita</li>
                <li><i class="bi bi-check-circle-fill text-success me-2"></i> Cambio de vehículo sin coste</li>
              </ul>
            </div>
            <div class="card-footer bg-transparent text-center">
              <button class="btn btn-primary">Reservar ahora</button>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Call to Action Section -->
    <section class="cta-section text-center">
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <h3 class="mb-3">¿Listo para ahorrar en tu próximo alquiler?</h3>
          <p class="mb-4">Contacta con nuestro equipo para obtener información personalizada sobre nuestras mejores ofertas.</p>
          <a href="<?php echo $_SERVER['PHP_SELF']; ?>?page=contacto" class="btn btn-light btn-lg me-3">Contactar ahora</a>
          <a href="<?php echo $_SERVER['PHP_SELF']; ?>?page=alquiler" class="btn btn-outline-light btn-lg">Ver vehículos</a>
        </div>
      </div>
    </section>

    <!-- Terms Section -->
    <section class="mt-5">
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class="alert alert-info">
            <h5><i class="bi bi-info-circle-fill me-2"></i>Términos y Condiciones</h5>
            <ul class="mb-0">
              <li>Los descuentos no son acumulables con otras promociones</li>
              <li>Se requiere reserva anticipada de al menos 48 horas</li>
              <li>Precios sujetos a disponibilidad de vehículos</li>
              <li>Descuentos aplicables solo en temporadas específicas</li>
            </ul>
          </div>
        </div>
      </div>
    </section>
  </main>
