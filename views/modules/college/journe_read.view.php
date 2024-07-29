	<!-- Migas de Pan -->
  <div class="pagetitle">
      <h1><?php echo $_SESSION['collegeName'] ?></h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="?c=Dashboard">Panel de Control</a></li>
          <li class="breadcrumb-item">Colegio</li>
          <li class="breadcrumb-item active">Jornadas</li>
        </ol>
      </nav>
    </div>

    <!-- Sección -->
    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <div class ="d-flex">
                <h5 class="card-title flex-grow-1">Jornadas</h5>

                <!-- Modal Crear Jornada -->
                <button type="button" class="btn btn-primary btn-sm my-3" data-bs-toggle="modal" data-bs-target="#createJourne">
                  Crear Jornada
                </button>
                <div class="modal fade" id="createJourne" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog">
                  <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">Crear Jornada</h5>
                        <a href="?c=Colleges&a=journeRead" class="btn-close" aria-label="Close"></a>
                      </div>
                      <div class="modal-body">
                          <form action="?c=Colleges&a=journeCreate" method="POST">
                            <div class="row mb-3">
                              <label for="inputText" class="col-sm-4 col-form-label">Nombre</label>
                              <div class="col-sm-8">
                                <input type="text" name="journe_name" class="form-control">
                              </div>
                            </div>
                            <div class="row mb-3">
                              <label for="inputTime" class="col-sm-4 col-form-label">Hora Inicio</label>
                              <div class="col-sm-8">
                                <input type="time" name="journe_start_time" class="form-control">
                              </div>
                            </div>
                            <div class="row mb-3">
                              <label for="inputTime" class="col-sm-4 col-form-label">Hora Fin</label>
                              <div class="col-sm-8">
                                <input type="time" name="journe_end_time" class="form-control">
                              </div>
                            </div>
                            <div class="row mb-3">
                              <label for="inputNumber" class="col-sm-4 col-form-label">Min Antes</label>
                              <div class="col-sm-8">
                                <input type="number" name="journe_min_before" class="form-control">
                              </div>
                            </div>
                            <div class="row mb-3">
                              <label for="inputNumber" class="col-sm-4 col-form-label">Min Después</label>
                              <div class="col-sm-8">
                                <input type="number" name="journe_min_after" class="form-control">
                              </div>
                            </div>
                            <div class="row mb-3">
                              <label for="inputNumber" class="col-sm-4 col-form-label">Min Inasistencia</label>
                              <div class="col-sm-8">
                                <input type="number" name="journe_min_nonattend" class="form-control">
                              </div>
                            </div>
                            <div class="modal-footer pb-0 px-0 mt-4">
                              <a href="?c=Colleges&a=journeRead" class="btn btn-secondary">Cerrar</a>
                              <button type="submit" class="btn btn-primary">Enviar</button>
                            </div>
                          </form>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Modal Actualizar Jornada -->
                <div class="modal fade" id="editJourne" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog">
                  <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">Editar Jornada</h5>
                        <a href="?c=Colleges&a=journeRead" class="btn-close" aria-label="Close"></a>
                      </div>
                      <div class="modal-body">
                          <form action="?c=Colleges&a=journeUpdate" method="POST">
                            <?php if ($journeId) : ?>
                              <div class="row">
                                <div class="col-sm-8">
                                  <input type="hidden" name="journe_id" class="form-control" value="<?php echo $journeId->getJourneId() ?>">
                                </div>
                              </div>
                              <div class="row mb-3">
                                <label for="inputText" class="col-sm-4 col-form-label">Nombre</label>
                                <div class="col-sm-8">
                                  <input type="text" name="journe_name" class="form-control" value="<?php echo $journeId->getJourneName() ?>">
                                </div>
                              </div>
                              <div class="row mb-3">
                                <label for="inputTime" class="col-sm-4 col-form-label">Hora Inicio</label>
                                <div class="col-sm-8">
                                  <input type="time" name="journe_start_time" class="form-control" value="<?php echo $journeId->getJourneStartTime() ?>">
                                </div>
                              </div>
                              <div class="row mb-3">
                                <label for="inputTime" class="col-sm-4 col-form-label">Hora Fin</label>
                                <div class="col-sm-8">
                                  <input type="time" name="journe_end_time" class="form-control" value="<?php echo $journeId->getJourneEndTime() ?>">
                                </div>
                              </div>
                              <div class="row mb-3">
                                <label for="inputNumber" class="col-sm-4 col-form-label">Min Antes</label>
                                <div class="col-sm-8">
                                  <input type="number" name="journe_min_before" class="form-control" value="<?php echo $journeId->getJourneMinBefore() ?>">
                                </div>
                              </div>
                              <div class="row mb-3">
                                <label for="inputNumber" class="col-sm-4 col-form-label">Min Después</label>
                                <div class="col-sm-8">
                                  <input type="number" name="journe_min_after" class="form-control" value="<?php echo $journeId->getJourneMinAfter() ?>">
                                </div>
                              </div>
                              <div class="row mb-3">
                                <label for="inputNumber" class="col-sm-4 col-form-label">Min Inasistencia</label>
                                <div class="col-sm-8">
                                  <input type="number" name="journe_min_nonattend" class="form-control" value="<?php echo $journeId->getJourneMinNonAttend() ?>">
                                </div>
                              </div>
                              <div class="modal-footer pb-0 px-0 mt-4">
                                <a href="?c=Colleges&a=journeRead" class="btn btn-secondary">Cerrar</a>
                                <button type="submit" class="btn btn-primary">Actualizar</button>
                              </div>
                            <?php endif; ?>
                          </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Tabla de Datos -->
              <table class="table datatable ajuste-tabla" id="ej-journe" style="width:100%">
                <thead>
                  <tr>
                    <th class="text-center">Jornada</th>
                    <th class="text-center">Hora Inicio</th>
                    <th class="text-center">Hora Fin</th>
                    <th class="text-center">Min/Ant</th>
                    <th class="text-center">Min/Des</th>
                    <th class="text-center">Min/NoA</th>
                    <th class="text-center">Acciones</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($journes as $journe) : ?>
                    <tr class="text-center">
                      <td class="pt-3"><?php echo $journe->getJourneName(); ?></td>
                      <td class="pt-3"><?php echo $journe->getJourneStartTime(); ?></td>
                      <td class="pt-3"><?php echo $journe->getJourneEndTime(); ?></td>
                      <td class="pt-3"><?php echo $journe->getJourneMinBefore(); ?></td>
                      <td class="pt-3"><?php echo $journe->getJourneMinAfter(); ?></td>
                      <td class="pt-3"><?php echo $journe->getJourneMinNonAttend(); ?></td>
                      <td class="text-center pt-2">
                        <a href="?c=Colleges&a=journeUpdate&idjourne=<?php echo $journe->getJourneId(); ?>" class="btn btn-success p-0">
                          <h4 class="m-0"><i class="p-1 ri-edit-circle-fill"></i></h4>
                        </a>
                        <a href="#" onclick="deleteRegister(<?php echo $journe->getJourneId(); ?>,'journe')" class="btn btn-danger p-0 ms-1">
                          <h4 class="m-0"><i class="p-1 ri-delete-bin-5-line"></i></h4>
                        </a>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>

            </div>
          </div>
        </div>
      </div>
    </section>