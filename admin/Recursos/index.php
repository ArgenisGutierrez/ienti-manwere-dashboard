<?php
require_once '../../app/config.php';
require_once '../Main/Head.php';
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
                      <form id="recurso_form" method="post" autocomplete="off" class="row g-3 needs-validation" enctype="multipart/form-data" novalidate>
                        <div class="col-md-12">
                          <label for="recurso_descripcion" class="form-label">Descripción</label>
                          <input type="text" class="form-control" id="recurso_descripcion" name="recurso_descripcion" required />
                        </div>
                        <div class="col-md-12">
                          <label for="recurso_clasificacion" class="form-label">Clasificación</label>
                          <select class="form-select" id="recurso_clasificacion" name="recurso_clasificacion" required>
                            <option selected disabled value="">...</option>
                            <option value="Material Normativo">Material Normativo</option>
                            <option value="Material Relativo a Capacitación">Material Relativo a Capacitación</option>
                            <option value="Material Complementario">Material Complementario</option>
                          </select>
                        </div>
                        <div class="col-md-12">
                          <label for="recurso_tipo" class="form-label">Tipo</label>
                          <select class="form-select" id="recurso_tipo" name="recurso_tipo" required>
                            <option selected disabled value="">...</option>
                            <option value="Url">Url</option>
                            <option value="Archivo">Archivo</option>
                            <option value="Video">Video</option>
                          </select>
                        </div>
                        <div class="col-md-12" id="materialField" hidden>
                          <label for="recurso_contenido" class="form-label" id="materialLabel"></label>
                          <input type="text" class="form-control" id="recurso_contenido" name="recurso_contenido" required />
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
