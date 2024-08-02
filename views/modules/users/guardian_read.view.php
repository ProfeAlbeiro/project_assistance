<div class="pagetitle">
      <h1><?php echo $_SESSION['collegeName'] ?></h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="?c=Dashboard">Panel de Control</a></li>
          <li class="breadcrumb-item">Usuarios</li>
          <li class="breadcrumb-item active">Acudientes</li>
        </ol>
      </nav>
    </div>

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <div class ="d-flex">
                <h5 class="card-title flex-grow-1">Acudientes</h5>

                <!-- Modal Consultar Acudiente -->
                <div class="modal fade modal-adjust" id="readGuardian" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog">
                  <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">Consultar Acudiente</h5>
                        <a href="?c=Users&a=guardianRead" class="btn-close" aria-label="Close"></a>
                      </div>
                      <div class="modal-body">
                          <form action="?c=Users&a=guardianReadById" method="POST">
                            <?php if ($studentId) : ?>
                              <input type="hidden" name="student_id" class="form-control" value="<?php echo $studentId->getUserId() ?>">
                              <div class="row mb-3 border-bottom pb-3">
                                <label for="inputText" class="col-sm-2 col-form-label pe-0"><strong>Id Estudiante:</strong></label>
                                <div class="col-sm-2">
                                  <label for="inputText" class="col-form-label"><?php echo $studentId->getUserId() ?></label>
                                </div>
                                <label for="inputText" class="col-sm-2 col-form-label"><strong>Estudiante:</strong></label>
                                <div class="col-sm-6">
                                  <label for="inputText" class="col-form-label"><?php echo $studentId->getUserName() ?></label>
                                </div>
                              </div>
                              <div class="row mb-3">
                                <label for="inputNumber" class="col-sm-3 col-form-label">Identificación</label>
                                <div class="col-sm-9">
                                  <input type="text" name="guardian_id" class="form-control">
                                </div>
                              </div>
                              <div class="modal-footer pb-0 px-0 mt-4">
                                <a href="?c=Users&a=guardianRead" class="btn btn-secondary">Cancelar</a>
                                <button type="submit" class="btn btn-primary">Consultar</button>
                              </div>
                            <?php endif; ?>
                          </form>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Modal Crear Acudiente -->
                <div class="modal fade modal-adjust" id="createGuardian" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog">
                  <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">Registrar Acudiente</h5>
                        <a href="?c=Users&a=guardianRead" class="btn-close" aria-label="Close"></a>
                      </div>
                      <div class="modal-body">
                          <form action="?c=Users&a=guardianCreate" method="POST">
                            <?php if ($studentId) : ?>
                              <input type="hidden" name="student_id" class="form-control" value="<?php echo $studentId->getUserId() ?>">
                              <div class="row mb-3 border-bottom pb-3">
                                <label for="inputText" class="col-sm-2 col-form-label pe-0"><strong>Id Estudiante:</strong></label>
                                <div class="col-sm-2">
                                  <label for="inputText" class="col-form-label"><?php echo $studentId->getUserId() ?></label>
                                </div>
                                <label for="inputText" class="col-sm-2 col-form-label"><strong>Estudiante:</strong></label>
                                <div class="col-sm-6">
                                  <label for="inputText" class="col-form-label"><?php echo $studentId->getUserName() ?></label>
                                </div>
                              </div>
                              <div class="row mb-3">
                                <label for="inputNumber" class="col-sm-3 col-form-label">Identificación</label>
                                <div class="col-sm-9">
                                  <input type="text" name="user_id" class="form-control">
                                </div>
                              </div>
                              <div class="row mb-3">
                                <label class="col-sm-3 col-form-label">Estado</label>
                                <div class="col-sm-9">
                                  <select class="form-select" name="user_state" aria-label="Default select example">
                                    <option value="" selected="" disabled="">Seleccione una opción</option>
                                    <option value="1">Activo</option>
                                    <option value="0">Pendiente</option>
                                  </select>
                                </div>
                              </div>
                              <div class="row mb-3">
                              <label class="col-sm-3 col-form-label">Parentesco</label>
                              <div class="col-sm-9">
                                <select class="form-select" name="guardian_type_name" aria-label="Default select example">
                                <option value="" selected="" disabled="">Seleccione una opción</option>
                                  <?php foreach ($guardiansType as $guardianType) : ?>
                                    <option value="<?php echo $guardianType->getGuardianTypeId() ?>"><?php echo $guardianType->getGuardianTypeName() ?></option>
                                  <?php endforeach; ?>
                                </select>
                              </div>
                            </div>
                              <div class="row mb-3">
                                <label for="inputText" class="col-sm-3 col-form-label">Nombres</label>
                                <div class="col-sm-9">
                                  <input type="text" name="user_name" class="form-control">
                                </div>
                              </div>
                              <div class="row mb-3">
                                <label for="inputEmail" class="col-sm-3 col-form-label">Email</label>
                                <div class="col-sm-9">
                                  <input type="email" name="user_email" class="form-control">
                                </div>
                              </div>
                              <div class="row mb-3">
                                <label for="inputEmail" class="col-sm-3 col-form-label">Celular</label>
                                <div class="col-sm-9">
                                  <input type="text" name="user_phone" class="form-control">
                                </div>
                              </div>
                              <div class="row mb-3">
                                <label for="inputPassword" class="col-sm-3 col-form-label">Contraseña</label>
                                <div class="col-sm-9">
                                  <input type="password" name="user_pass" class="form-control">
                                </div>
                              </div>
                              <div class="row mb-3">
                                <label for="inputPasswordRepet" class="col-sm-3 col-form-label">Repetir Contraseña</label>
                                <div class="col-sm-9">
                                  <input type="password" name="user_pass_rep" id="inputPasswordRepet" class="form-control">
                                </div>
                              </div>
                              <div class="modal-footer pb-0 px-0 mt-4">
                                <a href="?c=Users&a=guardianRead" class="btn btn-secondary">Cancelar</a>
                                <button type="submit" class="btn btn-primary">Enviar</button>
                              </div>
                            <?php endif; ?>
                          </form>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Consultar Estudiantes -->
                <a href="?c=Users&a=studentRead" type="button" class="btn btn-primary btn-sm my-3 ms-1 font-size-min d-flex align-items-center">
                  Estudiantes
                </a>
              </div>

              <!-- Tabla de Datos -->
              <table class="table datatable ajuste-tabla mt-1" id="ej-guardian" style="width:100%">
                <thead>
                  <tr>
                    <th class="text-center">Identificación</th>
                    <th class="text-center">Nombre</th>
                    <th class="text-center">Relación</th>
                    <th class="text-center">Correo</th>
                    <th class="text-center">Celular</th>
                    <th class="text-center">Estado</th>
                    <th class="text-center">Acciones</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($guardians as $guardian) : ?>
                    <tr class="text-center">
                      <td class="pt-3"><?php echo $guardian->getUserId(); ?></td>
                      <td class="pt-3"><?php echo $guardian->getUserName(); ?></td>
                      <td class="pt-3"><?php echo $guardian->getGuardianTypeName(); ?></td>
                      <td class="pt-3"><?php echo $guardian->getUserEmail(); ?></td>
                      <td class="pt-3"><?php echo $guardian->getUserPhone(); ?></td>
                      <td class="pt-3"><?php echo $state[$guardian->getUserState()]; ?></td>
                      <td class="text-center pt-2">
                        <a href="?c=Users&a=studentUpdate&idguardian=<?php echo $guardian->getUserCode(); ?>" class="btn btn-success p-0" title="Editar">
                          <h4 class="m-0"><i class="p-1 ri-edit-circle-fill"></i></h4>
                        </a>
                        <a href="#" class="btn btn-secondary p-0" title="Consultar Estudiantes">
                          <h4 class="m-0 text-white"><i class="p-1 ri-group-fill"></i></h4>
                        </a>
                        <a href="#" onclick="deleteRegister('Users','guardian',<?php echo $guardian->getUserCode(); ?>)" class="btn btn-danger p-0" title="Eliminar">
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