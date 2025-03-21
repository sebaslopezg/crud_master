<?php 
header_admin($data); 
getModal('ClientesModal', $data);
?>
  <main id="main" class="main">

  <div class="pagetitle">
    <h1>Clientes</h1>
  </div>

  <div class="card">

<div class="card-body">
<div class="card-title">
  <button id="btnCrearCliente" class="btn btn-primary">Nuevo Cliente</button>

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
</div>

  </main><!-- End #main -->
  <?php footer_admin($data); ?>