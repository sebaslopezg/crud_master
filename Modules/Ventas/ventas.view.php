<?php 
header_admin($data);
getModal('ventasModal', $data);

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
            <button class="nav-link w-100 active" id="venta-tab" data-bs-target="#content-ventas" data-section="venta" data-bs-toggle="tab" type="button" role="tab">
            <i class="bi bi-currency-dollar"></i>
            Venta</button>
          </li>
          <li class="nav-item flex-fill" role="presentation">
            <button class="nav-link w-100" id="enar-tab" data-bs-target="#content-enar" data-section="enar" data-bs-toggle="tab" type="button" role="tab">
              <i class="bi bi-bag-fill"></i>
              Encargo/Arreglo
            </button>
          </li>
          <li class="nav-item flex-fill" role="presentation">
            <button class="nav-link w-100" id="abono-tab" data-bs-target="#content-abono" data-section="abono" data-bs-toggle="tab" type="button" role="tab">
              <i class="bi bi-cash-coin"></i>
              Abono
            </button>
          </li>
          <li class="nav-item flex-fill" role="presentation">
            <button class="nav-link w-100" id="cambio-tab" data-bs-target="#content-cambio" data-section="cambio" data-bs-toggle="tab" type="button" role="tab">
              <i class="bi bi-arrow-left-right"></i> 
              Cambio/Devolucion
            </button>
          </li>
          <li class="nav-item flex-fill" role="presentation">
            <button class="nav-link w-100" id="profile-tab" data-bs-target="#content-facturas" data-section="facturas" data-bs-toggle="tab" type="button" role="tab">
              <i class="bi bi-receipt"></i> Facturas
            </button>
          </li>
          <li class="nav-item flex-fill" role="presentation">
            <button class="nav-link w-100" id="contact-tab" data-bs-target="#content-config" data-section="config" data-bs-toggle="tab" type="button" role="tab">
              <i class="bi bi-gear-fill"></i> Configurar
            </button>
          </li>
        </ul>

        <div class="tab-content pt-2" id="borderedTabJustifiedContent">
            <div class="tab-pane fade active show" id="content-ventas" role="tabpanel">
              <!-- Contenido de VENTAS -->
              <div class="container mt-4">

                <div class="row g-3">

                    <div class="col-6">

                    <div class="row">
                      <div class="col-4">
                        <button type="button" class="btn btn-secondary mb-2" data-action="addClient">
                          <i class="bi bi-person-fill"></i>
                          Agregar Cliente
                        </button>

                      </div>


                      <div class="col">
                        <div id="displayClient"></div>                        
                      </div>

                    </div>

                      <div class="row mb-2">
                          <div class="col-sm-6">
                              <input type="text" id="codigo" placeholder="CODIGO" class="form-control" />
                          </div>
                          <div class="col-sm-6">
                              <button class="btn btn-primary" data-action="getproductByCode">Buscar</button>
                          </div>
                      </div>

                      <div class="col-11">
                          <div id="displayProducts"></div>
                      </div>
                        
                    </div>

                    <div class="col-6">

                        <div class="row mb-2">
                            <label class="col-sm-4 col-form-label"><b>Total</b></label>
                            <div class="col-sm-8">
                                <div class="input-group">
                                    <span class="input-group-text">$</span>
                                    <input type="text" id="totalBill" class="form-control" value="0" disabled="">
                                </div>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <label class="col-sm-4 col-form-label">Total Base</label>
                            <div class="col-sm-8">
                                <div class="input-group">
                                    <span class="input-group-text">$</span>
                                    <input type="text" class="form-control" value="0" disabled="">
                                </div>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <label class="col-sm-4 col-form-label">Total Impuesto</label>
                            <div class="col-sm-8">
                                <div class="input-group">
                                    <span class="input-group-text">$</span>
                                    <input type="text" class="form-control" value="0" disabled="">
                                </div>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <label class="col-sm-4 col-form-label"><b>Total A Pagar</b></label>
                            <div class="col-sm-8">
                                <div class="input-group">
                                    <span class="input-group-text">$</span>
                                    <input type="text" class="form-control" id="totalToPay" value="0" disabled="">
                                </div>
                            </div>
                        </div>

                        <hr class="bg-danger border-2 border-top border-secondary" />

                        <div class="row mb-2">
                            <label class="col-sm-4 col-form-label">Descuento</label>
                            <div class="col-sm-8">
                                <div class="input-group">
                                    <span class="input-group-text">%</span>
                                    <input type="text" class="form-control" value="0" onkeypress="return controlTag(event)">
                                </div>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <label class="col-sm-4 col-form-label">Abono</label>
                            <div class="col-sm-8">
                                <div class="input-group">
                                    <span class="input-group-text">$</span>
                                    <input id="totalAbono" type="text" class="form-control" value="" onkeypress="return controlTag(event)">
                                </div>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <label class="col-sm-4 col-form-label">Total Recibido</label>
                            <div class="col-sm-8">
                                <div class="input-group">
                                    <span class="input-group-text">$</span>
                                    <input id="totalRecibido" type="text" class="form-control" value="" onkeypress="return controlTag(event)">
                                </div>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <label class="col-sm-4 col-form-label">Metodo de pago</label>
                            <div class="col-sm-8">
                                <select class="form-control">
                                    <option value="0">----</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <label class="col-sm-4 col-form-label">Comentarios</label>
                            <div class="col-sm-8">
                                <textarea class="form-control"  rows="2"></textarea>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <button class="col-sm-12 btn btn-primary">Pagar</button>
                        </div>
                        
                    </div>
                </div>

              </div>
            </div>

            <div class="tab-pane fade" id="content-enar" role="tabpanel">
              <!-- Contenido ENAR -->
              <div class="mt-4">
                <span class="text-secondary">El módulo <b>Encargo/Arreglos</b> está en proceso de implementación...</span>
              </div>
            </div>

            <div class="tab-pane fade" id="content-abono" role="tabpanel">
              <!-- Contenido ABONOS -->
              <div class="mt-4">
                <span class="text-secondary">El módulo <b>Abono</b> está en proceso de implementación...</span>
              </div>
            </div>

            <div class="tab-pane fade" id="content-cambio" role="tabpanel">
              <!-- Contenido CAMBIOS -->
              <div class="mt-4">
                <span class="text-secondary">El módulo <b>Cambio/Devolución</b> está en proceso de implementación...</span>
              </div>
            </div>

            <div class="tab-pane fade" id="content-facturas" role="tabpanel">
              <!-- Contenido FACTURAS -->
              <div class="mt-4">
                <span class="text-secondary">El módulo <b>Facturas</b> está en proceso de implementación...</span>
              </div>
            </div>

            <div class="tab-pane fade" id="content-config" role="tabpanel">
              <!-- Contenido CONFIG -->
              <div class="alert alert-primary" role="alert">
                Configurar reporte resultante de la venta
              </div>
              <form method="post" class="row g-3" id="configBillReport">

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

                <div class="">
                  <button type="submit" class="btn btn-primary">Guardar</button>
                </div>

              </form>
            </div>
        </div>

      </div>
    </div>
  </main><!-- End #main -->
  <script> 
    const almacenData = "<?= $data['data']['id'] ?>" 
  </script>
  <?php footer_admin($data); ?>