 <!-- Sidebar -->
 <ul class="navbar-nav bg-dark sidebar sidebar-dark accordion " id="accordionSidebar">

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
             <i class="fas fa-fw fa-tachometer-alt "> <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-person-fill-lock" viewBox="0 0 16 16">
                     <path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm-9 8c0 1 1 1 1 1h5v-1a1.9 1.9 0 0 1 .01-.2 4.49 4.49 0 0 1 1.534-3.693C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4Zm7 0a1 1 0 0 1 1-1v-1a2 2 0 1 1 4 0v1a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-4a1 1 0 0 1-1-1v-2Zm3-3a1 1 0 0 0-1 1v1h2v-1a1 1 0 0 0-1-1Z" />
                 </svg></i>Ver Perfil 
         </a>
     </li>
     <!-- Divider -->
     <hr class="sidebar-divider">
     <li>
         <div class="dropdownlink text-light"><i class="ml-3" aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-clipboard-plus-fill" viewBox="0 0 16 16">
                     <path d="M6.5 0A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3Zm3 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3Z" />
                     <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1A2.5 2.5 0 0 1 9.5 5h-3A2.5 2.5 0 0 1 4 2.5v-1Zm4.5 6V9H10a.5.5 0 0 1 0 1H8.5v1.5a.5.5 0 0 1-1 0V10H6a.5.5 0 0 1 0-1h1.5V7.5a.5.5 0 0 1 1 0Z" />
                 </svg></i>     Servicios
             <i class="fa fa-chevron-down ml-5" aria-hidden="true"></i>
         </div>
         <ul class="submenuItems ">
            <ul>
 <!-- aqui julian la cago -->
                <li><a href="<?= BASE_URL ?>./views/servicios/index.php " class="text-light text-decoration-none">Crear Servicios</a></li>
                <li><a href="#" class="text-light text-decoration-none">Consultar Servicios</a></li>
            </ul>
         </ul>
     </li>
     <li>
         <div class="dropdownlink text-light"><i class="ml-3" aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
                     <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7Zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216ZM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z" />
                 </svg></i>  Clientes
             <i class="fa fa-chevron-down ml-5" aria-hidden="true"></i>
         </div>
         <ul class="submenuItems">
            <ul>
                 <li><a href="<?= BASE_URL ?>./views/clientes/create.php" class="text-light text-decoration-none" >Crear Clinte</a></li>
                 <li><a href="<?= BASE_URL ?>./views/clientes/index.php" class="text-light text-decoration-none" >Consultar Clintes</a></li>
            </ul>
         </ul>
     </li>
     <li>
         <div class="dropdownlink text-light"><i class="ml-3" aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-motherboard" viewBox="0 0 16 16">
                     <path d="M11.5 2a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5Zm2 0a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5Zm-10 8a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1h-6Zm0 2a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1h-6ZM5 3a1 1 0 0 0-1 1h-.5a.5.5 0 0 0 0 1H4v1h-.5a.5.5 0 0 0 0 1H4a1 1 0 0 0 1 1v.5a.5.5 0 0 0 1 0V8h1v.5a.5.5 0 0 0 1 0V8a1 1 0 0 0 1-1h.5a.5.5 0 0 0 0-1H9V5h.5a.5.5 0 0 0 0-1H9a1 1 0 0 0-1-1v-.5a.5.5 0 0 0-1 0V3H6v-.5a.5.5 0 0 0-1 0V3Zm0 1h3v3H5V4Zm6.5 7a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h2a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-2Z" />
                     <path d="M1 2a2 2 0 0 1 2-2h11a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-2H.5a.5.5 0 0 1-.5-.5v-1A.5.5 0 0 1 .5 9H1V8H.5a.5.5 0 0 1-.5-.5v-1A.5.5 0 0 1 .5 6H1V5H.5a.5.5 0 0 1-.5-.5v-2A.5.5 0 0 1 .5 2H1Zm1 11a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v11Z" />
                 </svg></i>     Dispositivos
             <i class="fa fa-chevron-down ml-4" aria-hidden="true"></i>
         </div>
         <ul class="submenuItems">
            <ul>
                <li><a href="<?= BASE_URL ?>./views/dispositivos/index.php" class="text-light text-decoration-none " >Ver Dispositivos</a></li>
            </ul>
          </ul>
     </li>
     <li>
         <div class=" dropdownlink text-light"><i class="ml-3" aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-table" viewBox="0 0 16 16">
                             <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm15 2h-4v3h4V4zm0 4h-4v3h4V8zm0 4h-4v3h3a1 1 0 0 0 1-1v-2zm-5 3v-3H6v3h4zm-5 0v-3H1v2a1 1 0 0 0 1 1h3zm-4-4h4V8H1v3zm0-4h4V4H1v3zm5-3v3h4V4H6zm4 4H6v3h4V8z" />
                         </svg></i>     Reportes
                     <i class="fa fa-chevron-down ml-5" aria-hidden="true"></i>
         </div>
                     <ul class="submenuItems">
                        <ul>

                            <li><a href="<?= BASE_URL ?>./views/reportes/index.php" class="text-light text-decoration-none" >Ver Reportes</a></li>
                            <li><a href="<?= BASE_URL ?>./views/facturas/create.php" class="text-light text-decoration-none" >Crear Factura</a></li>
                            <li><a href= "<?= BASE_URL ?>./views/facturas/index.php" class="text-light text-decoration-none" >Ver Factura</a></li>
                        </ul>
                    </ul>
     </li>

      
 



 </ul>