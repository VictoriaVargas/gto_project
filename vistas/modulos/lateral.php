<?php 
  $tipousuario = $_SESSION["type_user"];
?>
<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/argon-dashboard/pages/dashboard.html " target="_blank">
        <img src="vistas/assets/img/logogto.jpeg" class="navbar-brand-img h-100" >
        <span class="ms-1 font-weight-bold">Mejor Atención y Servicio</span>
      </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <?php 
        if($tipousuario==1){
          echo '<li class="nav-item">
          <a class="nav-link active" href="inicio">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-chart-pie-35 text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="solicitudesinternos">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-folder-17 text-warning text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Solicitudes Internos</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="solicitudesexternos">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-folder-17 text-success text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Solicitudes Externos</span>
          </a>
        </li>';
        }else
        if($tipousuario==2){
          echo '
        <li class="nav-item">
          <a class="nav-link " href="solicitudesinternos">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-folder-17 text-warning text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Solicitudes Internos</span>
          </a>
        </li>';
        }else
        if($tipousuario==3){
          echo '
        <li class="nav-item">
          <a class="nav-link " href="solicitudesexternos">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-folder-17 text-success text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Solicitudes Externos</span>
          </a>
        </li>';
        }
        ?>
        
                
      </ul>
    </div>
   
  </aside>