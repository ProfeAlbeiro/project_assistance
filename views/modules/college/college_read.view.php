	<div class="pagetitle">
      <h1><?php echo $_SESSION['collegeName'] ?></h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="?c=Dashboard">Panel de Control</a></li>
          <li class="breadcrumb-item">Colegio</li>
          <li class="breadcrumb-item active">Colegio</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <div class ="d-flex pr-5">
                <h5 class="card-title flex-grow-1">Colegio</h5>
                <!-- Modal Editar Colegio -->
                <a href="?c=Colleges&a=collegeUpdate" class="btn btn-primary btn-sm my-3">Editar Colegio</a>
                <div class="modal fade" id="editCollege" tabindex="-1">
                  <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
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
                  <tr class="text-center">
                    <th>Nombre</th>
                    <th>Dirección</th>
                    <th>Teléfono</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($colleges as $college) : ?>
                    <tr class="text-center">
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