<nav class="navbar fixed-top navbar-expand-lg bg-secondary">
  <div class="container-fluid">
    <a class="navbar-brand" href="../../vistas/cliente/index.php"><img src="../../src/images/logo.jpg" alt="Logo" width="70" height="70"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
      
    </button>
    <div class="collapse navbar-collapse" id="navbarScroll">
      <ul class="navbar-nav me-auto my-2 my-lg-0" style="--bs-scroll-height: 100px;">
        <!-- <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../../vistas/cliente/index.php"><i class="bi bi-house-fill me-2"></i>INICIO</a>
        </li> -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-file-person me-2"></i>PACIENTES
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="../../vistas/pacientes/index.php"><i class="bi bi-plus-circle me-2"></i>CREAR</a></li>
            <li><a class="dropdown-item" href="../../vistas/pacientes/buscar.php"><i class="bi bi-search me-2"></i>BUSCAR</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <i class="bi bi-heart-pulse"></i>MEDICOS
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="../../vistas/medicos/index.php"><i class="bi bi-plus-circle me-2"></i>CREAR</a></li>
            <li><a class="dropdown-item" href="../../vistas/medicos/buscar.php"><i class="bi bi-search me-2"></i>BUSCAR</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <i class="bi bi-hospital"></i>CLINICAS
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="../../vistas/clinicas/index.php"><i class="bi bi-plus-circle me-2"></i>CREAR</a></li>
            <li><a class="dropdown-item" href="../../vistas/clinicas/buscar.php"><i class="bi bi-search me-2"></i>BUSCAR</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <i class="bi bi-journal-bookmark"></i>CITAS
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="../../vistas/citas/index.php"><i class="bi bi-plus-circle me-2"></i>CREAR</a></li>
            <li><a class="dropdown-item" href="../../controladores/citas/buscar.php"><i class="bi bi-search me-2"></i>BUSCAR</a></li>
          </ul>
        </li>
    </div>
  </div>
</nav>