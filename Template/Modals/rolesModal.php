<!-- Modal -->
<div class="modal fade" id="crearRolModal" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 id="titleModal" class="modal-title fs-5">Crear</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="frmCrearRol" method="POST">

            <div class="row">
                <div class="mb-3 col-12">
                    <label for="txtNombre" class="form-label">Nombre del Rol</label>
                    <input type="text" class="form-control" id="txtNombre" name="txtNombre">
                </div>
            </div>
            <div class="row">
                <div class="mb-3 col-12">
                    <label for="txtDescripcion" class="form-label">Descripción</label>
                    <input type="text" class="form-control" id="txtDescripcion" name="txtDescripcion">
                </div>
            </div>

            <div class="row">
                <div class="mb-3 col-12">
                    <label for="txtDselStatusescripcion" class="form-label">Estado</label>
                    <select class="form-control" name="selStatus" id="selStatus">
                      <option value="1">Activo</option>
                      <option value="2">Inactivo</option>
                    </select>
                </div>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button id="btnCrear" type="submit" class="btn btn-primary">Crear</button>
        </form>
      </div>
    </div>
  </div>
</div>