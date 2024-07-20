<div class="pagetitle">
  <h1>Aistencia</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="?c=Dashboard">Panel de Control</a></li>
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
                <input type="text" name="student_id" class="form-control">
              </div>
            </div>
            <div class="row mb-3">                  
              <div class="col-sm-12 text-center">
                <button type="submit" class="btn btn-primary">Enviar</button>
              </div>
            </div>
            <?php if ($lastRecord) : ?>
              <h5 class="card-title">Último Registro</h5>
              <div class="row">                
                <label for="inputTime" class="py-1 col-5 col-sm-2 col-form-label"><b>¿Asistencia?</b></label>
                <label for="inputTime" class="py-1 col-7 col-sm-10 col-form-label"><?php echo $lastRecord->getAttendState() ?></label>                
              </div>
              <div class="row">
                <label for="inputDate" class="py-1 col-5 col-sm-2 col-form-label" ><b>Nombre</b></label>
                <label for="inputDate" class="py-1 col-7 col-sm-10 col-form-label" ><?php echo $lastRecord->getUserName() ?></label>
              </div>
              <div class="row">
                <label for="inputTime" class="py-1 col-5 col-sm-2 col-form-label"><b>Identificación</b></label>
                <label for="inputTime" class="py-1 col-7 col-sm-10 col-form-label"><?php echo $lastRecord->getStudentId() ?></label>
              </div>              
              <div class="row">
                <label for="inputTime" class="py-1 col-5 col-sm-2 col-form-label"><b>Jornada</b></label>
                <label for="inputTime" class="py-1 col-7 col-sm-10 col-form-label"><?php echo $lastRecord->getJourneName() ?></label>
              </div>
              <div class="row">
                <label for="inputTime" class="py-1 col-5 col-sm-2 col-form-label"><b>Grupo</b></label>                
                <label for="inputTime" class="py-1 col-7 col-sm-10 col-form-label"><?php echo $lastRecord->getGradeId() . $lastRecord->getCourseName() ?></label>
              </div>
              <div class="row">
                <label for="inputTime" class="py-1 col-5 col-sm-2 col-form-label"><b>Celular</b></label>
                <label for="inputTime" class="py-1 col-7 col-sm-10 col-form-label"><?php echo $lastRecord->getUserPhone() ?></label>
              </div>              
              <div class="row">
                <label for="inputDate" class="py-1 col-5 col-sm-2 col-form-label" ><b>Fecha</b></label>
                <label for="inputDate" class="py-1 col-7 col-sm-10 col-form-label" ><?php echo $lastRecord->getAssistanceDate() ?></label>
              </div>
              <div class="row">                
                <label for="inputTime" class="py-1 col-5 col-sm-2 col-form-label"><b>Hora</b></label>
                <label for="inputTime" class="py-1 col-7 col-sm-10 col-form-label"><?php echo $lastRecord->getAssistanceStartTime() ?></label>                
              </div>              
            <?php endif; ?>
          </form>

        </div>
      </div>

    </div>
  </div>
</section>