 <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
   <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('home') }}">
     <div class="sidebar-brand-icon rotate-n-15">
       TT
     </div>
     <div class="sidebar-brand-text mx-3">TimeTable</div>
   </a>

   <!-- Divider -->
   <hr class="sidebar-divider my-0">

   <!-- Nav Item - Dashboard -->
   <li class="nav-item active">
     <a class="nav-link" href="{{ route('home') }}">
       <i class="fas fa-fw fa-tachometer-alt"></i>
       <span>Dashboard</span></a>
   </li>

   <!-- Divider -->
   <hr class="sidebar-divider">

   <!-- Heading -->
   <div class="sidebar-heading">
     Usuários
   </div>

   <!-- Nav Item - Pages Collapse Menu -->
   <li class="nav-item">
     <a class="nav-link" href="{{ route('usuarios.get') }}">
       <i class="fas fa-users"></i>
       <span>Usuários</span></a>
   </li>

   <!-- Divider -->
   <hr class="sidebar-divider">

   <!-- Heading -->
   <div class="sidebar-heading">
     Professores
   </div>

   <!-- Nav Item - Pages Collapse Menu -->
   <li class="nav-item">
     <a class="nav-link" href="{{ route('professores.get') }}">
       <i class="fas fa-user-graduate"></i>
       <span>Professores</span></a>
   </li>

   <!-- Divider -->
   <hr class="sidebar-divider">

   <!-- Heading -->
   <div class="sidebar-heading">
     Lições
   </div>

   <!-- Nav Item - Pages Collapse Menu -->
   <li class="nav-item">
     <a class="nav-link" href="{{ route('licoes.get') }}">
       <i class="fas fa-book"></i>
       <span>Lições</span></a>
   </li>

   <!-- Divider -->
   <hr class="sidebar-divider d-none d-md-block">

  <!-- Heading -->
  <div class="sidebar-heading">
    Modulos
  </div>

   <!-- Nav Item - Pages Collapse Menu -->
   <li class="nav-item">
     <a class="nav-link" href="{{ route('modulos.get') }}">
       <i class="fas fa-book"></i>
       <span>Modulos</span></a>
   </li>

   <!-- Divider -->
   <hr class="sidebar-divider d-none d-md-block">

    <!-- Heading -->
    <div class="sidebar-heading">
      Modulos
    </div>

   <!-- Nav Item - Pages Collapse Menu -->
   <li class="nav-item">
     <a class="nav-link" href="{{ route('classes.get') }}">
     <i class="fas fa-book"></i>
       <span>Classes</span></a>
   </li>

   <!-- Divider -->
   <hr class="sidebar-divider d-none d-md-block">

   <!-- Sidebar Toggler (Sidebar) -->
   <div class="text-center d-none d-md-inline">
     <button class="rounded-circle border-0" id="sidebarToggle"></button>
   </div>
 </ul>
