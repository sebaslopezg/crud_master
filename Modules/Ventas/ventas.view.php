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
                        <label class="col-sm-4 col-form-label">Descuento</label>
                        <div class="col-sm-8">
                            <div class="input-group">
                              <span class="input-group-text">%</span>
                              <input type="text" id="descuento" class="form-control" value="0" onkeypress="return controlTag(event)">
                            </div>
                        </div>
                      </div>

                      <div class="row mb-2">
                        <label class="col-sm-4 col-form-label">Metodo de pago</label>
                        <div class="col-sm-8">
                          <select id="metodoPago" class="form-control">
                            <option value="0">----</option>
                            <option value="efectivo">Efectivo</option>
                            <option value="Transferencia">Transferencia</option>
                            <option value="Tarjeta Credito">Tarjeta Credito</option>
                            <option value="Tarjeta Debito">Tarjeta Debito</option>
                          </select>
                        </div>
                      </div>

                      <div class="row mb-2">
                        <label class="col-sm-4 col-form-label">Comentarios</label>
                        <div class="col-sm-8">
                          <textarea id="comentarios" class="form-control"  rows="2"></textarea>
                        </div>
                      </div>
                      
                      <hr class="bg-danger border-2 border-top border-secondary" />

                      <div class="row mb-2">
                        <label class="col-sm-4 col-form-label"><b>Total A Pagar</b></label>
                        <div class="col-sm-8">
                          <div class="input-group">
                            <span class="input-group-text">$</span>
                            <input type="text" class="form-control" id="totalToPay" value="0" disabled="">
                          </div>
                        </div>
                      </div>

                      <div class="accordion accordion-flush" id="accordionFlushExample">
                        <div class="accordion-item">
                          <h2 class="accordion-header" id="flush-headingOne">
                            <button 
                              class="accordion-button collapsed" 
                              type="button" data-bs-toggle="collapse" 
                              data-bs-target="#flush-collapseOne" 
                              aria-expanded="false" 
                              aria-controls="flush-collapseOne"
                              >
                              Detalles del total
                            </button>
                          </h2>
                          <div 
                            id="flush-collapseOne" 
                            class="accordion-collapse collapse" 
                            aria-labelledby="flush-headingOne" 
                            data-bs-parent="#accordionFlushExample" 
                            style=""
                            >
                            <div class="accordion-body">

                            <div class="row mb-2">
                              <label class="col-sm-4 col-form-label"><b>Sub total</b></label>
                              <div class="col-sm-8">
                                <div class="input-group">
                                  <span class="input-group-text">$</span>
                                  <input type="text" id="subTotal" class="form-control" value="0" disabled="">
                                </div>
                              </div>
                            </div>
                            <div class="row mb-2">
                              <label class="col-sm-4 col-form-label">Valor descontado</label>
                              <div class="col-sm-8">
                                  <div class="input-group">
                                    <span class="input-group-text">$</span>
                                    <input type="text" id="totalDescuento" class="form-control" value="0" disabled="">
                                  </div>
                              </div>
                            </div>
                            <div class="row mb-2">
                              <label class="col-sm-4 col-form-label">Total Impuesto</label>
                              <div class="col-sm-8">
                                <div class="input-group">
                                  <span class="input-group-text">$</span>
                                  <input type="text" id="totalImpuesto" class="form-control" value="0" disabled="">
                                </div>
                              </div>
                            </div>

                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row mb-2">
                        <form id="setBillForm" action="post">
                          <button id="btnSetPayment" class="col-sm-12 btn btn-primary">Pagar</button>
                        </form>
                      </div>
                    </div>
                </div>
              </div>
            </div>

            <div class="tab-pane fade" id="content-enar" role="tabpanel">
              <!-- Contenido ENAR -->
              <div class="mt-4">















              <!-- Contenido de VENTAS -->
              <div class="container mt-4">
                <div class="row g-3">
                    <div class="col-6">
                    <div class="row">
                      <div class="col-4">
                        <button type="button" class="btn btn-secondary mb-2" data-action="addClient_enar">
                          <i class="bi bi-person-fill"></i>
                          Agregar Cliente
                        </button>
                      </div>
                      <div class="col">
                        <div id="displayClient_enar"></div>                        
                      </div>
                    </div>
                      <div class="row mb-2">
                        <div class="col-sm-6">
                          <input type="text" id="codigo_enar" placeholder="CODIGO" class="form-control" />
                        </div>
                        <div class="col-sm-6">
                          <button class="btn btn-primary" data-action="getproductByCode_enar">Buscar</button>
                        </div>
                      </div>
                      <div class="col-11">
                        <div id="displayProducts_enar"></div>
                      </div>
                    </div>
                    <div class="col-6">

                      <div class="row mb-2">
                        <label class="col-sm-4 col-form-label">Abono</label>
                        <div class="col-sm-8">
                            <div class="input-group">
                              <span class="input-group-text">$</span>
                              <input id="totalAbono_enar" type="text" class="form-control" value="" onkeypress="return controlTag(event)">
                            </div>
                        </div>
                      </div>
                      <div class="row mb-2">
                        <label class="col-sm-4 col-form-label">Total Recibido</label>
                        <div class="col-sm-8">
                          <div class="input-group">
                            <span class="input-group-text">$</span>
                            <input id="totalRecibido_enar" type="text" class="form-control" value="" onkeypress="return controlTag(event)">
                          </div>
                        </div>
                      </div>
                      <div class="row mb-2">
                        <label class="col-sm-4 col-form-label">Descuento</label>
                        <div class="col-sm-8">
                            <div class="input-group">
                              <span class="input-group-text">%</span>
                              <input type="text" id="descuento_enar" class="form-control" value="0" onkeypress="return controlTag(event)">
                            </div>
                        </div>
                      </div>

                      <div class="row mb-2">
                        <label class="col-sm-4 col-form-label">Metodo de pago</label>
                        <div class="col-sm-8">
                          <select id="metodoPago_enar" class="form-control">
                            <option value="0">----</option>
                            <option value="efectivo">Efectivo</option>
                            <option value="Transferencia">Transferencia</option>
                            <option value="Tarjeta Credito">Tarjeta Credito</option>
                            <option value="Tarjeta Debito">Tarjeta Debito</option>
                          </select>
                        </div>
                      </div>

                      <div class="row mb-2">
                        <label class="col-sm-4 col-form-label">Comentarios</label>
                        <div class="col-sm-8">
                          <textarea id="comentarios_enar" class="form-control"  rows="2"></textarea>
                        </div>
                      </div>
                      
                      <hr class="bg-danger border-2 border-top border-secondary" />

                      <div class="row mb-2">
                        <label class="col-sm-4 col-form-label"><b>Total A Pagar</b></label>
                        <div class="col-sm-8">
                          <div class="input-group">
                            <span class="input-group-text">$</span>
                            <input type="text" class="form-control" id="totalToPay_enar" value="0" disabled="">
                          </div>
                        </div>
                      </div>

                      <div class="accordion accordion-flush" id="accordionFlushExample_enar">
                        <div class="accordion-item">
                          <h2 class="accordion-header" id="flush-headingOne_enar">
                            <button 
                              class="accordion-button collapsed" 
                              type="button" data-bs-toggle="collapse" 
                              data-bs-target="#detallesTotal_enar" 
                              aria-expanded="false" 
                              aria-controls="flush-collapseOne_enar"
                              >
                              Detalles del total
                            </button>
                          </h2>
                          <div 
                            id="flush-collapseOne_enar" 
                            class="accordion-collapse collapse" 
                            aria-labelledby="flush-headingOne" 
                            data-bs-parent="#detallesTotal_enar" 
                            style=""
                            >
                            <div class="accordion-body">

                            <div class="row mb-2">
                              <label class="col-sm-4 col-form-label"><b>Sub total</b></label>
                              <div class="col-sm-8">
                                <div class="input-group">
                                  <span class="input-group-text">$</span>
                                  <input type="text" id="subTotal_enar" class="form-control" value="0" disabled="">
                                </div>
                              </div>
                            </div>
                            <div class="row mb-2">
                              <label class="col-sm-4 col-form-label">Valor descontado</label>
                              <div class="col-sm-8">
                                  <div class="input-group">
                                    <span class="input-group-text">$</span>
                                    <input type="text" id="totalDescuento_enar" class="form-control" value="0" disabled="">
                                  </div>
                              </div>
                            </div>
                            <div class="row mb-2">
                              <label class="col-sm-4 col-form-label">Total Impuesto</label>
                              <div class="col-sm-8">
                                <div class="input-group">
                                  <span class="input-group-text">$</span>
                                  <input type="text" id="totalImpuesto_enar" class="form-control" value="0" disabled="">
                                </div>
                              </div>
                            </div>

                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row mb-2">
                        <form id="setBillForm_enar" action="post">
                          <button id="btnSetPayment_enar" class="col-sm-12 btn btn-primary">Pagar</button>
                        </form>
                      </div>
                    </div>
                </div>
              </div>












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

                <table class="table table-hover" width="100%" cellspacing="0" id="myTable">
                    <thead>
                        <tr>
                        <th>Tipo</th>
                        <th>Vendedor(a)</th>
                        <th>Cliente</th>
                        <th>Documento del cliente</th>
                        <th>Total</th>
                        <th>Comentario</th>
                        <th>Detalle</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>

              </div>
            </div>

            <div class="tab-pane fade" id="content-config" role="tabpanel">
              <!-- Contenido CONFIG -->
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

          <div class="accordion accordion-danger mt-4" id="zonaPeligro">
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsePeligro" aria-expanded="false" aria-controls="collapsePeligro">
                  Zona de peligro
                </button>
              </h2>
              <div id="collapsePeligro" class="accordion-collapse collapse" data-bs-parent="#zonaPeligro">
                <div class="accordion-body">
                  <div class="">
                    <button data-action='deleteStore' class="btn btn-danger">Eliminar almacén</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
            </div>
        </div>

      </div>
    </div>
  </main><!-- End #main -->
  <script> 
    const almacenData = "<?= $data['data']['id'] ?>" 
  </script>
  <?php footer_admin($data); ?>