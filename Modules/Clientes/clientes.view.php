<?php 
header_admin($data); 
getModal('ClientesModal', $data);
?>
  <main id="main" class="main">

  <div class="card">

<div class="card-body">

  <button id="btnCrearCliente" class="btn btn-primary mt-4">Nuevo Cliente</button>

  <table class="table table-hover">
    <thead>
      <tr>
        <th>Documento</th>
        <th>Nombre</th>
        <th>Accion</th>
      </tr>
    </thead>
    <tbody id="tablaClientes">
    </tbody>
  </table>
</div>

  </main><!-- End #main -->
  <?php footer_admin($data); ?>