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
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                + Recurso
              </button>
              <!--Modal-->
              <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">
                        Nuevo Recurso
                      </h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form id="recurso_form" method="post" autocomplete="off" class="row g-3 needs-validation" novalidate>
                        <div class="col-md-12">
                          <label for="recurso_descripcion" class="form-label">Descripción</label>
                          <input type="text" class="form-control" id="recurso_descripcion" name="recurso_descripcion" required />
                        </div>
                        <div class="col-md-12">
                          <label for="recurso_tipo" class="form-label">Tipo</label>
                          <select class="form-select" id="recurso_tipo" name="recurso_tipo" required>
                            <option selected disabled value="">...</option>
                            <option value="1">Activo</option>
                            <option value="0">Video</option>
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
            <table id="basicExample" class="table table-hover display">
              <thead>
                <tr>
                  <th>Nombre</th>
                  <th>Ver</th>
                  <th>Editar</th>
                  <th>Eliminar</th>
                </tr>
              </thead>
              <tbody>
                <?php
                foreach ($roles as $rol) {
                  $rol_id = $rol['id_rol'];
                  $rol_nombre = $rol['nombre_rol'];
                ?>
                  <tr>
                    <td><?php echo $rol_nombre ?></th>
                    <td>
                      <button type="button" class="btn btn-info" value="<?php echo $rol_id ?>">
                        <i class="bi bi-eye-fill"></i>
                      </button>
                    </td>
                    <td>
                      <button type="button" class="btn btn-warning" value="<?php echo $rol_id ?>">
                        <i class="bi bi-pencil-fill"></i>
                      </button>
                    </td>
                    <td>
                      <button type="button" class="btn btn-danger" value="<?php echo $rol_id ?>">
                        <i class="bi bi-trash-fill"></i>
                      </button>
                    </td>
                  </tr>
                <?php
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Row end -->

  <script type="text/javascript" src="<?php echo APP_URL; ?>/admin/scripts.js"></script>

</div>
<!-- Content wrapper end -->
<?php
require_once '../Main/Footer.php';
require_once '../../layout/mensajes.php';
?>
