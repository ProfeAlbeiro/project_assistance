<div class="pagetitle">
      <h1>Usuarios</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="?c=Dashboard">Panel de Control</a></li>
          <li class="breadcrumb-item">Usuarios</li>
          <li class="breadcrumb-item active">Actualizar Usuario</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

	<section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Actualizar Usuario</h5>

              <!-- General Form Elements -->
              <form action="" method="POST">
                <input type="hidden" class="form-control" name="user_id" id="user_id" value="<?php echo $user->getUserId();?>">
                <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-3 col-form-label">Identificación</label>
                  <div class="col-sm-9">
                    <label for="inputNumber" class="col-sm-3 col-form-label"><?php echo $user->getUserId();?></label>                    
                  </div>
                </div>
              
                <div class="row mb-3">
                  <label class="col-sm-3 col-form-label">Rol</label>
                  <div class="col-sm-9">
                  <select class="form-select" name="rol_id">                                            											
											<?php foreach ($roles as $rol) : ?>
                            <?php if ($rol->getRolCode() == $user->getRolCode()) : ?>
                                <option selected="" value="<?php echo $rol->getRolCode() ?>"><?php echo $rol->getRolName() ?></option>
                            <?php else : ?>
                                <option value="<?php echo $rol->getRolCode() ?>"><?php echo $rol->getRolName() ?></option>
                            <?php endif; ?>
											<?php endforeach; ?>
										</select>
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-3 col-form-label">Estado</label>
                  <div class="col-sm-9">
                  <select class="form-select" name="user_state">
                        <?php for ($i = 0; $i <= 1; $i++) : ?>
                            <?php if ($user->getUserState() == $i) : ?>
                                <option selected="" value="<?php echo $i ?>"><?php echo $state[$i] ?></option>
                            <?php else : ?>
                                <option value="<?php echo $i ?>"><?php echo $state[$i] ?></option>
                            <?php endif; ?>
                        <?php endfor; ?>
										</select>
                  </div>
                </div>
              
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-3 col-form-label">Nombres</label>
                  <div class="col-sm-9">
                    <input type="text" name="user_name" class="form-control" value="<?php echo $user->getUserName();?>">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputEmail" class="col-sm-3 col-form-label">Email</label>
                  <div class="col-sm-9">
                    <input type="email" name="user_email" class="form-control" value="<?php echo $user->getUserEmail();?>">
                  </div>
                </div>
                
                <div class="row mb-3">
                  <label for="inputEmail" class="col-sm-3 col-form-label">Celular</label>
                  <div class="col-sm-9">
                    <input type="text" name="user_phone" class="form-control" value="<?php echo $user->getUserPhone();?>">
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