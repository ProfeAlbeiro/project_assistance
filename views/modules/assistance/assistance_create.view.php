<div class="pagetitle">
  <h1>Aistencia</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
      <li class="breadcrumb-item">Asistencia</li>
      <li class="breadcrumb-item active">Registrar Asistencia</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
  <div class="row">
    <div class="col-lg-12">

      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Registrar Asistencia</h5>
          
          <form action="" method="POST">
            <div class="row mb-3">
              <label for="inputText" class="col-sm-2 col-form-label">Identificación</label>
              <div class="col-sm-10">
                <input type="text" name="estudiante_id" class="form-control">
              </div>
            </div>
            
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label">Estado</label>
              <div class="col-sm-10">
                <select class="form-select" name="estado_id" aria-label="Default select example">                  
                  <option value="1" selected>Asistencia</option>
                  <option value="2">No Asistencia</option>
                  <option value="3">Llegada Tarde</option>
                </select>
              </div>
            </div>            
            <div class="row mb-3">                  
              <div class="col-sm-12 text-center">
                <button type="submit" class="btn btn-primary">Enviar</button>
              </div>
            </div>
            <h5 class="card-title">Último Registro</h5>
            <div class="row mb-3">
              <label for="inputDate" class="col-sm-2 col-form-label" >Nombre</label>
                <div class="col-sm-10">
                  <label for="inputDate" class="col-sm-2 col-form-label" ><?php echo $lastRecord->getUserName() ?></label>
                </div>
              <label for="inputTime" class="col-sm-2 col-form-label">Identificación</label>
              <div class="col-sm-10">
                <label for="inputTime" class="col-sm-2 col-form-label"><?php echo $lastRecord->getEstudianteId() ?></label>
              </div>
              <label for="inputTime" class="col-sm-2 col-form-label">Curso</label>
              <div class="col-sm-10">
                <label for="inputTime" class="col-sm-2 col-form-label">601</label>
              </div>
              <label for="inputDate" class="col-sm-2 col-form-label" >Fecha</label>
              <div class="col-sm-10">
                <label for="inputDate" class="col-sm-2 col-form-label" ><?php echo $fecha?></label>
              </div>
              <label for="inputTime" class="col-sm-2 col-form-label">Hora</label>
              <div class="col-sm-10">
                <label for="inputTime" class="col-sm-2 col-form-label"><?php echo $hora?></label>
              </div>              
            </div>
          </form>

        </div>
      </div>

    </div>
  </div>
</section>