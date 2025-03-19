<?php
require_once '../../app/config.php';
require_once '../Main/Head.php';
require_once '../../app/controllers/usuarios/listado_usuarios.php';
require_once '../../app/controllers/roles/listado_roles.php';
?>

<style>
  .is-invalid {
    border-color: #dc3545 !important;
    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 12 12' width='12' height='12' fill='none' stroke='%23dc3545'%3e%3ccircle cx='6' cy='6' r='4.5'/%3e%3cpath stroke-linejoin='round' d='M5.8 3.6h.4L6 6.5z'/%3e%3ccircle cx='6' cy='8.2' r='.6' fill='%23dc3545' stroke='none'/%3e%3c/svg%3e");
    background-repeat: no-repeat;
    background-position: right calc(0.375em + 0.1875rem) center;
    background-size: calc(0.75em + 0.375rem) calc(0.75em + 0.375rem);
  }

  .is-invalid:focus {
    box-shadow: 0 0 0 0.25rem rgba(220, 53, 69, .25);
  }
</style>

<!-- Main header starts -->
<div class="main-header d-flex align-items-center justify-content-between position-relative">
  <div class="d-flex align-items-center justify-content-center">
    <div class="page-icon">
      <i class="bi bi-layout-sidebar"></i>
    </div>
    <div class="page-title d-none d-md-block">
      <h5>Gestion de Usuarios</h5>
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
          <div class="card-title">Usuarios:</div>
          <div class="card-header">
            <div class="card-title">
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#agregarRole">
                + Usuario
              </button>
              <!--Modal-->
              <div class="modal fade" id="agregarRole" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">
                        Nuevo Usuario
                      </h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form action="<?php echo APP_URL; ?>app/controllers/usuarios/crear_usuario.php" id="usuario_form" method="post" autocomplete="off" class="row g-3 needs-validation" novalidate>
                        <div class="col-md-12">
                          <label for="nombre_usuario" class="form-label">Nombre</label>
                          <input type="text" class="form-control" id="nombre_usuario" name="nombre_usuario" required />
                        </div>
                        <div class="col-md-12">
                          <label for="password_usuario" class="form-label">Password</label>
                          <input type="password" class="form-control" id="password_usuario" name="password_usuario" required />
                        </div>
                        <div class="col-md-12">
                          <label for="password_usuario2" class="form-label">Repetir Password</label>
                          <input type="password" class="form-control" id="password_usuario2" name="password_usuario2" required />
                          <div class="invalid-feedback" id="password-feedback" style="display: none;">
                            Las contraseñas no coinciden
                          </div>
                        </div>
                        <div class="col-md-12">
                          <label for="email_usuario" class="form-label">Email</label>
                          <input type="email" class="form-control" id="email_usuario" name="email_usuario" required />
                        </div>
                        <div class="col-md-12">
                          <label for="validationCustom04" class="form-label">Role</label>
                          <!-- Agrega el atributo name -->
                          <select class="form-select" id="validationCustom04" name="id_rol" required>
                            <option selected disabled value="">Asignar...</option>
                            <?php foreach ($roles as $role) { ?>
                              <option value="<?php echo $role['id_rol'] ?>"><?php echo $role['nombre_rol'] ?></option>
                            <?php } ?>
                          </select>
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
            <table id="usuarios_table" class="table table-hover custom-table">
              <thead>
                <tr>
                  <th>Nombre</th>
                  <th>Role</th>
                  <th>Email</th>
                  <th>Feacha de Creación</th>
                  <th>Estado</th>
                  <th>Editar</th>
                  <th>Eliminar</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($usuarios as $usuario) { ?>
                  <tr>
                    <td><?php echo $usuario['nombre_usuario'] ?></td>
                    <td><?php echo $usuario['nombre_rol'] ?></td>
                    <td><?php echo $usuario['email_usuario'] ?></td>
                    <td><?php echo $usuario['fyh_creacion'] ?></td>
                    <td><?php if ($usuario['estado'] == 1) {;
                          echo "Activo";
                        } else {
                          echo "Desactivado";
                        } ?></td>
                    <td>
                      <!-- Botón que abre el modal específico para cada registro -->
                      <button type="button" class="btn btn-primary editar-btn"
                        data-bs-toggle="modal"
                        data-bs-target="#editarRole<?php echo $usuario['id_usuario'] ?>">
                        <i class="bi bi-pencil-fill"></i>
                      </button>
                      <!-- Modal único para cada registro -->
                      <div class="modal fade" id="editarRole<?php echo $usuario['id_usuario'] ?>" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">
                                Editar <?php echo $usuario['nombre_usuario'] ?>
                              </h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <form action="<?php echo APP_URL; ?>app/controllers/usuarios/actualizar_usuario.php" method="post" autocomplete="off" class="row g-3 needs-validation" novalidate>
                                <!-- Campo oculto para el ID -->
                                <input type="hidden" id="id_usuario" name="id_usuario" value="<?php echo $usuario['id_usuario']; ?>">

                                <div class="col-md-12">
                                  <label for="nombre_usuario" class="form-label">Nombre</label>
                                  <input value="<?php echo $usuario['nombre_usuario']; ?>" type="text" class="form-control" id="nombre_usuario" name="nombre_usuario" required />
                                </div>
                                <div class="col-md-12">
                                  <label for="email_usuario" class="form-label">Email</label>
                                  <input value="<?php echo $usuario['email_usuario']; ?>" type="email" class="form-control" id="email_usuario" name="email_usuario" required />
                                </div>
                                <div class="col-md-12">
                                  <label for="validationCustom04" class="form-label">Role</label>
                                  <select name="id_rol" class="form-select" id="validationCustom04" required>
                                    <option selected disabled value="">Asignar...</option>
                                    <?php
                                    foreach ($roles as $role) {
                                    ?>
                                      <option value="<?php echo $role['id_rol'] ?>"><?php echo $role['nombre_rol'] ?></option>
                                    <?php
                                    }
                                    ?>
                                  </select>
                                </div>
                                <div class="col-md-12">
                                  <label for="validationCustom04" class="form-label">Estado</label>
                                  <select name="estado" class="form-select" id="validationCustom04" required>
                                    <option selected disabled value="">Asignar...</option>
                                    <option value="1">Activo</option>
                                    <option value="0">Desactivado</option>
                                  </select>
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
                      <form id="formEliminar<?php echo $usuario['id_usuario'] ?>" method="POST" action="<?php echo APP_URL ?>app/contusuariolers/usuarios/eliminar_usuario.php">
                        <input type="hidden" name="id_usuario" value="<?php echo $usuario['id_usuario'] ?>">
                        <button type="button"
                          class="btn btn-danger"
                          onclick="confirmarEliminacion(<?php echo $usuario['id_usuario'] ?>)">
                          <i class="bi bi-trash-fill"></i>
                        </button>
                      </form>
                      <script>
                        function confirmarEliminacion(idUsuario) {
                          Swal.fire({
                            title: '¿Eliminar usuario?',
                            text: "¡Esta acción no se puede deshacer!",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#cc2026',
                            cancelButtonColor: '#2C395E',
                            confirmButtonText: 'Sí, eliminar',
                            cancelButtonText: 'Cancelar'
                          }).then((result) => {
                            if (result.isConfirmed) {
                              // Enviar directamente vía AJAX
                              fetch('<?php echo APP_URL ?>app/controllers/usuarios/eliminar_usuario.php', {
                                  method: 'POST',
                                  headers: {
                                    'Content-Type': 'application/x-www-form-urlencoded',
                                  },
                                  body: 'id_usuario=' + idUsuario
                                })
                                .then(response => {
                                  if (response.ok) {
                                    Swal.fire('Exito', 'El Usuario fue eliminado', 'success');
                                  } else {
                                    Swal.fire('Error', 'El servidor respondió con un error', 'error');
                                  }
                                })
                                .catch(error => {
                                  Swal.fire('Error', 'No se pudo conectar al servidor', 'error');
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
