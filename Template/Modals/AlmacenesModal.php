<!-- Modal -->
<div class="modal fade" id="SetAlmacenModal" tabindex="-1">
  <div class="modal-dialog modal-md modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h1 id="almacenModalTitle" class="modal-title fs-5">Nuevo Almacen</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="frmSetAlmacen" method="POST">

            <div class="mb-3 col-12">
                <label for="txtNombre">Nombre Almacen</label>
                <input type="text" class="form-control" id="txtNombre" name="txtNombre" required>
            </div>

            <div class="mb-3 col-12">
                <label for="txtDescripcion">Descripción</label>
                <input type="text" class="form-control" id="txtDescripcion" name="txtDescripcion" required>
            </div>

            <div class="mb-3 col-12">
                <label for="selStatus">Estado</label>
                <select class="form-control" name="selStatus" id="selStatus">
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