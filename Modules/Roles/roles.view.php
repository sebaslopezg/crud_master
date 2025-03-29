<?php 
header_admin($data); 
getModal('rolesModal', $data);
?>
  <main id="main" class="main">

  <div class="card">
    <div class="card-body">
        <br>
        <button class="btn btn-primary" id="btnCrearRol">Crear Rol</button>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nombre Rol</th>
                    <th>Descripción</th>
                    <th>Estado</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody id="tableRoles">
            </tbody>

        </table>
    </div>
  </div>

  </main><!-- End #main -->
  <?php footer_admin($data); ?>