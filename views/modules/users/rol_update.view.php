<div class="pagetitle">
      <h1>Roles</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="?c=Dashboard">Panel de Control</a></li>
          <li class="breadcrumb-item">Roles</li>
          <li class="breadcrumb-item active">Actualizar Rol</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

	<section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Actualizar Rol</h5>

              <!-- General Form Elements -->
              <form action="" method="POST">
                <div class="row mb-3">
                  <div class="col-sm-10">                    
                    <input type="hidden" class="form-control" name="rol_code" id="rol_code" value="<?php echo $rolId->getRolCode();?>">
									<div class="form-group">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Nombre</label>
                  <div class="col-sm-10">
                    <input type="text" name="rol_name" class="form-control" value="<?php echo $rolId->getRolName();?>">
                  </div>
                </div>
                <div class="row mb-3">                  
                  <div class="col-sm-12">
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                  </div>
                </div>
              </form><!-- End General Form Elements -->

            </div>
          </div>
        </div>
      </div>
    </section>