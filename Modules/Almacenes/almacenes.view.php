<?php 
header_admin($data); 
getModal("AlmacenesModal",$data);
?>
  <main id="main" class="main">

  <div class="card">
    <div class="card-body">

      <button id="btnNew" class="btn btn-primary mt-3 mb-3">Nuevo Almacen</button>

      <!-- Bordered Tabs Justified -->
      <ul class="nav nav-tabs nav-tabs-bordered d-flex" id="borderedTabJustified" role="tablist">
        <li class="nav-item flex-fill" role="presentation">
          <button
            class="nav-link w-100 active" 
            id="profile-tab" 
            data-bs-toggle="tab" 
            data-bs-target="#bordered-justified-profile" 
            type="button" 
            role="tab" 
            aria-controls="profile" 
            aria-selected="false"
            >
            Almacenes
          </button>
        </li>
        <li class="nav-item flex-fill" role="presentation">
          <button 
            class="nav-link w-100" 
            id="contact-tab" 
            data-bs-toggle="tab" 
            data-bs-target="#bordered-justified-contact" 
            type="button" 
            role="tab" 
            aria-controls="contact" 
            aria-selected="false"
            >
            Configuración Global
          </button>
        </li>
      </ul>
      <div class="tab-content pt-2" id="borderedTabJustifiedContent">
        <div 
          class="tab-pane fade show active" 
          id="bordered-justified-profile" 
          role="tabpanel" 
          aria-labelledby="profile-tab"
          >
          <div class="list-group" id="almacenesList">
          </div>
        </div>
        <div 
          class="tab-pane fade" 
          id="bordered-justified-contact" 
          role="tabpanel" 
          aria-labelledby="contact-tab"
          >
          <div class="alert alert-primary" role="alert">
            Configurar reporte resultante de la venta
          </div>
          <form method="post" class="row g-3" id="configBillReport">

          <div class="accordion" id="datosTienda">
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTienda" aria-expanded="false" aria-controls="collapseTienda">
                  Datos del almacén
                </button>
              </h2>

              <div id="collapseTienda" class="accordion-collapse collapse" data-bs-parent="#datosTienda">
                <div class="accordion-body">
                  <div class="row g-3">
                    <div class="col-md-6">
                      <label for="storeName" class="form-label">Nombre del Almacén</label>
                      <input type="text" class="form-control" id="storeName" name="storeName">
                    </div>
                    <div class="col-md-6">
                      <label for="storeNit" class="form-label">Nit del Almacén</label>
                      <input type="text" class="form-control" id="storeNit" name="storeNit">
                    </div>
                    <div class="col-md-4">
                      <label for="storeAddress" class="form-label">Dirección del Almacén</label>
                      <input type="text" class="form-control" id="storeAddress" name="storeAddress">
                    </div>
                    <div class="col-md-4">
                      <label for="storePhone" class="form-label">Numero de telefono del Almacén</label>
                      <input type="text" class="form-control" id="storePhone" name="storePhone">
                    </div>
                    <div class="col-md-4">
                      <label for="storeEmail" class="form-label">Correo electrónico del Almacén</label>
                      <input type="text" class="form-control" id="storeEmail" name="storeEmail">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="accordion" id="datosFactura">
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFactura" aria-expanded="false" aria-controls="collapseFactura">
                  Datos de la factura
                </button>
              </h2>
              <div id="collapseFactura" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  <div class="row g-3">
                    <div class="col-md-4">
                      <label for="title" class="form-label">Título</label>
                      <input type="text" class="form-control" id="title" name="title">
                    </div>
                    <div class="col-md-4">
                      <label for="secondTitle" class="form-label">Subtítulo</label>
                      <input type="text" class="form-control" id="secondTitle" name="secondTitle">
                    </div>
                    <div class="col-md-4">
                      <label for="documentType" class="form-label">Tipo de Reporte (ej Factura de venta)</label>
                      <input type="text" class="form-control" id="documentType" name="documentType">
                    </div>
                    <div class="col-12">
                      <label for="reportSuffix" class="form-label">Subfijo del reporte</label>
                      <input type="text" class="form-control" id="reportSuffix" name="reportSuffix">
                    </div>
                    <div class="col-md-6">
                      <label for="reportFooter1" class="form-label">Pie del reporte línea 1</label>
                     <input type="text" class="form-control" id="reportFooter1" name="reportFooter1">
                    </div>
                    <div class="col-md-6">
                      <label for="reportFooter2" class="form-label">Pie del reporte línea 2</label>
                      <input type="text" class="form-control" id="reportFooter2" name="reportFooter2">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="">
            <button type="submit" class="btn btn-primary">Guardar</button>
          </div>

          </form>
        </div>
      </div><!-- End Bordered Tabs Justified -->

    </div>
  </div>

  </main><!-- End #main -->
  <?php footer_admin($data); ?>