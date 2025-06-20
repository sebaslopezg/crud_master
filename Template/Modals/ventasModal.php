<!-- Modal Productos -->
<div class="modal fade" id="productosModal" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 id="productosModalTitle" class="modal-title fs-5">Productos</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">

                <table class="table table-hover" width="100%" cellspacing="0" id="productTable">
                    <thead>
                        <tr>
                        <th>Codigo</th>
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th>Agregar</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Clientes -->
<div class="modal fade" id="clientesModal" tabindex="-1">
    <div class="modal-dialog modal-md modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 id="clientesModalTitle" class="modal-title fs-5">Buscar Cliente</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <div class="row">
                    <div class="col-8">
                        <input type="text" id="cedulaClienteModal" class="form-control" placeholder="CEDULA">
                    </div>
                    <div class="col-4">
                        <button class="btn btn-primary" data-action="searchClient">Buscar</button>
                    </div>
                </div>
                <div class="row">
                    <div id="displayClientModal">

                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button class="btn btn-primary" data-action="addClientModal">
                    <i class="bi bi-plus-circle"></i>
                     Agregar</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>



<!-- CLIENTES Modal -->
<div class="modal fade" id="SetClientesModal" tabindex="-1">
  <div class="modal-dialog modal-md modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h1 id="clienteModalTitle" class="modal-title fs-5">Nuevo Cliente</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="frmSetCliente" method="POST">

            <div class="mb-3 col-12">
                <label for="txtDocumento">Documento de identificación</label>
                <input type="text" class="form-control" id="txtDocumento" name="txtDocumento" required>
            </div>

            <div class="mb-3 col-12">
                <label for="txtNombre">Nombre Completo</label>
                <input type="text" class="form-control" id="txtNombre" name="txtNombre" required>
            </div>

            <div class="mb-3 col-12">
                <label for="txtDireccion">Dirección</label>
                <input type="text" class="form-control" id="txtDireccion" name="txtDireccion" required>
            </div>

            <div class="mb-3 col-12">
                <label for="txtemail">Correo Electronico</label>
                <input type="text" class="form-control" id="txtemail" name="txtemail" required>
            </div>

            <div class="mb-3 col-12">
                <label for="txtTelefono">Telefono</label>
                <input type="text" class="form-control" id="txtTelefono" name="txtTelefono" required>
            </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- MODAL FACTURAS DETALLE -->
<div class="modal fade" id="facturasModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 id="productosModalTitle" class="modal-title fs-5">Detalle</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="displayBillDetails"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>