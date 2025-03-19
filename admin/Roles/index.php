<?php
require_once '../../app/config.php';
require_once '../Main/Head.php';
require_once '../../app/controllers/roles/listado_roles.php';
?>
<!-- Main header starts -->
<div class="main-header d-flex align-items-center justify-content-between position-relative">
  <div class="d-flex align-items-center justify-content-center">
    <div class="page-icon">
      <i class="bi bi-layout-sidebar"></i>
    </div>
    <div class="page-title d-none d-md-block">
      <h5>Gestion de Roles</h5>
    </div>
  </div>
  <!-- Live updates start -->
  <ul class="updates d-flex align-items-end flex-column overflow-hidden" id="updates">
    <li>
      <a href="javascript:void(0)">
        <i class="bi bi-envelope-paper text-red font-1x me-2"></i>
        <span>12 emails from David Michaiah.</span>
      </a>
    </li>
    <li>
      <a href="javascript:void(0)">
        <i class="bi bi-bar-chart text-blue font-1x me-2"></i>
        <span>15 new features updated successfully.</span>
      </a>
    </li>
    <li>
      <a href="javascript:void(0)">
        <i class="bi bi-folder-check text-yellow font-1x me-2"></i>
        <span>The media folder is created successfully.</span>
      </a>
    </li>
  </ul>
  <!-- Live updates end -->

</div>
<!-- Main header ends -->
<!-- Content wrapper start -->
<div class="content-wrapper">

  <!-- Row start -->
  <div class="row gx-3">
    <div class="col-xl-12">
      <div class="card">
        <div class="card-header card-header-button">
          <div class="card-title">Roles:</div>
          <div class="card-header">
            <div class="card-title">
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#agregarRole">
                + Role
              </button>
              <!--Modal-->
              <div class="modal fade" id="agregarRole" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">
                        Nuevo Role
                      </h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form action="<?php echo APP_URL; ?>app/controllers/roles/crear_role.php" id="role_form" method="post" autocomplete="off" class="row g-3 needs-validation" novalidate>
                        <div class="col-md-12">
                          <label for="nombre_rol" class="form-label">Nombre</label>
                          <input type="text" class="form-control" id="nombre_rol" name="nombre_rol" required />
                        </div>
                        <div class="modal-footer">
                          <button type="submit" class="btn btn-primary" value="add" name="action">
                            Guardar
                          </button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table id="role_table" class="table table-hover custom-table">
              <thead>
                <tr>
                  <th>Nombre</th>
                  <th>Editar</th>
                  <th>Eliminar</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($roles as $rol) { ?>
                  <tr>
                    <td><?php echo $rol['nombre_rol'] ?></td>
                    <td>
                      <!-- Botón que abre el modal específico para cada registro -->
                      <button type="button" class="btn btn-primary editar-btn"
                        data-bs-toggle="modal"
                        data-bs-target="#editarRole<?php echo $rol['id_rol'] ?>">
                        <i class="bi bi-pencil-fill"></i>
                      </button>
                      <!-- Modal único para cada registro -->
                      <div class="modal fade" id="editarRole<?php echo $rol['id_rol'] ?>" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">
                                Editar <?php echo $rol['nombre_rol'] ?>
                              </h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <form action="<?php echo APP_URL; ?>app/controllers/roles/actualizar_role.php" id="role_form" method="post" autocomplete="off" class="row g-3 needs-validation" novalidate>
                                <!-- Campo oculto para el ID -->
                                <input type="hidden" id="id_rol" name="id_rol" value="<?php echo $rol['id_rol']; ?>">

                                <div class="col-md-12">
                                  <label for="nombre_rol" class="form-label">Nombre</label>
                                  <input type="text" class="form-control"
                                    name="nombre_rol"
                                    value="<?php echo htmlspecialchars($rol['nombre_rol']) ?>"
                                    required>
                                </div>

                                <div class="modal-footer">
                                  <button type="submit" class="btn btn-primary">Guardar cambios</button>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                    </td>
                    <td>
                      <!-- Formulario para eliminar -->
                      <form id="formEliminar<?php echo $rol['id_rol'] ?>" method="POST" action="<?php echo APP_URL ?>app/controllers/roles/eliminar_role.php">
                        <input type="hidden" name="id_rol" value="<?php echo $rol['id_rol'] ?>">
                        <button type="button"
                          class="btn btn-danger"
                          onclick="confirmarEliminacion(<?php echo $rol['id_rol'] ?>)">
                          <i class="bi bi-trash-fill"></i>
                        </button>
                      </form>
                      <script>
                        function confirmarEliminacion(idRol) {
                          Swal.fire({
                            title: '¿Eliminar rol?',
                            text: "¡Esta acción no se puede deshacer!",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#cc2026',
                            cancelButtonColor: '#2C395E',
                            confirmButtonText: 'Sí, eliminar',
                            cancelButtonText: 'Cancelar'
                          }).then((result) => {
                            if (result.isConfirmed) {
                              fetch('<?php echo APP_URL ?>app/controllers/roles/eliminar_role.php', {
                                  method: 'POST',
                                  headers: {
                                    'Content-Type': 'application/x-www-form-urlencoded',
                                  },
                                  body: 'id_rol=' + idRol,
                                  credentials: 'same-origin'
                                })
                                .then(response => {
                                  if (!response.ok) {
                                    return response.json().then(err => {
                                      throw err;
                                    });
                                  }
                                  return response.json();
                                })
                                .then(data => {
                                  if (data.success) {
                                    Swal.fire({
                                      icon: 'success',
                                      title: '¡Eliminado!',
                                      text: data.message,
                                      confirmButtonColor: '#cc2026'
                                    }).then(() => location.reload());
                                  }
                                })
                                .catch(error => {
                                  Swal.fire({
                                    icon: 'error',
                                    title: 'Error',
                                    text: error.error || 'Error desconocido',
                                    confirmButtonColor: '#cc2026'
                                  });
                                });
                            }
                          });
                        }
                      </script>
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Row end -->

</div>
<!-- Content wrapper end -->
<?php
require_once '../Main/Footer.php';
require_once '../../layout/mensajes.php';
?>

<script role="text/javascript" src="roles.js"></script>
