<?php header_landing(); ?>
<!--   <main id="main" class="main">
    
  </main> -->
<!--START PARALLAX SECTION-->
<div class='parallax-wrapper'>

  <!--INTRO SECTION-->
<div class='parallax-section intro-screen' id='intro'>
  <section class='hidden'>
    <h1 class='big-title animated-text'>CRUD Master</h1>   
    <div class="container text-center d-grid gap-3">
      <div class="row mx-auto">
  <div class="col-md"><h1 class="animated-icon"><i class="bi bi-shop"></i></h1></div>
  <div class="col-md"><h1 class="animated-icon"><i class="bi bi-person-circle"></i></h1></div>
  <div class="col-md"><h1 class="animated-icon"><i class="bi bi-box2-heart"></i></h1></div>
  <div class="col-md"><h1 class="animated-icon"><i class="bi bi-receipt"></i></h1></div>
  <div class="col-md"><h1 class="animated-icon"><i class="bi bi-tags"></i></h1></div>
  <div class="col-md"><h1 class="animated-icon"><i class="bi bi-pencil"></i></h1></div>
</div>
    </div>
  </section>
</div>

<!--NAVBAR-->
<nav class="navbar nav-bg border-bottom border-body navbar-expand-lg sticky-top" data-bs-theme="dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">CRUD Master</a>
    
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav ms-auto">
        <a class="nav-link" href="<?= base_url() ?>/dashboard">Acceder</a>
        <a class="nav-link" href="#stores">Tiendas</a>
        <a class="nav-link" href="#users">Usuarios</a>
        <a class="nav-link" href="#sales">Ventas</a>
      </div>
    </div>
  </div>
</nav>
<!--END NAVBAR-->

<!--SECOND SECTION-->
<div class='parallax-group group-1' id="group-1">
  <div class='parallax-layer mid-layer'>
        <div class="container text-center d-grid gap-3">
          <div class="row mx-auto">
            <div class="col-md card-animate">
            <div class="card card-bg text-center mb-3 mx-auto">
            <div class="card-body text-center">
              <h1><i class="bi bi-shop"></i></h1>
              <h1>Gestión de tiendas</h1>
            </div>
          </div>
        </div>
        <div class="col-md card-animate">
          <div class="card card-bg text-center mb-3 mx-auto">
            <div class="card-body text-center">
              <h1><i class="bi bi-person-circle"></i></h1>
              <h1>Manejo de usuarios</h1>
            </div>
          </div>
        </div>
        <div class="col-md card-animate">
          <div class="card card-bg text-center mb-3 mx-auto">
            <div class="card-body text-center mx-auto">
              <h1><i class="bi bi-box2-heart"></i></h1>
              <h1>Productos e inventario</h1>
            </div>
          </div>
        </div>
      </div>
      <div class="row mx-auto">
        <div class="col-md card-animate">
          <div class="card card-bg text-center mb-3 mx-auto">
            <div class="card-body text-center">
              <h1><i class="bi bi-receipt"></i></h1>
              <h1>Facturación y ventas</h1>
            </div>
          </div>
        </div>
        <div class="col-md card-animate">
          <div class="card card-bg text-center mb-3 mx-auto">
            <div class="card-body text-center">
              <h1><i class="bi bi-tags"></i></h1>
              <h1>Sistema de roles</h1>
            </div>
          </div>
        </div>
          <div class="col-md card-animate">
            <div class="card card-bg text-center mb-3 mx-auto">
              <div class="card-body text-center">
                <h1><i class="bi bi-pencil"></i></h1>
                <h1>Personalización y adaptabilidad</h1>
              </div>
            </div>
          </div>
        </div>
      </div>
    
    </section>
    </section>
  </div>
</div>
<!--END SECOND SECTION-->

<!--THIRD SECTION-->
<div class='parallax-group-small group-2' id="stores">
  <div class='parallax-layer base-layer'>
    <section>
      <div class="container">
        <div class="d-flex align-items-center animate-slide-left">
          <div class='card-parent'>
            <div class='card-child bg-shop'></div>
          </div>  
            <div class='div-width'>
              <div class="d-flex align-items-center">
                <div class="icon-circle me-3">
                  <i class="bi bi-shop circle-icon"></i>
                </div>
                <h1 class='title-color'>Gestión de tiendas</h1>
              </div>
            <h3>
              Puedes gestionar todas tus tiendas de manera fácil y eficiente desde un solo lugar
            </h3>
          </div>
        </div>
      </div>
    </section>
  </div>
</div>
<!--END THIRD SECTION-->

<!--FORTH SECTION-->
<div class='parallax-group-small group-2' id="users">
  <div class='parallax-layer base-layer'>
    <section>
      <div class="container">
        <div class="d-flex align-items-center animate-slide-right">
            <div class='div-width'>
              <div class="d-flex align-items-center">
                <div class="icon-circle me-3">
                  <i class="bi bi-person-circle"></i>
                </div>
                <h1 class='title-color'>Manejo de usuarios</h1>
              </div>
            <h3>
              Ofrecemos un manejo de ususarios seguro y confiable, integrado con diferentes roles y permisos para más flexibilidad
            </h3>
          </div>
          <div class='card-parent'>
            <div class='card-child bg-users'></div>
          </div>
        </div>
      </div>
    </section>
  </div>
</div>
<!--END FORTH SECTION-->

<!--FIFTH SECTION-->
<div class='parallax-group-small group-2' id="sales">
  <div class='parallax-layer base-layer'>
    <section>
      <div class="container">
        <div class="d-flex align-items-center animate-slide-left">
          <div class='card-parent'>
            <div class='card-child bg-sales'></div>
          </div>  
            <div class='div-width'>
              <div class="d-flex align-items-center">
                <div class="icon-circle me-3">
                  <i class="bi bi-receipt"></i>
                </div>
                <h1 class='title-color'>Facturación y ventas</h1>
              </div>
            <h3>Soporta facturación POS standard, el contenido de la factura es totalmente editable adaptandose así a cualquier negocio</h3>
          </div>
        </div>
      </div>
    </section>
  </div>
</div>
<!--END FIFTH SECTION-->

<!--OUTRO SECTION-->
<div class='parallax-section outro-screen' id='outro'>
  <section class='hidden'>
    <h1>And then, something else</h1>
  </section>
</div>
<!--END OUTRO SECTION-->

<!--END INTRO SECTION-->
</div>
<!--END PARALLAX SECTION->

  <?php footer_landing(); ?>