<?php
require_once '../../app/config.php';
require_once '../Main/Head.php';
require_once '../../app/controllers/recursos/listado_recursos.php';
?>
<!-- Main header starts -->
<div class="main-header d-flex align-items-center justify-content-between position-relative">
  <div class="d-flex align-items-center justify-content-center">
    <div class="page-icon">
      <i class="bi bi-layout-sidebar"></i>
    </div>
    <div class="page-title d-none d-md-block">
      <h5>Gestion de Recursos</h5>
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
          <div class="card-title">Recursos</div>
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
                    <form action="<?php echo APP_URL;?>app/controllers/recursos/crear_recurso.php" id="recurso_form" method="post" autocomplete="off" class="row g-3 needs-validation" enctype="multipart/form-data" novalidate>
                        <div class="col-md-12">
                          <label for="descripcion_recurso" class="form-label">Descripción</label>
                          <input type="text" class="form-control" id="descripcion_recurso" name="descripcion_recurso" required />
                        </div>
                        <div class="col-md-12">
                          <label for="clasificacion_recurso" class="form-label">Clasificación</label>
                          <select class="form-select" id="clasificacion_recurso" name="clasificacion_recurso" required>
                            <option selected disabled value="">...</option>
                            <option value="Material Normativo">Material Normativo</option>
                            <option value="Material Relativo a Capacitación">Material Relativo a Capacitación</option>
                            <option value="Material Complementario">Material Complementario</option>
                          </select>
                        </div>
                        <div class="col-md-12">
                          <label for="tipo_recurso" class="form-label">Tipo</label>
                          <select class="form-select" id="tipo_recurso" name="tipo_recurso" required>
                            <option selected disabled value="">...</option>
                            <option value="URL">URL</option>
                            <option value="Archivo">Archivo</option>
                            <option value="Video">Video</option>
                          </select>
                        </div>
                        <div class="col-md-12" id="materialField" hidden>
                          <label for="contenido_recurso" class="form-label" id="materialLabel"></label>
                          <input type="text" class="form-control" id="contenido_recurso" name="contenido_recurso" required />
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
          <div class="accordion" id="accordionExample2">
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingOneLight">
                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                  data-bs-target="#collapseOneLight" aria-expanded="true" aria-controls="collapseOneLight">
                  Material Normativo
                </button>
              </h2>
              <div id="collapseOneLight" class="accordion-collapse collapse"
                aria-labelledby="headingOneLight" data-bs-parent="#accordionExample2">
                <div class="accordion-body">
                  <div class="card-body">
                    <div class="table-responsive">
                      <table id="material_normativo_table" class="table custom-table" style="width: 100%;">
                        <thead>
                          <tr>
                            <th>Descripción</th>
                            <th>Descargar</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php foreach ($recursos as $recurso) {
                                if ($recurso['clasificacion_recurso'] == "Material Normativo") {
                                    ?>
                              <tr>
                                <td><?php echo $recurso['descripcion_recurso'] ?></td>
                                <td><?php
                                    switch ($recurso['tipo_recurso']) {
                                case 'URL':
                                    ?>
                                      <a target="_blank" href="<?php echo $recurso['contenido_recurso'];?>" download="<?php echo $recurso['contenido_recurso']?>" type="button" class="btn btn-info editar-btn">
                                        <i class="bi bi-link-45deg"></i>
                                      </a>
                                    <?php
                                    break;
                                case 'Archivo':
                                    ?>
                                      <a href="<?php echo APP_URL."public/recursos/".$recurso['contenido_recurso'];?>" type="button" class="btn btn-info editar-btn">
                                        <i class="bi bi-cloud-arrow-down-fill"></i>
                                      </a>
                                    <?php
                                    break;
                                default:
                                    ?>
                                      <a target="_blank" href="<?php echo $recurso['contenido_recurso']?>" type="button" class="btn btn-info editar-btn">
                                        <i class="bi bi-film"></i>
                                      </a>
                                    <?php
                                    break;
                                    }
                                    ?>
                                </td>
                                <td>
                                  <!-- Botón que abre el modal específico para cada registro -->
                                  <button type="button" class="btn btn-primary editar-btn"
                                    data-bs-toggle="modal"
                                    data-bs-target="#editarRole<?php echo $recurso['id_recurso'] ?>">
                                    <i class="bi bi-pencil-fill"></i>
                                  </button>
                                  <!-- Modal único para cada registro -->
                                  <div class="modal fade" id="editarRole<?php echo $recurso['id_recurso'] ?>" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLabel">
                                            Editar Recurso - <?php echo $recurso['descripcion_recurso'] ?>
                                          </h5>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                          <form autocomplete="off" id="form-editar-<?php echo $recurso['id_recurso'] ?>" method="POST"
                                            action="<?php echo APP_URL ?>app/controllers/recursos/actualizar_recurso.php"
                                            enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>

                                            <!-- Campos ocultos importantes -->
                                            <input type="hidden" name="id_recurso" value="<?php echo $recurso['id_recurso'] ?>">
                                            <input type="hidden" id="tipo_original_<?php echo $recurso['id_recurso'] ?>"
                                              value="<?php echo $recurso['tipo_recurso'] ?>">
                                            <input type="hidden" id="contenido_original_<?php echo $recurso['id_recurso'] ?>"
                                              value="<?php echo $recurso['contenido_recurso'] ?>">

                                            <!-- Resto de campos del formulario... -->
                                            <div class="col-md-12">
                                              <label for="editar_descripcion" class="form-label">Descripción</label>
                                              <input type="text" name="descripcion_recurso" class="form-control" id="editar_descripcion"
                                                name="descripcion" value="<?php echo htmlspecialchars($recurso['descripcion_recurso']) ?>" required>
                                            </div>

                                            <div class="col-md-12">
                                              <label for="editar_clasificacion" class="form-label">Clasificación</label>
                                              <select class="form-select" id="editar_clasificacion" name="clasificacion_recurso" required>
                                                <?php
                                                $clasificaciones = [
                                                  'Material Normativo',
                                                  'Material Relativo a Capacitación',
                                                  'Material Complementario'
                                                ];
                                                foreach ($clasificaciones as $clasif) {
                                                    $selected = $recurso['clasificacion_recurso'] == $clasif ? 'selected' : '';
                                                    echo "<option value='$clasif' $selected>$clasif</option>";
                                                }
                                                ?>
                                              </select>
                                            </div>

                                            <div class="col-md-12">
                                              <label for="editar_tipo" class="form-label">Tipo</label>
                                              <select class="form-select" id="editar_tipo" name="tipo_recurso" required
                                                data-id="<?php echo $recurso['id_recurso'] ?>">
                                                <?php
                                                $tipos = ['URL', 'Archivo', 'Video'];
                                                foreach ($tipos as $tipo) {
                                                    $selected = $recurso['tipo_recurso'] == $tipo ? 'selected' : '';
                                                    echo "<option value='$tipo' $selected>$tipo</option>";
                                                }
                                                ?>
                                              </select>
                                            </div>

                                            <div class="col-md-12" id="campo-edicion-<?php echo $recurso['id_recurso'] ?>">
                                                  <?php if ($recurso['tipo_recurso'] == 'Archivo') : ?>
                                                <div class="mb-3">
                                                  <label class="form-label">Archivo actual:</label>
                                                  <div class="input-group">
                                                    <a href="<?php echo $recurso['contenido_recurso'] ?>"
                                                      class="form-control"
                                                      target="_blank">
                                                        <?php echo basename($recurso['contenido_recurso']) ?>
                                                    </a>
                                                    <button type="button"
                                                      class="btn btn-outline-secondary"
                                                      onclick="document.getElementById('nuevo_archivo_<?php echo $recurso['id_recurso'] ?>').click()">
                                                      Cambiar archivo
                                                    </button>
                                                    <input type="file"
                                                      id="nuevo_archivo_<?php echo $recurso['id_recurso'] ?>"
                                                      name="contenido_recurso"
                                                      class="d-none">
                                                  </div>
                                                  <small class="text-muted"><?php echo $recurso['contenido_recurso'] ?></small>
                                                </div>
                                              <?php else: ?>
                                                <div class="mb-3">
                                                  <label class="form-label"><?php echo $recurso['tipo_recurso'] == 'URL' ? 'Enlace' : 'URL del Video' ?></label>
                                                  <input type="url"
                                                    class="form-control"
                                                    name="contenido_recurso"
                                                    value="<?php echo $recurso['contenido_recurso'] ?>"
                                                    required>
                                                </div>
                                              <?php endif; ?>
                                            </div>
                                            <div class="modal-footer">
                                              <button type="submit" class="btn btn-primary">
                                                Guardar
                                              </button>
                                            </div>
                                          </form>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </td>
<td>
                                  <!-- Formulario para eliminar -->
                                  <button type="button"
                                    class="btn btn-danger"
                                    onclick="confirmarEliminacion(<?php echo $recurso['id_recurso'] ?>)">
                                    <i class="bi bi-trash-fill"></i>
                                  </button>
                                  <script>
                                    function confirmarEliminacion(idRecurso) {
                                      Swal.fire({
                                        title: '¿Eliminar Recurso?',
                                        text: "¡Esta acción no se puede deshacer!",
                                        icon: 'warning',
                                        showCancelButton: true,
                                        confirmButtonColor: '#cc2026',
                                        cancelButtonColor: '#2C395E',
                                        confirmButtonText: 'Sí, eliminar',
                                        cancelButtonText: 'Cancelar'
                                      }).then((result) => {
                                        if (result.isConfirmed) {
                                          fetch('<?php echo APP_URL ?>app/controllers/recursos/eliminar_recurso.php', {
                                              method: 'POST',
                                              headers: {
                                                'Content-Type': 'application/x-www-form-urlencoded',
                                              },
                                              body: 'id_recurso=' + idRecurso
                                            })
                                            .then(response => {
                                              if (response.ok) {
                                                if (response.ok) {
                                                  Swal.fire({
                                                    icon: 'success',
                                                    title: '¡Eliminado!',
                                                    text: 'El recurso se elimino con exito',
                                                    confirmButtonColor: '#cc2026'
                                                  }).then(() => {
                                                    location.reload(); // Recarga completa
                                                  });
                                                }
                                              } else {
                                                response.json().then(data => {
                                                  Swal.fire('Error', data.error || 'Error en el servidor', 'error');
                                                });
                                              }
                                            })
                                            .catch(error => {
                                              Swal.fire('Error', 'Error de conexión: ' + error.message, 'error');
                                            });
                                        }
                                      });
                                    }
                                  </script>
                                </td>
                              </tr>
                                    <?php
                                }
                          } ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="accordion-item">
              <h2 class="accordion-header" id="headingTwoLight">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                  data-bs-target="#collapseTwoLight" aria-expanded="false" aria-controls="collapseTwoLight">
                  Material Relativo a Capacitación
                </button>
              </h2>
              <div id="collapseTwoLight" class="accordion-collapse collapse" aria-labelledby="headingTwoLight"
                data-bs-parent="#accordionExample2">
                <div class="accordion-body">
                  <div class="card-body">
                    <div class="table-responsive">
                      <table id="material_capacitacion_table" class="table custom-table" style="width: 100%;">
                        <thead>
                          <tr>
                            <th>Descripción</th>
                            <th>Descargar</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php foreach ($recursos as $recurso) {
                                if ($recurso['clasificacion_recurso'] == "Material Relativo a Capacitación") {
                                    ?>
                              <tr>
                                <td><?php echo $recurso['descripcion_recurso'] ?></td>
                                <td><?php
                                    switch ($recurso['tipo_recurso']) {
                                case 'URL':
                                    ?>
                                    <a target="_blank" href="<?php echo $recurso['contenido_recurso'];?>" download="<?php echo $recurso['contenido_recurso']?>" type="button" class="btn btn-info editar-btn">
                                      <i class="bi bi-link-45deg"></i>
                                    </a>
                                    <?php
                                    break;
                                case 'Archivo':
                                    ?>
                                      <a href="<?php echo APP_URL."public/recursos/".$recurso['contenido_recurso'];?>" type="button" class="btn btn-info editar-btn">
                                        <i class="bi bi-cloud-arrow-down-fill"></i>
                                      </a>
                                    <?php
                                    break;
                                default:
                                    ?>
                                      <a target="_blank" href="<?php echo $recurso['contenido_recurso']?>" type="button" class="btn btn-info editar-btn">
                                        <i class="bi bi-film"></i>
                                      </a>
                                    <?php
                                    break;
                                    }
                                    ?>
                                </td>
                                <td>
                                  <!-- Botón que abre el modal específico para cada registro -->
                                  <button type="button" class="btn btn-primary editar-btn"
                                    data-bs-toggle="modal"
                                    data-bs-target="#editarRole<?php echo $recurso['id_recurso'] ?>">
                                    <i class="bi bi-pencil-fill"></i>
                                  </button>
                                  <!-- Modal único para cada registro -->
<div class="modal fade" id="editarRole<?php echo $recurso['id_recurso'] ?>" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLabel">
                                            Editar Recurso - <?php echo $recurso['descripcion_recurso'] ?>
                                          </h5>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                          <form autocomplete="off" id="form-editar-<?php echo $recurso['id_recurso'] ?>" method="POST"
                                            action="<?php echo APP_URL ?>app/controllers/recursos/actualizar_recurso.php"
                                            enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>

                                            <!-- Campos ocultos importantes -->
                                            <input type="hidden" name="id_recurso" value="<?php echo $recurso['id_recurso'] ?>">
                                            <input type="hidden" id="tipo_original_<?php echo $recurso['id_recurso'] ?>"
                                              value="<?php echo $recurso['tipo_recurso'] ?>">
                                            <input type="hidden" id="contenido_original_<?php echo $recurso['id_recurso'] ?>"
                                              value="<?php echo $recurso['contenido_recurso'] ?>">

                                            <!-- Resto de campos del formulario... -->
                                            <div class="col-md-12">
                                              <label for="editar_descripcion" class="form-label">Descripción</label>
                                              <input type="text" name="descripcion_recurso" class="form-control" id="editar_descripcion"
                                                name="descripcion" value="<?php echo htmlspecialchars($recurso['descripcion_recurso']) ?>" required>
                                            </div>

                                            <div class="col-md-12">
                                              <label for="editar_clasificacion" class="form-label">Clasificación</label>
                                              <select class="form-select" id="editar_clasificacion" name="clasificacion_recurso" required>
                                                <?php
                                                $clasificaciones = [
                                                  'Material Normativo',
                                                  'Material Relativo a Capacitación',
                                                  'Material Complementario'
                                                ];
                                                foreach ($clasificaciones as $clasif) {
                                                    $selected = $recurso['clasificacion_recurso'] == $clasif ? 'selected' : '';
                                                    echo "<option value='$clasif' $selected>$clasif</option>";
                                                }
                                                ?>
                                              </select>
                                            </div>

                                            <div class="col-md-12">
                                              <label for="editar_tipo" class="form-label">Tipo</label>
                                              <select class="form-select" id="editar_tipo" name="tipo_recurso" required
                                                data-id="<?php echo $recurso['id_recurso'] ?>">
                                                <?php
                                                $tipos = ['URL', 'Archivo', 'Video'];
                                                foreach ($tipos as $tipo) {
                                                    $selected = $recurso['tipo_recurso'] == $tipo ? 'selected' : '';
                                                    echo "<option value='$tipo' $selected>$tipo</option>";
                                                }
                                                ?>
                                              </select>
                                            </div>

                                            <div class="col-md-12" id="campo-edicion-<?php echo $recurso['id_recurso'] ?>">
                                                  <?php if ($recurso['tipo_recurso'] == 'Archivo') : ?>
                                                <div class="mb-3">
                                                  <label class="form-label">Archivo actual:</label>
                                                  <div class="input-group">
                                                    <a href="<?php echo $recurso['contenido_recurso'] ?>"
                                                      class="form-control"
                                                      target="_blank">
                                                        <?php echo basename($recurso['contenido_recurso']) ?>
                                                    </a>
                                                    <button type="button"
                                                      class="btn btn-outline-secondary"
                                                      onclick="document.getElementById('nuevo_archivo_<?php echo $recurso['id_recurso'] ?>').click()">
                                                      Cambiar archivo
                                                    </button>
                                                    <input type="file"
                                                      id="nuevo_archivo_<?php echo $recurso['id_recurso'] ?>"
                                                      name="contenido_recurso"
                                                      class="d-none">
                                                  </div>
                                                  <small class="text-muted"><?php echo $recurso['contenido_recurso'] ?></small>
                                                </div>
                                              <?php else: ?>
                                                <div class="mb-3">
                                                  <label class="form-label"><?php echo $recurso['tipo_recurso'] == 'URL' ? 'Enlace' : 'URL del Video' ?></label>
                                                  <input type="url"
                                                    class="form-control"
                                                    name="contenido_recurso"
                                                    value="<?php echo $recurso['contenido_recurso'] ?>"
                                                    required>
                                                </div>
                                              <?php endif; ?>
                                            </div>
                                            <div class="modal-footer">
                                              <button type="submit" class="btn btn-primary">
                                                Guardar
                                              </button>
                                            </div>
                                          </form>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </td>
                                <td>
                                  <!-- Formulario para eliminar -->
                                  <button type="button"
                                    class="btn btn-danger"
                                    onclick="confirmarEliminacion(<?php echo $recurso['id_recurso'] ?>)">
                                    <i class="bi bi-trash-fill"></i>
                                  </button>
                                  <script>
                                    function confirmarEliminacion(idRecurso) {
                                      Swal.fire({
                                        title: '¿Eliminar Recurso?',
                                        text: "¡Esta acción no se puede deshacer!",
                                        icon: 'warning',
                                        showCancelButton: true,
                                        confirmButtonColor: '#cc2026',
                                        cancelButtonColor: '#2C395E',
                                        confirmButtonText: 'Sí, eliminar',
                                        cancelButtonText: 'Cancelar'
                                      }).then((result) => {
                                        if (result.isConfirmed) {
                                          fetch('<?php echo APP_URL ?>app/controllers/recursos/eliminar_recurso.php', {
                                              method: 'POST',
                                              headers: {
                                                'Content-Type': 'application/x-www-form-urlencoded',
                                              },
                                              body: 'id_recurso=' + idRecurso
                                            })
                                            .then(response => {
                                              if (response.ok) {
                                                if (response.ok) {
                                                  Swal.fire({
                                                    icon: 'success',
                                                    title: '¡Eliminado!',
                                                    text: 'El recurso se elimino con exito',
                                                    confirmButtonColor: '#cc2026'
                                                  }).then(() => {
                                                    location.reload(); // Recarga completa
                                                  });
                                                }
                                              } else {
                                                response.json().then(data => {
                                                  Swal.fire('Error', data.error || 'Error en el servidor', 'error');
                                                });
                                              }
                                            })
                                            .catch(error => {
                                              Swal.fire('Error', 'Error de conexión: ' + error.message, 'error');
                                            });
                                        }
                                      });
                                    }
                                  </script>
                                </td>
                              </tr>
                                    <?php
                                }
                          } ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="accordion-item">
              <h2 class="accordion-header" id="headingThreeLight">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                  data-bs-target="#collapseThreeLight" aria-expanded="false"
                  aria-controls="collapseThreeLight">
                  Material Complementario
                </button>
              </h2>
              <div id="collapseThreeLight" class="accordion-collapse collapse"
                aria-labelledby="headingThreeLight" data-bs-parent="#accordionExample2">
                <div class="accordion-body">
                  <div class="card-body">
                    <div class="table-responsive">
                      <table id="material_complementario_table" class="table custom-table" style="width: 100%;">
                        <thead>
                          <tr>
                            <th>Descripción</th>
                            <th>Descargar</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php foreach ($recursos as $recurso) {
                                if ($recurso['clasificacion_recurso'] == "Material Complementario") {
                                    ?>
                              <tr>
                                <td><?php echo $recurso['descripcion_recurso'] ?></td>
                                <td><?php
                                    switch ($recurso['tipo_recurso']) {
                                case 'URL':
                                    ?>
                                    <a target="_blank" href="<?php echo $recurso['contenido_recurso'];?>" download="<?php echo $recurso['contenido_recurso']?>" type="button" class="btn btn-info editar-btn">
                                    <i class="bi bi-link-45deg"></i>
                                    </a>
                                    <?php
                                    break;
                                case 'Archivo':
                                    ?>
                                      <a href="<?php echo APP_URL."public/recursos/".$recurso['contenido_recurso'];?>" type="button" class="btn btn-info editar-btn">
                                        <i class="bi bi-cloud-arrow-down-fill"></i>
                                      </a>
                                    <?php
                                    break;
                                default:
                                    ?>
                                      <a target="_blank" href="<?php echo $recurso['contenido_recurso']?>" type="button" class="btn btn-info editar-btn">
                                        <i class="bi bi-film"></i>
                                      </a>
                                    <?php
                                    break;
                                    }
                                    ?>
                                </td>
                                <td>
                                  <!-- Botón que abre el modal específico para cada registro -->
                                  <button type="button" class="btn btn-primary editar-btn"
                                    data-bs-toggle="modal"
                                    data-bs-target="#editarRole<?php echo $recurso['id_recurso'] ?>">
                                    <i class="bi bi-pencil-fill"></i>
                                  </button>
                                  <!-- Modal único para cada registro -->
<div class="modal fade" id="editarRole<?php echo $recurso['id_recurso'] ?>" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLabel">
                                            Editar Recurso - <?php echo $recurso['descripcion_recurso'] ?>
                                          </h5>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                          <form autocomplete="off" id="form-editar-<?php echo $recurso['id_recurso'] ?>" method="POST"
                                            action="<?php echo APP_URL ?>app/controllers/recursos/actualizar_recurso.php"
                                            enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>

                                            <!-- Campos ocultos importantes -->
                                            <input type="hidden" name="id_recurso" value="<?php echo $recurso['id_recurso'] ?>">
                                            <input type="hidden" id="tipo_original_<?php echo $recurso['id_recurso'] ?>"
                                              value="<?php echo $recurso['tipo_recurso'] ?>">
                                            <input type="hidden" id="contenido_original_<?php echo $recurso['id_recurso'] ?>"
                                              value="<?php echo $recurso['contenido_recurso'] ?>">

                                            <!-- Resto de campos del formulario... -->
                                            <div class="col-md-12">
                                              <label for="editar_descripcion" class="form-label">Descripción</label>
                                              <input type="text" name="descripcion_recurso" class="form-control" id="editar_descripcion"
                                                name="descripcion" value="<?php echo htmlspecialchars($recurso['descripcion_recurso']) ?>" required>
                                            </div>

                                            <div class="col-md-12">
                                              <label for="editar_clasificacion" class="form-label">Clasificación</label>
                                              <select class="form-select" id="editar_clasificacion" name="clasificacion_recurso" required>
                                                <?php
                                                $clasificaciones = [
                                                  'Material Normativo',
                                                  'Material Relativo a Capacitación',
                                                  'Material Complementario'
                                                ];
                                                foreach ($clasificaciones as $clasif) {
                                                    $selected = $recurso['clasificacion_recurso'] == $clasif ? 'selected' : '';
                                                    echo "<option value='$clasif' $selected>$clasif</option>";
                                                }
                                                ?>
                                              </select>
                                            </div>

                                            <div class="col-md-12">
                                              <label for="editar_tipo" class="form-label">Tipo</label>
                                              <select class="form-select" id="editar_tipo" name="tipo_recurso" required
                                                data-id="<?php echo $recurso['id_recurso'] ?>">
                                                <?php
                                                $tipos = ['URL', 'Archivo', 'Video'];
                                                foreach ($tipos as $tipo) {
                                                    $selected = $recurso['tipo_recurso'] == $tipo ? 'selected' : '';
                                                    echo "<option value='$tipo' $selected>$tipo</option>";
                                                }
                                                ?>
                                              </select>
                                            </div>

                                            <div class="col-md-12" id="campo-edicion-<?php echo $recurso['id_recurso'] ?>">
                                                  <?php if ($recurso['tipo_recurso'] == 'Archivo') : ?>
                                                <div class="mb-3">
                                                  <label class="form-label">Archivo actual:</label>
                                                  <div class="input-group">
                                                    <a href="<?php echo $recurso['contenido_recurso'] ?>"
                                                      class="form-control"
                                                      target="_blank">
                                                        <?php echo basename($recurso['contenido_recurso']) ?>
                                                    </a>
                                                    <button type="button"
                                                      class="btn btn-outline-secondary"
                                                      onclick="document.getElementById('nuevo_archivo_<?php echo $recurso['id_recurso'] ?>').click()">
                                                      Cambiar archivo
                                                    </button>
                                                    <input type="file"
                                                      id="nuevo_archivo_<?php echo $recurso['id_recurso'] ?>"
                                                      name="contenido_recurso"
                                                      class="d-none">
                                                  </div>
                                                  <small class="text-muted"><?php echo $recurso['contenido_recurso'] ?></small>
                                                </div>
                                              <?php else: ?>
                                                <div class="mb-3">
                                                  <label class="form-label"><?php echo $recurso['tipo_recurso'] == 'URL' ? 'Enlace' : 'URL del Video' ?></label>
                                                  <input type="url"
                                                    class="form-control"
                                                    name="contenido_recurso"
                                                    value="<?php echo $recurso['contenido_recurso'] ?>"
                                                    required>
                                                </div>
                                              <?php endif; ?>
                                            </div>
                                            <div class="modal-footer">
                                              <button type="submit" class="btn btn-primary">
                                                Guardar
                                              </button>
                                            </div>
                                          </form>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </td>
                                <td>
                                  <!-- Formulario para eliminar -->
                                  <button type="button"
                                    class="btn btn-danger"
                                    onclick="confirmarEliminacion(<?php echo $recurso['id_recurso'] ?>)">
                                    <i class="bi bi-trash-fill"></i>
                                  </button>
                                  <script>
                                    function confirmarEliminacion(idRecurso) {
                                      Swal.fire({
                                        title: '¿Eliminar recurso?',
                                        text: "¡Esta acción no se puede deshacer!",
                                        icon: 'warning',
                                        showCancelButton: true,
                                        confirmButtonColor: '#cc2026',
                                        cancelButtonColor: '#2C395E',
                                        confirmButtonText: 'Sí, eliminar',
                                        cancelButtonText: 'Cancelar'
                                      }).then((result) => {
                                        if (result.isConfirmed) {
                                          fetch('<?php echo APP_URL ?>app/controllers/recursos/eliminar_recurso.php', {
                                              method: 'POST',
                                              headers: {
                                                'Content-Type': 'application/x-www-form-urlencoded',
                                              },
                                              body: 'id_recurso=' + idRecurso
                                            })
                                            .then(response => {
                                              if (response.ok) {
                                                if (response.ok) {
                                                  Swal.fire({
                                                    icon: 'success',
                                                    title: '¡Eliminado!',
                                                    text: 'El recurso se elimino con exito',
                                                    confirmButtonColor: '#cc2026'
                                                  }).then(() => {
                                                    location.reload(); // Recarga completa
                                                  });
                                                }
                                              } else {
                                                response.json().then(data => {
                                                  Swal.fire('Error', data.error || 'Error en el servidor', 'error');
                                                });
                                              }
                                            })
                                            .catch(error => {
                                              Swal.fire('Error', 'Error de conexión: ' + error.message, 'error');
                                            });
                                        }
                                      });
                                    }
                                  </script>
                                </td>
                              </tr>
                                    <?php
                                }
                          } ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>

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

<script type="text/javascript" src="recursos.js"></script>
