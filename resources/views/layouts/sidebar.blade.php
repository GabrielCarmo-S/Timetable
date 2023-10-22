 <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar">
   <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('home') }}">
     <div class="sidebar-brand-icon" id="logoMini">
       <img title="Logo da Empresa" height="26px" width="100%" src="{{ asset('img/imo.svg') }}">
     </div>
     <div class="sidebar-brand-text mx-3" id="LogoFull">
       <img title="Logo da Empresa" height="40px" width="100%" src="{{ asset('img/imo_total.svg') }}">
     </div>
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
     Cursos
   </div>

   <!-- Nav Item - Pages Collapse Menu -->
   <li class="nav-item">
     <a class="nav-link" href="{{ route('cursos.get') }}">
       <i class="fas fa-book"></i>
       <span>Cursos</span></a>
   </li>

   <!-- Divider -->
   <hr class="sidebar-divider">

   <!-- Heading -->
   <div class="sidebar-heading">
     Aulas
   </div>

   <!-- Nav Item - Pages Collapse Menu -->
   <li class="nav-item">
     <a class="nav-link" href="{{ route('aulas.get') }}">
       <i class="fas fa-book"></i>
       <span>Aulas</span></a>
   </li>

   <!-- Divider -->
   <hr class="sidebar-divider d-none d-md-block">

   <!-- Sidebar Toggler (Sidebar) -->
   <div class="text-center d-none d-md-inline">
     <button class="rounded-circle border-0" id="sidebarToggle"></button>
   </div>
 </ul>
