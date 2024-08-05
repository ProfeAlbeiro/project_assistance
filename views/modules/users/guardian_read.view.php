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