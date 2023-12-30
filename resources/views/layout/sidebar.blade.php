  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="{{Request::is('dashboard')?'nav-link':'nav-link collapsed'}}" href="{{ route('dashboard') }}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="{{request()->routeIs('buku', 't_buku', 'e_buku')?'nav-link':'nav-link collapsed'}}" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-layout-text-window-reverse"></i><span>Products</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="{{request()->routeIs('buku', 't_buku', 'e_buku')?'nav-content collapse show':'nav-content collapse'}}" data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route('buku') }}" class="{{request()->routeIs('buku', 't_buku', 'e_buku')?'active':''}}">
              <i class="bi bi-circle"></i><span>Daftar Buku</span>
            </a>
          </li>
        </ul>
      </li><!-- End Tables Nav -->

      <li class="nav-item">
        <a class="{{request()->routeIs('dataUser')?'nav-link':'nav-link collapsed'}}" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-person-badge"></i><span>Pengelolaan User</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="icons-nav" class="{{request()->routeIs('dataUser')?'nav-content collapse show':'nav-content collapse'}}" data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route('dataUser') }}" class="{{request()->routeIs('dataUser')?'active':''}}">
              <i class="bi bi-circle"></i><span>Data User</span>
            </a>
          </li>
        </ul>
      </li><!-- End Icons Nav -->

      <li class="nav-heading">Other</li>

      <li class="nav-item">
        <a class="{{Request::is('profile')?'nav-link':'nav-link collapsed'}}" href="{{ route('profil') }}">
          <i class="bi bi-person"></i>
          <span>Profile</span>
        </a>
      </li><!-- End Profile Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('logout') }}">
          <i class="bi bi-box-arrow-right"></i>
          <span>Sign Out</span>
        </a>
      </li>
      <!-- End Login Page Nav -->

    </ul>

  </aside><!-- End Sidebar-->
