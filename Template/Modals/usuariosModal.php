<!-- Modal -->
<div class="modal fade" id="crearUsuarioModal" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 id="titleModal" class="modal-title fs-5">Crear</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="frmCrearUsuario" method="POST">
          <div class="row">
            <div class="mb-3 col-6">
              <label for="txtDocumento" class="form-label">Documento</label>
              <input type="text" class="form-control" id="txtDocumento" name="txtDocumento">
            </div>
            <div class="mb-3 col-6">
              <label for="tipoDocumento" class="form-label">Tipo de documento</label>
              <select class="form-control" name="tipoDocumento" id="tipoDocumento">
                <option value="Cedula">Cedula</option>
                <option value="Tarjeta de identidad">Tarjeta de identidad</option>
                <option value="Pasaporte">Pasaporte</option>
              </select>
            </div>
          </div>
          <div class="row">
              <div class="mb-3 col-6">
                  <label for="txtNombre" class="form-label">Nombre</label>
                  <input type="text" class="form-control" id="txtNombre" name="txtNombre">
              </div>
              <div class="mb-3 col-6">
                  <label for="txtApellido" class="form-label">Apellidos</label>
                  <input type="text" class="form-control" id="txtApellido" name="txtApellido">
              </div>
          </div>

          <div class="row">
            <div class="mb-3 col-6">
              <label for="txtEmail" class="form-label">Correo Electronico</label>
              <input type="text" class="form-control" id="txtEmail" name="txtEmail">
            </div>
            <div class="mb-3 col-6">
              <label for="txtPass" class="form-label">Contraseña</label>
              <input type="password" class="form-control" id="txtPass" name="txtPass" autocomplete="on">
            </div>
          </div>
          <div class="row">
            <div class="mb-3 col-6">
              <label for="tipoRol" class="form-label">Rol de usuario</label>
              <select class="form-control" name="tipoRol" id="tipoRol">
              </select>
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button id="btnEnviar" type="submit" class="btn btn-primary">Crear</button>
        </form>
      </div>
    </div>
  </div>
</div>