	<div class="pagetitle">
      <h1>Colegio</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="?c=Dashboard">Panel de Control</a></li>
          <li class="breadcrumb-item">Colegio</li>
          <li class="breadcrumb-item active">Grados</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <div class ="d-flex">
                <h5 class="card-title flex-grow-1">Grados</h5>                
                <!-- Modal Crear Grado -->
                <button type="button" class="btn btn-primary btn-sm my-3" data-bs-toggle="modal" data-bs-target="#createGrade">
                  Crear Grado
                </button>                
                <div class="modal fade" id="createGrade" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog">
                  <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">Crear Grado</h5>
                        <a href="?c=Colleges&a=gradeRead" class="btn-close" aria-label="Close"></a>
                      </div>
                      <div class="modal-body">                        
                          <form action="?c=Colleges&a=gradeCreate" method="POST">
                            <div class="row mb-3">
                              <label for="inputText" class="col-sm-3 col-form-label">Nombre</label>
                              <div class="col-sm-9">
                                <input type="text" name="grade_name" class="form-control">
                              </div>
                            </div>                            
                            <div class="modal-footer pb-0 px-0 mt-4">
                              <a href="?c=Colleges&a=gradeRead" class="btn btn-secondary">Cerrar</a>                            
                              <button type="submit" class="btn btn-primary">Enviar</button>
                            </div>                          
                          </form>                        
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Modal Actualizar Grado -->
                <!-- <div class="modal fade" id="editJourne" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog">
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
                                <div class="col-sm-9">                                
                                  <input type="hidden" name="journe_id" class="form-control" value="<?php echo $journeId->getJourneId() ?>">
                                </div>
                              </div>
                              <div class="row mb-3">
                                <label for="inputText" class="col-sm-3 col-form-label">Nombre</label>
                                <div class="col-sm-9">
                                  <input type="text" name="journe_name" class="form-control" value="<?php echo $journeId->getJourneName() ?>">
                                </div>
                              </div>
                              <div class="row mb-3">
                                <label for="inputTime" class="col-sm-3 col-form-label">Hora Inicio</label>
                                <div class="col-sm-9">
                                  <input type="time" name="journe_start_time" class="form-control" value="<?php echo $journeId->getJourneStartTime() ?>">
                                </div>
                              </div>
                              <div class="row mb-3">
                                <label for="inputTime" class="col-sm-3 col-form-label">Hora Fin</label>
                                <div class="col-sm-9">
                                  <input type="time" name="journe_end_time" class="form-control" value="<?php echo $journeId->getJourneEndTime() ?>">
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
                </div> -->
              </div>
              <table class="table datatable ajuste-tabla" id="ej-grade" style="width:100%">
                <thead>
                  <tr>
                    <th class="text-center">Código</th>                    
                    <th class="text-center">Grado</th>
                    <th class="text-center">Acciones</th>                    
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($grades as $grade) : ?>
                    <tr class="text-center">
                      <td class="pt-3"><?php echo $grade->getGradeId(); ?></td>                      
                      <td class="pt-3"><?php echo $grade->getGradeName(); ?></td>                      
                      <td class="text-center pt-2">
                        <a href="?c=Colleges&a=gradeUpdate&idgrade=<?php echo $grade->getGradeId(); ?>" class="btn btn-success p-0">
                          <h4 class="m-0"><i class="p-1 ri-edit-circle-fill"></i></h4>
                        </a>
                        <a href="#" onclick="deleteRegister(<?php echo $grade->getGradeId(); ?>, 'grade')" class="btn btn-danger p-0 ms-1">
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