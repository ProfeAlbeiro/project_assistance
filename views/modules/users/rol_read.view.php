<div class="pagetitle">
      <h1><?php echo $_SESSION['collegeName'] ?></h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="?c=Dashboard">Panel de Control</a></li>
          <li class="breadcrumb-item">Usuarios</li>
          <li class="breadcrumb-item active">Roles</li>
        </ol>
      </nav>
    </div>

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <div class ="d-flex">
                <h5 class="card-title flex-grow-1">Roles</h5>

                <!-- Modal Crear Curso -->
                <button type="button" class="btn btn-primary btn-sm my-3" data-bs-toggle="modal" data-bs-target="#createRol">
                  Crear Rol
                </button>
                <div class="modal fade" id="createRol" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog">
                  <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">Crear Rol</h5>
                        <a href="?c=Users&a=rolRead" class="btn-close" aria-label="Close"></a>
                      </div>
                      <div class="modal-body">
                          <form action="?c=Users&a=rolCreate" method="POST">                            
                            <div class="row mb-3">
                              <label for="inputText" class="col-sm-3 col-form-label">Nombre</label>
                              <div class="col-sm-9">
                                <input type="text" name="rol_name" class="form-control">
                              </div>
                            </div>
                            <div class="modal-footer pb-0 px-0 mt-4">
                              <a href="?c=Users&a=rolRead" class="btn btn-secondary">Cerrar</a>
                              <button type="submit" class="btn btn-primary">Enviar</button>
                            </div>
                          </form>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Modal Actualizar Rol -->
                <div class="modal fade" id="editRol" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog">
                  <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">Editar Rol</h5>
                        <a href="?c=Users&a=rolRead" class="btn-close" aria-label="Close"></a>
                      </div>
                      <div class="modal-body">
                          <form action="?c=Users&a=rolUpdate" method="POST">
                            <?php if ($rolId) : ?>
                              <div class="row mb-3">                                
                                <div class="col-sm-9">                                  
                                  <input type="hidden" name="rol_code" class="form-control" value="<?php echo $rolId->getRolCode() ?>">
                                </div>
                              </div>
                              <div class="row mb-3">
                                <label for="inputText" class="col-sm-3 col-form-label">Nombre</label>
                                <div class="col-sm-9">
                                  <input type="text" name="rol_name" class="form-control" value="<?php echo $rolId->getRolName() ?>">
                                </div>
                              </div>
                              <div class="modal-footer pb-0 px-0 mt-4">
                                <a href="?c=Users&a=rolRead" class="btn btn-secondary">Cerrar</a>
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
              <table class="table datatable ajuste-tabla" id="ej-rol" style="width:100%">
                <thead>
                  <tr>
                    <th class="hidden-col"></th>
                    <th class="text-center">Rol</th>
                    <th class="text-center">Acciones</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($roles as $rol) : ?>
                    <tr class="text-center">
                      <td class="pt-3 hidden-col"><?php echo $rol->getRolCode(); ?></td>
                      <td class="pt-3"><?php echo $rol->getRolName(); ?></td>
                      <td class="text-center pt-2">
                        <a href="?c=Users&a=rolUpdate&idrol=<?php echo $rol->getRolCode(); ?>" class="btn btn-success p-0">
                          <h4 class="m-0"><i class="p-1 ri-edit-circle-fill"></i></h4>
                        </a>
                        <a href="#" onclick="deleteRegister('Users','rol',<?php echo $rol->getRolCode(); ?>)" class="btn btn-danger p-0 ms-1">
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