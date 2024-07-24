<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Asistencia <?php echo $collegeName->getCollegeName() ?></title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/dashboard/img/favicon.png" rel="icon">
  <link href="assets/dashboard/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/dashboard/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/dashboard/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/dashboard/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/dashboard/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/dashboard/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/dashboard/vendor/remixicon/remixicon.css" rel="stylesheet">
  
  <!-- DataTable -->
  <link rel="stylesheet" href="assets/dashboard/vendor/data-tables/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="assets/dashboard/vendor/data-tables/css/buttons.dataTables.min.css">
  <link rel="stylesheet" href="assets/dashboard/vendor/data-tables/css/select.dataTables.min.css">
  <link rel="stylesheet" href="assets/dashboard/vendor/data-tables/css/rowReorder.dataTables.min.css">
  <link rel="stylesheet" href="assets/dashboard/vendor/data-tables/css/responsive.dataTables.min.css">
  <!-- <link href="assets/dashboard/vendor/simple-datatables/style.css" rel="stylesheet"> -->
  <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
  <link rel="" href="https://cdn.datatables.net/fixedheader/3.1.6/css/fixedHeader.dataTables.min.css"> -->

  <!-- Template Main CSS File -->
  <link href="assets/dashboard/css/style.css" rel="stylesheet">
  
  <!-- Estilos Personalizados -->
  <link href="assets/dashboard/css/styles.css" rel="stylesheet">
    
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="?c=Dashboard" class="logo d-flex align-items-end">
        <img src="assets/dashboard/img/logo.png" alt="">
        <span class="d-none d-lg-block"><?php echo $collegeName->getCollegeName() ?></span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Buscar" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div><!-- End Search Bar -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

        <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-bell"></i>
            <span class="badge bg-primary badge-number">4</span>
          </a><!-- End Notification Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
            <li class="dropdown-header">
              Usted tiene 4 notificaciones
              <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">Ver todas</span></a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-exclamation-circle text-warning"></i>
              <div>
                <h4>Notificación 4</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>30 minutos atrás</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-x-circle text-danger"></i>
              <div>
                <h4>Notificación 3</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>1 hora atrás</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-check-circle text-success"></i>
              <div>
                <h4>Notificación 2</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>2 horas atrás</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-info-circle text-primary"></i>
              <div>
                <h4>Notificación 1</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>4 horas atrás</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>
            <li class="dropdown-footer">
              <a href="#">Mostrar todas las notificaciones</a>
            </li>

          </ul><!-- End Notification Dropdown Items -->

        </li><!-- End Notification Nav -->

        <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-chat-left-text"></i>
            <span class="badge bg-success badge-number">3</span>
          </a><!-- End Messages Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
            <li class="dropdown-header">
              Usted tiene 3 Mensajes sin Leer
              <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">Ver Todos</span></a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="assets/dashboard/img/messages-1.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>Pepita Mendieta</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>4 horas atrás</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="assets/dashboard/img/messages-2.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>Rosita Cuestas</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>6 horas atrás</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="assets/dashboard/img/messages-3.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>Pedro Infante</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>8 horas atrás</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="dropdown-footer">
              <a href="#">Mostrar todas los mensajes</a>
            </li>

          </ul><!-- End Messages Dropdown Items -->

        </li><!-- End Messages Nav -->

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="assets/dashboard/img/profile-img.jpg" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $profile->getUserName() ?></span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?php echo $profile->getUserName() ?></h6>
              <span><?php echo ucfirst($session)?></span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="?c=Dashboard">
                <i class="bi bi-person"></i>
                <span>Perfil</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="?c=Dashboard">
                <i class="bi bi-gear"></i>
                <span>Configuración</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="?c=Dashboard">
                <i class="bi bi-question-circle"></i>
                <span>¿Ayuda?</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a href="?c=Logout" class="dropdown-item d-flex align-items-center">
                <i class="bi bi-box-arrow-right"></i>
                <span>Cerrar Sesión</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="?c=Dashboard">
          <i class="bi bi-grid"></i>
          <span>Panel de Control</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="?c=Dashboard">
          <i class="bi bi-person"></i>
          <span>Perfil</span>
        </a>
      </li><!-- End Profile Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-bank2"></i><span>Colegio</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="?c=Colleges&a=collegeRead">
              <i class="bi bi-circle"></i><span>Colegio</span>
            </a>
          </li>
          <li>
            <a href="?c=Colleges&a=journeRead">
              <i class="bi bi-circle"></i><span>Jornadas</span>
            </a>
          </li>
          <li>
            <a href="?c=Colleges&a=gradeRead">
              <i class="bi bi-circle"></i><span>Grados</span>
            </a>
          </li>
          <li>
            <a href="?c=Colleges&a=courseCreate">
              <i class="bi bi-circle"></i><span>Grupos</span>
            </a>
          </li>
          <li>
            <a href="?c=Colleges&a=collegeCreate">
              <i class="bi bi-circle"></i><span>Consultar Colegio</span>
            </a>
          </li>
        </ul>
      </li><!-- End Components Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-people-fill"></i><span>Usuarios</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="?c=Users&a=rolCreate">
              <i class="bi bi-circle"></i><span>Registrar Rol</span>
            </a>
          </li>          <li>
            <a href="?c=Users&a=userCreate">
              <i class="bi bi-circle"></i><span>Registrar Usuario</span>
            </a>
          </li>
          <li>
            <a href="?c=Users&a=rolRead">
              <i class="bi bi-circle"></i><span>Consultar Roles</span>
            </a>
          </li>
          <li>
            <a href="?c=Users&a=userRead">
              <i class="bi bi-circle"></i><span>Consultar Usuarios</span>
            </a>
          </li>          
        </ul>
      </li><!-- End Forms Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-layout-text-window-reverse"></i><span>Asistencia</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="?c=Assistances&a=assistanceCreate">
              <i class="bi bi-circle"></i><span>Registrar Asistencia</span>
            </a>
          </li>
          <li>
            <a href="?c=Assistances&a=assistanceRead">
              <i class="bi bi-circle"></i><span>Consultar Asistencias</span>
            </a>
          </li>          
        </ul>
      </li><!-- End Tables Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-bar-chart"></i><span>Reportes Gráficos</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="?c=Dashboard">
              <i class="bi bi-circle"></i><span>Crear Reporte General</span>              
            </a>
            <a href="?c=Dashboard">              
              <i class="bi bi-circle"></i><span>Crear Reporte Específico</span>
            </a>
          </li>          
        </ul>
      </li><!-- End Charts Nav -->
      
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#print-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-file-earmark"></i><span>Reportes Impresos</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="print-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="?c=Dashboard">
              <i class="bi bi-circle"></i><span>Crear Reporte General</span>              
            </a>
            <a href="?c=Dashboard">              
              <i class="bi bi-circle"></i><span>Crear Reporte Específico</span>
            </a>
          </li>          
        </ul>
      </li><!-- End Charts Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="?c=Logout">
          <i class="bi bi-box-arrow-in-right"></i>
          <span>Cerrar Sesión</span>
        </a>
      </li><!-- End Login Page Nav -->

    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main captura-id">