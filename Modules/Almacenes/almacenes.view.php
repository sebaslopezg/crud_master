<?php 
header_admin($data); 
getModal("AlmacenesModal",$data);
?>
  <main id="main" class="main">

  <div class="card">
    <div class="card-body">

      <button id="btnNew" class="btn btn-primary mt-3 mb-3">Nuevo Almacen</button>

        <div class="list-group" id="almacenesList">

        </div>

    </div>
  </div>

  </main><!-- End #main -->
  <?php footer_admin($data); ?>