<div class="pagetitle">
      <h1>Usuarios</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
          <li class="breadcrumb-item">Usuarios</li>
          <li class="breadcrumb-item active">Registrar Usuario</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

	<section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Registrar Usuario</h5>

              <!-- General Form Elements -->
              <form action="" method="POST">
                
                <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-3 col-form-label">Identificación</label>
                  <div class="col-sm-9">
                    <input type="text" name="user_id" class="form-control">
                  </div>
                </div>
              
                <div class="row mb-3">
                  <label class="col-sm-3 col-form-label">Rol</label>
                  <div class="col-sm-9">
                    <select class="form-select" name="rol_code" aria-label="Default select example">
                    <option value="" selected="" disabled="">Seleccione una opción</option>
											<?php foreach ($roles as $rol) : ?>
												<option value="<?php echo $rol->getRolCode() ?>"><?php echo $rol->getRolName() ?></option>
											<?php endforeach; ?>                      
                    </select>
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-3 col-form-label">Estado</label>
                  <div class="col-sm-9">
                    <select class="form-select" name="user_state" aria-label="Default select example">
                      <option value="" selected="" disabled="">Seleccione una opción</option>
											<option value="1">Activo</option>
											<option value="0">Inactivo</option>	
                    </select>
                  </div>
                </div>
              
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-3 col-form-label">Nombres</label>
                  <div class="col-sm-9">
                    <input type="text" name="user_name" class="form-control">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputEmail" class="col-sm-3 col-form-label">Email</label>
                  <div class="col-sm-9">
                    <input type="email" name="user_email" class="form-control">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputPassword" class="col-sm-3 col-form-label">Contraseña</label>
                  <div class="col-sm-9">
                    <input type="password" name="user_pass" class="form-control">
                  </div>
                </div>
                                
                <div class="row mb-3">
                  <label for="inputPasswordRepet" class="col-sm-3 col-form-label">Repetir Contraseña</label>
                  <div class="col-sm-9">
                    <input type="password" name="user_pass_rep" id="inputPasswordRepet" class="form-control">
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