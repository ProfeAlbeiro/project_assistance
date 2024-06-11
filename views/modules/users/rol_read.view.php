	<div class="pagetitle">
      <h1>Consultar Roles</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
          <li class="breadcrumb-item">Roles</li>
          <li class="breadcrumb-item active">Consultar Roles</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Consultar Roles</h5>

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th>Código</th>
                    <th>Tipo Rol</th>                    
                    <th class="text-center">Acciones</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($roles as $rol) : ?>
                    <tr>
                      <td><?php echo $rol->getRolCode(); ?></td>
                      <td><?php echo $rol->getRolName(); ?></td>
                      <td class="text-center">
                        <a href="?c=Users&a=rolUpdate&idRol=<?php echo $rol->getRolCode(); ?>" class="btn btn-success p-0">
                          <h4 class="m-0"><i class="ri-edit-circle-fill"></i></h4>
                        </a>
                        <a href="?c=Users&a=rolDelete&idRol=<?php echo $rol->getRolCode(); ?>" class="btn btn-danger p-0">
                          <h4 class="m-0"><i class="ri-delete-bin-5-line"></i></h4>
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