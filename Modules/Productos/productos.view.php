<?php header_admin($data); ?>
  <main id="main" class="main">
  
  <div class="pagetitle">
      <h1>Productos</h1>
    </div>

    <div class="card">

      <div class="card-body">
      <div class="card-title">
        <button class="btn btn-primary">Nuevo Producto</button>

        <table class="table table-hover" id="tableProductos">
          <thead>
            <tr>
              <th>Codigo</th>
              <th>Nombre</th>
              <th>Color</th>
              <th>Talla</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>123</td>
              <td>Franja</td>
              <td>Axul</td>
              <td>XL</td>
            </tr>
            <tr>
              <td>123</td>
              <td>Franja</td>
              <td>Axul</td>
              <td>XL</td>
            </tr>
            <tr>
              <td>123</td>
              <td>Franja</td>
              <td>Axul</td>
              <td>XL</td>
            </tr>
          </tbody>
        </table>
      </div>
  </div>


  </main><!-- End #main -->
<?php footer_admin($data); ?>