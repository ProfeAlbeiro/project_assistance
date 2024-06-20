<div class="pagetitle">
      <h1>Consultar Usuarios</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="?c=Dashboard">Panel de Control</a></li>
          <li class="breadcrumb-item">Usuarios</li>
          <li class="breadcrumb-item active">Consultar Usuarios</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Consultar Usuarios</h5>

              <!-- Table with stripped rows -->
              <table class="table datatable ajuste-tabla" id="ej-data-tables" style="width:100%">
                <thead>
                  <tr>
                    <th>Identificación</th>
                    <th>Tipo Rol</th>
                    <th>Nombre</th>                    
                    <th>Correo</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($users as $user) : ?>
                    <tr>
                      <td><?php echo $user->getUserId(); ?></td>
                      <td><?php echo $user->getRolName(); ?></td>
                      <td><?php echo $user->getUserName() ?></td>
                      <td><?php echo $user->getUserEmail(); ?></td>
                      <td><?php echo $state[$user->getUserState()]; ?></td>                      
                      <td>
                      <a href="?c=Users&a=userUpdate&idUser=<?php echo $user->getUserId(); ?>" class="btn btn-success p-0">
                          <h4 class="m-0"><i class="p-1 ri-edit-circle-fill"></i></h4>
                        </a>
                        <a href="?c=Users&a=userDelete&idUser=<?php echo $user->getUserId(); ?>" class="btn btn-danger p-0">
                          <h4 class="m-0"><i class="p-1 ri-delete-bin-5-line"></i></h4>
                        </a>
                      </td>                      
                    </tr> 
                  <?php endforeach; ?>
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>