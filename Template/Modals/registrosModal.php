<!-- Modal -->
<div class="modal fade" id="crearRegistroModal" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 id="titleModal" class="modal-title fs-5">Crear</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="frmCrearRetistro" method="POST">
            <input type="hidden" name="idUsuario" id="idUsuario" value="0">


            <div class="row">
                <div class="mb-3 col-6">
                    <label for="txtNombre" class="form-label">Nombre(s)</label>
                    <input type="text" class="form-control" id="txtNombre" name="txtNombre">
                </div>
                <div class="mb-3 col-6">
                    <label for="txtApellido" class="form-label">Apellidos</label>
                    <input type="text" class="form-control" id="txtApellido" name="txtApellido">
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