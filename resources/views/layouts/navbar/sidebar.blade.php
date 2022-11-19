
<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">

  <li class="nav-item">
    <a class="nav-link {{ $activePage == 'dashboard' ? '' : 'collapsed' }}" href="/home">
      <i class="bi bi-grid"></i>
      <span>Dashboard</span>
    </a>
  </li><!-- End Dashboard Nav -->

  <!-- <li class="nav-heading">Pages</li> -->

  <li class="nav-item">
    <a class="nav-link {{ $activePage == 'inventori' ? '' : 'collapsed' }}" href="/inventori">
      <i class="bi bi-archive-fill"></i>
      <span>Inventori</span>
    </a>
  </li><!-- End Inventori Page Nav -->

  <li class="nav-item">
    <a class="nav-link {{ $activePage == 'inspeksi' ? '' : 'collapsed' }}" href="/inspeksi">
      <i class="bi bi-journal-text"></i>
      <span>Inspeksi</span>
    </a>
  </li><!-- End Data Inspeksi Page Nav -->

  <li class="nav-item">
    <a class="nav-link {{ $activePage == 'akun' ? '' : 'collapsed' }}" href="/akun">
      <i class="bx bxs-user-rectangle"></i>
      <span>Akun</span>
    </a>
  </li><!-- End Data User Page Nav -->
  
  <li class="nav-item">
    <a class="nav-link collapsed" onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
    <i class="bi bi-box-arrow-right"></i>
      <span>Keluar</span>
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>

  </li><!-- End Profile Page Nav -->

</ul>

</aside><!-- End Sidebar-->