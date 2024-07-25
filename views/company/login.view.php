      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="text-center mb-2 d-flex flex-column align-items-center">
                <a href="#" class="logo d-flex justify-content-center align-items-center">
                  <img class="logo-ingreso" src="assets/landing/img/logo.png" alt="">
                </a>
                <span class="reducir-texto card-title py-1">Asistencia <?php echo $_SESSION['collegeName'] ?></span>
              </div>

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Iniciar Sesión</h5>
                    <p class="text-center small">Ingrese su Documento y Contraseña</p>
                  </div>

                  <form class="row g-3 needs-validation" action="" method="POST" novalidate>

                    <div class="col-12">
                      <label for="user_id" class="form-label">Documento de Identidad</label>
                      <input type="text" name="user_id" class="form-control" id="user_id" required>
                      <div class="invalid-feedback">Ingrese su documento de Identidad</div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Contraseña</label>
                      <input type="password" name="user_pass" class="form-control" id="yourPassword" required>
                      <div class="invalid-feedback">Ingrese su contraseña</div>
                    </div>

                    <div class="col-12">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                        <label class="form-check-label" for="rememberMe">Recordar datos</label>
                      </div>
                    </div>
                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit">Iniciar Sesión</button>
                    </div>
                    <div class="col-12">
                      <p class="small mb-0">No ha creado una cuenta? <a href="#">Crear una cuenta</a></p>
                    </div>
                    <div class="text-center"><b><?php echo $message ?></b></div>
                  </form>

                </div>
              </div>

            </div>
          </div>
        </div>

      </section>