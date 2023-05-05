 <!-- Sidebar -->
 <ul class="navbar-nav bg-dark sidebar sidebar-dark accordion" id="accordionSidebar">

     <!-- Sidebar - Brand -->
     <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= BASE_URL ?>./views/main/index.php">
         <div class="sidebar-brand-icon rotate-n-15">
             <i class="fas fa-laugh-wink"></i>
         </div>
         <div class="sidebar-brand-text mx-3">Electrónica L&L </div>
     </a>

     <!-- Divider -->
     <hr class="sidebar-divider my-0">

     <!-- Nav Item - Dashboard -->
     <li class="nav-item">
         <a class="nav-link" href="<?= BASE_URL ?>./views/admin/index.php">
             <i class="fas fa-fw fa-tachometer-alt"></i>
             <span>Ver Perfil</span>
         </a>
     </li>
     <!-- Divider -->
     <hr class="sidebar-divider">
     <li class="nav-item">
         <a class="nav-link" href="<?= BASE_URL ?>./views/servicios/index.php">
             <i class="fas fa-fw fa-chart-area"></i>
             <span>Servicios</span>
         </a>
     </li>
     <li class="nav-item">
         <a class="nav-link" href="<?= BASE_URL ?>./views/clientes/index.php">
             <i class="fas fa-fw fa-chart-area"></i>
             <span>Clientes</span>
         </a>
     </li>
     <li class="nav-item">
         <a class="nav-link" href="<?= BASE_URL ?>./views/dispositivos/index.php">
             <i class="fas fa-fw fa-chart-area"></i>
             <span>Dispositivos</span>
         </a>
     </li>

     <li class="nav-item">
         <a class="nav-link" href="<?= BASE_URL ?>./views/reportes/index.php">
             <i class="fas fa-fw fa-table"></i>
             <span>Reportes</span></a>
     </li>

 </ul>