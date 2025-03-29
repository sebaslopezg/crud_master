<?php 
header_admin($data); 

?>
  <main id="main" class="main">

  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?= base_url() ?>">Principal</a></li>
      <li class="breadcrumb-item"><a href="<?= base_url() ?>/almacenes">Almacenes</a></li>
      <li class="breadcrumb-item active"><?= $data['data']['nombre'] ?></li>
    </ol>
  </nav>

  <div class="card">
      <div class="card-body">

        <!-- Bordered Tabs Justified -->
        <ul class="nav nav-tabs nav-tabs-bordered d-flex" id="borderedTabJustified" role="tablist">
          <li class="nav-item flex-fill" role="presentation">
            <button class="nav-link w-100 active" id="venta-tab" data-section="venta" data-bs-toggle="tab" type="button" role="tab"><i class="bi bi-currency-dollar"></i>Venta</button>
          </li>
          <li class="nav-item flex-fill" role="presentation">
            <button class="nav-link w-100" id="enar-tab" data-section="enar" data-bs-toggle="tab" type="button" role="tab">
              <i class="bi bi-bag-fill"></i>
              Encargo/Arreglo
            </button>
          </li>
          <li class="nav-item flex-fill" role="presentation">
            <button class="nav-link w-100" id="abono-tab" data-section="abono" data-bs-toggle="tab" type="button" role="tab">
              <i class="bi bi-cash-coin"></i>
              Abono
            </button>
          </li>
          <li class="nav-item flex-fill" role="presentation">
            <button class="nav-link w-100" id="cambio-tab" data-section="cambio" data-bs-toggle="tab" type="button" role="tab">
              <i class="bi bi-arrow-left-right"></i> 
              Cambio/Devolucion
            </button>
          </li>
          <li class="nav-item flex-fill" role="presentation">
            <button class="nav-link w-100" id="profile-tab" data-section="facturas" data-bs-toggle="tab" type="button" role="tab">
              <i class="bi bi-receipt"></i> Facturas
            </button>
          </li>
          <li class="nav-item flex-fill" role="presentation">
            <button class="nav-link w-100" id="contact-tab" data-section="config" data-bs-toggle="tab" type="button" role="tab">
              <i class="bi bi-gear-fill"></i> Configurar
            </button>
          </li>
        </ul>


      </div>
    </div>

  </main><!-- End #main -->
  <?php footer_admin($data); ?>