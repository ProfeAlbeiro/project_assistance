	<div class="pagetitle">
      <h1>Colegio</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="?c=Dashboard">Panel de Control</a></li>
          <li class="breadcrumb-item">Colegio</li>
          <li class="breadcrumb-item active">Registrar Jornada</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

	<section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Registrar Jornada</h5>

              <!-- General Form Elements -->
              <form action="" method="POST">
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Nombre</label>
                  <div class="col-sm-10">
                    <input type="text" name="journe_name" class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputTime" class="col-sm-2 col-form-label">Hora Inicio</label>
                  <div class="col-sm-10">
                    <input type="time" name="journe_start_time" class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputTime" class="col-sm-2 col-form-label">Hora Fin</label>
                  <div class="col-sm-10">
                    <input type="time" name="journe_end_time" class="form-control">
                  </div>
                </div>
                <div class="row mb-3 pt-4">                  
                  <div class="col-sm-12 text-center">
                    <button type="submit" class="btn btn-primary">Enviar</button>
                  </div>
                </div>

              </form><!-- End General Form Elements -->

            </div>
          </div>
        </div>
      </div>
    </section>