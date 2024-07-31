<div class="pagetitle">
      <h1><?php echo $_SESSION['collegeName'] ?></h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="?c=Dashboard">Panel de Control</a></li>
          <li class="breadcrumb-item">Usuarios</li>
          <li class="breadcrumb-item active">Funcionarios</li>
        </ol>
      </nav>
    </div>

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <div class ="d-flex">
                <h5 class="card-title flex-grow-1">Funcionarios</h5>

                <!-- Modal Crear Usuario -->
                <button type="button" class="btn btn-primary btn-sm my-3" data-bs-toggle="modal" data-bs-target="#createUser">
                  Crear Funcionario
                </button>
                <div class="modal fade" id="createUser" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog">
                  <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">Crear Funcionario</h5>
                        <a href="?c=Users&a=userRead" class="btn-close" aria-label="Close"></a>
                      </div>
                      <div class="modal-body">
                          <form action="?c=Users&a=userCreate" method="POST">                            
                            <div class="row mb-3">
                              <label class="col-sm-3 col-form-label">Rol</label>
                              <div class="col-sm-9">
                                <select class="form-select" name="rol_code" aria-label="Default select example">
                                <option value="" selected="" disabled="">Seleccione una opción</option>
                                  <?php foreach ($roles as $rol) : ?>
                                    <option value="<?php echo $rol->getRolCode() ?>"><?php echo $rol->getRolName() ?></option>
                                  <?php endforeach; ?>                      
                                </select>
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
                              <label for="inputNumber" class="col-sm-3 col-form-label">Identificación</label>
                              <div class="col-sm-9">
                                <input type="text" name="user_id" class="form-control">
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
                              <a href="?c=Users&a=userRead" class="btn btn-secondary">Cerrar</a>
                              <button type="submit" class="btn btn-primary">Enviar</button>
                            </div>
                          </form>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Modal Actualizar Usuario -->
                <div class="modal fade modal-adjust" id="editUser" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog">
                  <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">Editar Usuario</h5>
                        <a href="?c=Users&a=userRead" class="btn-close" aria-label="Close"></a>
                      </div>
                      <div class="modal-body">
                          <form action="?c=Users&a=userUpdate" method="POST">
                            <?php if ($userId) : ?>
                              <input type="hidden" class="form-control" name="user_id" id="user_id" value="<?php echo $userId->getUserId();?>">
                              <div class="row mb-3">
                                <label for="inputNumber" class="col-sm-3 col-form-label">Identificación</label>
                                <div class="col-sm-9">
                                  <label for="inputNumber" class="col-sm-3 col-form-label"><?php echo $userId->getUserId();?></label>                    
                                </div>
                              </div>                            
                              <div class="row mb-3">
                                <label class="col-sm-3 col-form-label">Rol</label>
                                <div class="col-sm-9">
                                <select class="form-select" name="rol_id">                                            											
                                    <?php foreach ($roles as $rol) : ?>
                                          <?php if ($rol->getRolCode() == $userId->getRolCode()) : ?>
                                              <option selected="" value="<?php echo $rol->getRolCode() ?>"><?php echo $rol->getRolName() ?></option>
                                          <?php else : ?>
                                              <option value="<?php echo $rol->getRolCode() ?>"><?php echo $rol->getRolName() ?></option>
                                          <?php endif; ?>
                                    <?php endforeach; ?>
                                  </select>
                                </div>
                              </div>
                              <div class="row mb-3">
                                <label class="col-sm-3 col-form-label">Estado</label>
                                <div class="col-sm-9">
                                <select class="form-select" name="user_state">
                                      <?php for ($i = 0; $i <= 1; $i++) : ?>
                                          <?php if ($userId->getUserState() == $i) : ?>
                                              <option selected="" value="<?php echo $i ?>"><?php echo $state[$i] ?></option>
                                          <?php else : ?>
                                              <option value="<?php echo $i ?>"><?php echo $state[$i] ?></option>
                                          <?php endif; ?>
                                      <?php endfor; ?>
                                  </select>
                                </div>
                              </div>                            
                              <div class="row mb-3">
                                <label for="inputText" class="col-sm-3 col-form-label">Nombres</label>
                                <div class="col-sm-9">
                                  <input type="text" name="user_name" class="form-control" value="<?php echo $userId->getUserName();?>">
                                </div>
                              </div>
                              <div class="row mb-3">
                                <label for="inputEmail" class="col-sm-3 col-form-label">Email</label>
                                <div class="col-sm-9">
                                  <input type="email" name="user_email" class="form-control" value="<?php echo $userId->getUserEmail();?>">
                                </div>
                              </div>                              
                              <div class="row mb-3">
                                <label for="inputEmail" class="col-sm-3 col-form-label">Celular</label>
                                <div class="col-sm-9">
                                  <input type="text" name="user_phone" class="form-control" value="<?php echo $userId->getUserPhone();?>">
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
                                <a href="?c=Users&a=userRead" class="btn btn-secondary">Cerrar</a>
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
              <table class="table datatable ajuste-tabla" id="ej-user" style="width:100%">
                <thead>
                  <tr>                    
                    <th class="text-center">Rol</th>
                    <th class="text-center">Identificación</th>
                    <th class="text-center">Nombre</th>
                    <th class="text-center">Correo</th>
                    <th class="text-center">Celular</th>
                    <th class="text-center">Estado</th>
                    <th class="text-center">Acciones</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($users as $user) : ?>
                    <tr class="text-center">                      
                      <td class="pt-3"><?php echo $user->getRolName(); ?></td>
                      <td class="pt-3"><?php echo $user->getUserId(); ?></td>
                      <td class="pt-3"><?php echo $user->getUserName(); ?></td>
                      <td class="pt-3"><?php echo $user->getUserEmail(); ?></td>
                      <td class="pt-3"><?php echo $user->getUserPhone(); ?></td>
                      <td class="pt-3"><?php echo $state[$user->getUserState()]; ?></td>
                      <td class="text-center pt-2">
                        <a href="?c=Users&a=userUpdate&iduser=<?php echo $user->getUserId(); ?>" class="btn btn-success p-0">
                          <h4 class="m-0"><i class="p-1 ri-edit-circle-fill"></i></h4>
                        </a>
                        <a href="#" onclick="deleteRegister('Users','user',<?php echo $user->getUserId(); ?>)" class="btn btn-danger p-0 ms-1">
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