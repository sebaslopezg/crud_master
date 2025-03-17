<?php 
header_admin($data); 
getModal('registrosModal', $data);
?>
  <main id="main" class="main">
  
  <button type="button" class="btn btn-primary" id="btnCrearRegistro" data-modal="#crearRegistroModal">Crear</button>

  <table class="table">
    <thead>
      <tr>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Accion</th>
      </tr>
    </thead>
    <tbody id="myTable">
    </tbody>
  </table>

  <?php dep($_SESSION) ?>

  </main><!-- End #main -->
  <?php footer_admin($data); ?>
