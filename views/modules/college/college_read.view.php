	<div class="pagetitle">
      <h1>Colegio</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="?c=Dashboard">Panel de Control</a></li>          
          <li class="breadcrumb-item active">Colegio</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <div class ="d-flex">
                <h5 class="card-title flex-grow-1">Colegio</h5>
                <a href="?c=Colleges&a=collegeUpdate" class="btn btn-primary btn-sm my-3 mx-1">Editar Colegio</a>                                
                <!-- Modal Editar Colegio -->
                <div class="modal fade" id="editCollege" tabindex="-1">
                  <div class="modal-dialog modal-dialog-scrollable">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">Editar Colegio</h5>
                        <a href="?c=Colleges&a=collegeRead" class="btn-close" aria-label="Close"></a>
                      </div>
                      <div class="modal-body">
                        <?php foreach ($colleges as $college) : ?>
                          <form action="?c=Colleges&a=collegeUpdate" method="POST">
                            <div class="row mb-3">
                              <label for="inputText" class="col-sm-3 col-form-label">Nombre</label>
                              <div class="col-sm-9">
                                <input type="text" name="college_name" class="form-control" value="<?php echo $college->getCollegeName(); ?>">
                              </div>
                            </div>
                            <div class="row mb-3">
                              <label for="inputText" class="col-sm-3 col-form-label">Dirección</label>
                              <div class="col-sm-9">
                                <input type="text" name="college_address" class="form-control" value="<?php echo $college->getCollegeAddress(); ?>">
                              </div>
                            </div>
                            <div class="row mb-3">
                              <label for="inputText" class="col-sm-3 col-form-label">Teléfono</label>
                              <div class="col-sm-9">
                                <input type="text" name="college_phone" class="form-control" value="<?php echo $college->getCollegePhone(); ?>">
                              </div>
                            </div>                            
                            <div class="modal-footer pb-0 px-0 mt-4">
                              <a href="?c=Colleges&a=collegeRead" class="btn btn-secondary">Cerrar</a>                            
                              <button type="submit" class="btn btn-primary">Enviar</button>
                            </div>                          
                          </form>
                        <?php endforeach; ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <table class="table datatable">
                <thead>
                  <tr>                    
                    <th>Nombre</th>                    
                    <th>Dirección</th>                    
                    <th>Teléfono</th>                    
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($colleges as $college) : ?>
                    <tr>                      
                      <td><?php echo $college->getCollegeName(); ?></td>                      
                      <td><?php echo $college->getCollegeAddress(); ?></td>                      
                      <td><?php echo $college->getCollegePhone(); ?></td>                      
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>    