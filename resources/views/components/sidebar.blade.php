 <!-- Sidebar -->
 <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
      <div class="sidebar-brand-icon">
        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
      </div>
      <div class="sidebar-brand-text mx-2">{{ Auth::user()->role_id == '1' ? 'Admin' : 'User' }} Dashboard</div>
    </a>
    <hr class="sidebar-divider my-0">
    
    {{-- -------------- Normal User ---------- --}}
    @if (Auth::user()->role_id == 2)
      <li class="nav-item">
        <a class="nav-link" href="/">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/post/create">
          <i class="fab fa-fw fa-wpforms"></i>
          <span>Create Post</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/post">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>All Posts</span></a>
      </li>

    {{-- -------------- Admin ---------- --}}
    @elseif(Auth::user()->role_id == 1) 

      <li class="nav-item">
        <a class="nav-link" href="/">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Admin Dashboard</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUsers" aria-expanded="true"
          aria-controls="collapseUsers">
          <i class="fas fa-user"></i>
          <span>Users</span>
        </a>
        <div id="collapseUsers" class="collapse" aria-labelledby="headingForm" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Users</h6>
            <a class="collapse-item" href="/listUsers/all"><i class="fas fa-users mr-1"></i>All Users</a>
            <a class="collapse-item" href="/headquerters"><i class="fas fa-headset mr-1"></i> Headquerters</a>
            <a class="collapse-item" href="/stations"><i class="far fa-newspaper mr-1"></i>Stations</a>
            <a class="collapse-item" href="/Polices"><i class="far fa-address-card mr-1"></i> Polices</a>
            <a class="collapse-item" href="/Criminals"><i class="far fa-angry mr-1"></i>Criminals</a>
          </div>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseComplaints" aria-expanded="true"
          aria-controls="collapseComplaints">
          <i class="fas fa-newspaper"></i>
          <span>Complaints</span>
        </a>
        <div id="collapseComplaints" class="collapse" aria-labelledby="headingForm" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Complaints</h6>
            <a class="collapse-item" href="/headquerters"><i class="fas fa-exclamation-triangle mr-1"></i> New Complaints</a>
            <a class="collapse-item" href="/headquerters"><i class="fas fa-check-circle mr-1"></i> Resolved Complaints</a>
            <a class="collapse-item" href="/headquerters"><i class="fas fa-ban mr-1"></i> Rejected Complaints</a>
          </div>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="/">
          <i class="fas fa-radiation"></i>
          <span>Crimes</span></a>
      </li>

    @endif

    
        
    
     

    <hr class="sidebar-divider">
 
    
  </ul>
  <!-- Sidebar -->