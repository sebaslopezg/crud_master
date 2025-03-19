<!-- Modal -->
<div class="modal fade" id="SetProductoModal" tabindex="-1">
  <div class="modal-dialog modal-md modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5">Crear Producto</h1>
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
<!--             <div class="mb-3 col-6">
                <label for="txtColor">Color</label>
                <select class="form-control" name="txtColor" id="txtColor">
                    <option value="0">No aplica</option>
                    <option value="B">Beige</option>
                    <option value="N">Negro</option>
                    <option value="C">Colores</option>
                    <option value="E">Estampado</option>
                </select>
            </div>
            <div class="mb-3 col-6">
                <label for="txtTalla">Talla</label>
                <select class="form-control" name="txtTalla" id="txtTalla">
                    <option value="0">No aplica</option>
                    <option value="AM">A Medida</option>
                    <option value="XS">XS</option>
                    <option value="S">S</option>
                    <option value="M">M</option>
                    <option value="L">L</option>
                    <option value="XL">XL</option>
                    <option value="XXL">XXL</option>
                    <option value="3XL">3XL</option>
                    <option value="4XL">4XL</option>
                </select>
            </div> -->

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