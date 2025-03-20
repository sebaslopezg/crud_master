<?php 
header_admin($data); 
getModal('productosModal', $data);
?>
  <main id="main" class="main">
  
  <div class="pagetitle">
      <h1>Productos</h1>
    </div>

    <div class="card">

      <div class="card-body">
      <div class="card-title">
        <button id="btnCrearProducto" class="btn btn-primary">Nuevo Producto</button>

        <table class="table table-hover">
          <thead>
            <tr>
              <th>Codigo</th>
              <th>Nombre</th>
              <th>Precio</th>
              <th>Accion</th>
            </tr>
          </thead>
          <tbody id="tablaProductos">
          </tbody>
        </table>
      </div>
  </div>


  </main><!-- End #main -->
<?php footer_admin($data); ?>