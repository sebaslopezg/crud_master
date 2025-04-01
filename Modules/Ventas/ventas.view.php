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
              <div class="mt-4">
                <span class="text-secondary">El módulo <b>Configuracion</b> está en proceso de implementación...</span>
              </div>
            </div>
        </div>

      </div>
    </div>

  </main><!-- End #main -->
  <?php footer_admin($data); ?>