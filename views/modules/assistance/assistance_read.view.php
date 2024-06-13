<div class="pagetitle">
      <h1>Consultar Asistencia</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
          <li class="breadcrumb-item">Asistencia</li>
          <li class="breadcrumb-item active">Consultar Asistencia</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Consultar Asistencia</h5>

              <!-- Table with stripped rows -->
              <div class="table-responsive">
                <table class="table datatable" id="example" style="width:100%">
                  <thead>
                    <tr>
                      <th>Cód Estud</th>
                      <th>Nombre</th>
                      <th>Estado</th>                    
                      <th>Fecha</th>
                      <th>Hora</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($assistances as $assistance) : ?>
                      <tr>
                        <td><?php echo $assistance->getEstudianteId(); ?></td>
                        <td><?php echo $assistance->getUserName(); ?></td>
                        <td><?php echo $assistance->getEstadoNombre(); ?></td>                      
                        <td><?php echo $assistance->getAsistenciaFecha(); ?></td>
                        <td><?php echo $assistance->getAsistenciaHoraInicio(); ?></td>                      
                        <td>                        
                        <a href="#" class="btn btn-success p-0">
                            <h4 class="m-0"><i class="ri-edit-circle-fill"></i></h4>
                          </a>
                          <a href="#" class="btn btn-danger p-0">
                            <h4 class="m-0"><i class="ri-delete-bin-5-line"></i></h4>
                          </a>
                        </td>                      
                      </tr> 
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>