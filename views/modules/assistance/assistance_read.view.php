<div class="pagetitle">
      <h1>Consultar Asistencia</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="?c=Dashboard">Panel de Control</a></li>
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
                <table class="table datatable ajuste-tabla" id="ej-assistances" style="width:100%">
                  <thead>
                    <tr>
                      <th class="text-center">Fecha</th>
                      <th class="text-center">Nombre</th>
                      <th class="text-center">¿Asistencia?</th>                    
                      <th class="text-center">Hora</th>
                      <th class="text-center">Jornada</th>
                      <th class="text-center">Grupo</th>
                      <th class="text-center">Código</th>
                      <th class="text-center">Celular</th>
                      <th class="text-center">Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($assistances as $assistance) : ?>
                      <tr>
                        <td><?php echo $assistance->getAssistanceDate(); ?></td>
                        <td><?php echo $assistance->getUserName(); ?></td>
                        <td class="text-center"><?php echo $assistance->getAttendState(); ?></td>
                        <td class="text-center"><?php echo $assistance->getAssistanceStartTime(); ?></td>
                        <td class="text-center"><?php echo $assistance->getJourneName(); ?></td>
                        <td class="text-center"><?php echo $assistance->getGradeId() . $assistance->getCourseName(); ?></td>                      
                        <td class="text-center"><?php echo $assistance->getStudentId(); ?></td>
                        <td class="text-center"><?php echo $assistance->getUserPhone(); ?></td>
                        <td class="text-center">                        
                        <a href="#" class="btn btn-success p-0">
                            <h4 class="m-0"><i class="p-1 ri-edit-circle-fill"></i></h4>
                          </a>
                          <a href="#" class="btn btn-danger p-0">
                            <h4 class="m-0"><i class="p-1 ri-delete-bin-5-line"></i></h4>
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