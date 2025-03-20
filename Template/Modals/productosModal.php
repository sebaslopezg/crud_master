<!-- Modal -->
<div class="modal fade" id="SetProductoModal" tabindex="-1">
  <div class="modal-dialog modal-md modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h1 id="productModalTitle" class="modal-title fs-5">Crear Producto</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="frmSetProducto" method="POST">

            <div class="mb-3 col-12">
                <label for="txtCodigo">Codigo</label>
                <input type="text" class="form-control" id="txtCodigo" name="txtCodigo" required>
            </div>
            <div class="mb-3 col-12">
                <label for="txtNombreProducto">Nombre del producto</label>
                <input type="text" class="form-control" id="txtNombreProducto" name="txtNombreProducto" required>
            </div>

            <div class="mb-3 col-12">
              <label for="txtPrecio">Precio</label>
              <input type="number" class="form-control" id="txtPrecio" name="txtPrecio" required>
            </div>
            <div class="mb-3 col-12">
                <label for="txtDescripcion">Descripción</label>
                <textarea class="form-control" name="txtDescripcion" id="txtDescripcion"></textarea>
            </div>
            <div class="mb-3 col-12">
                <label for="txtStatus">Estado</label>
                <select class="form-control" name="txtStatus" id="txtStatus">
                    <option value="1">Activo</option>
                    <option value="2">Inactivo</option>
                </select>
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