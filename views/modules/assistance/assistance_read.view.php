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
                      <th>Grupo</th>
                      <th>Nombre Completo</th>
                      <th>Cód Estud</th>
                      <th>¿Asiste?</th>                    
                      <th>Fecha</th>
                      <th>Hora</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($assistances as $assistance) : ?>
                      <tr>
                        <td><?php echo $assistance->getStudentGroup(); ?></td>                      
                        <td><?php echo $assistance->getUserName(); ?></td>
                        <td><?php echo $assistance->getStudentId(); ?></td>
                        <td><?php echo $assistance->getAssistanceAttends(); ?></td>
                        <td><?php echo $assistance->getAssistanceDate(); ?></td>
                        <td><?php echo $assistance->getAssistanceStartTime(); ?></td>                      
                        <td>                        
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