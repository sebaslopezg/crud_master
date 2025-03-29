<?php 
header_admin($data); 
getModal('productosModal', $data);
?>
  <main id="main" class="main">

    <div class="card">

      <div class="card-body">

        <button id="btnCrearProducto" class="btn btn-primary mt-3">Nuevo Producto</button>
        
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


  </main><!-- End #main -->
<?php footer_admin($data); ?>