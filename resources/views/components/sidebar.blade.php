 <!-- Sidebar -->
 <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
      <div class="sidebar-brand-icon">
        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
      </div>
      <div class="sidebar-brand-text mx-3">User Dashboard</div>
    </a>
    <hr class="sidebar-divider my-0">
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
    @elseif(Auth::user()->role_id == 1)
      <li class="nav-item">
        <a class="nav-link" href="/">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Admin Dashboard</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/showUsers">
          <i class="fas fa-fw fa-columns"></i>
          <span>Show all Users</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/showAllPosts">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Show all Posts</span></a>
      </li>
    @endif

    
        
    
     

    <hr class="sidebar-divider">
 
    
  </ul>
  <!-- Sidebar -->