<ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('home') }}">
        <div class="sidebar-brand-icon rotate-n-15"><i class="fas fa-seedling"></i></div>
        <div class="sidebar-brand-text mx-3">Mangrove Health</div>
    </a>

    <hr class="sidebar-divider my-0">

    <li class="nav-item {{ request()->routeIs('home') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('home') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i> <span>Dashboard</span>
        </a>
    </li>

    <hr class="sidebar-divider">

    @role('Admin')
        <div class="sidebar-heading">Master Data</div>
        <li class="nav-item {{ request()->routeIs('jenis.*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('jenis.index') }}">
                <i class="fas fa-fw fa-leaf"></i> <span>Master Jenis Tanaman</span>
            </a>
        </li>
        <li class="nav-item {{ request()->routeIs('users.*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('users.index') }}">
                <i class="fas fa-fw fa-users-cog"></i> <span>Manajemen Pengguna</span>
            </a>
        </li>
        <li class="nav-item {{ request()->routeIs('roles.*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('roles.index') }}">
                <i class="fas fa-user-shield"></i>
                <span>Manajemen Role</span>
            </a>
        </li>
    @endrole

    @role('Admin|Surveyor')
        <div class="sidebar-heading">Data Lapangan</div>
        <li class="nav-item {{ request()->routeIs('klaster.*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('klaster.index') }}">
                <i class="fas fa-fw fa-map-marked-alt"></i> <span>Klaster Plot</span>
            </a>
        </li>
        <li class="nav-item {{ request()->routeIs('pohon.*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('pohon.index') }}">
                <i class="fas fa-fw fa-tree"></i> <span>Data Pohon</span>
            </a>
        </li>
    @endrole

    @role('Surveyor')
        <div class="sidebar-heading">Pengukuran</div>
        @foreach (['pertumbuhan' => 'fa-ruler-vertical', 'tanah' => 'fa-mountain', 'mortalitas' => 'fa-skull-crossbones', 'keanekaragaman' => 'fa-dna', 'kerusakan' => 'fa-exclamation-circle', 'tajuk' => 'fa-cloud-sun'] as $route => $icon)
            <li class="nav-item {{ request()->routeIs("$route.*") ? 'active' : '' }}">
                <a class="nav-link" href="{{ route("$route.index") }}">
                    <i class="fas fa-fw {{ $icon }}"></i> <span>{{ ucfirst($route) }}</span>
                </a>
            </li>
        @endforeach
    @endrole

    @role('Admin|Pengelola')
        <div class="sidebar-heading">Laporan</div>
        <li class="nav-item {{ request()->routeIs('laporan.*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('laporan.index') }}">
                <i class="fas fa-fw fa-file-alt"></i> <span>Laporan</span>
            </a>
        </li>
    @endrole

    <li class="nav-item {{ request()->routeIs('about') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('about') }}">
            <i class="fas fa-fw fa-info-circle"></i> <span>Tentang Aplikasi</span>
        </a>
    </li>

    <hr class="sidebar-divider d-none d-md-block">
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
