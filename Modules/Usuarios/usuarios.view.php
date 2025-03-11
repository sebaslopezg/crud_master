<?php 
header_admin($data); 
getModal('usuariosModal', $data);
?>
  <main id="main" class="main">

  <div class="pagetitle">
      <h1>Usuarios</h1>
    </div>

  <div class="card">
    <div class="card-body">
        <br>
        <button class="btn btn-primary" id="btnCrearUsuario">Crear Usuario</button>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Documento</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Rol</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody id="tableUsuarios">
            </tbody>

        </table>
    </div>
  </div>

  </main><!-- End #main -->
  <?php footer_admin($data); ?>