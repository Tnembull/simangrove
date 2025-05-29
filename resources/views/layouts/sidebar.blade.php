<ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

    {{-- Brand --}}
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('home') }}">
        <div class="sidebar-brand-icon rotate-n-15"><i class="fas fa-seedling"></i></div>
        <div class="sidebar-brand-text mx-3">Mangrove Health</div>
    </a>

    <hr class="sidebar-divider my-0">

    {{-- 🔰 Common --}}
    <li class="nav-item {{ request()->routeIs('home') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('home') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i> <span>Dashboard</span>
        </a>
    </li>
    <li class="nav-item {{ request()->routeIs('about') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('about') }}">
            <i class="fas fa-fw fa-info-circle"></i> <span>About App</span>
        </a>
    </li>

    {{-- 🛠️ Admin Only --}}
    @role('Admin')
    <hr class="sidebar-divider">
    <div class="sidebar-heading">Master Data</div>

    @foreach ([
        ['assessment-parameters.index', 'fa-tasks', 'Assessment Parameters'],
        ['locations.index', 'fa-map', 'Locations'],
        ['units.index', 'fa-layer-group', 'Units & Categories'],
        ['species.index', 'fa-leaf', 'Plant Species'],
        ['roles.index', 'fa-user-shield', 'Roles'],
        ['users.index', 'fa-users-cog', 'Users'],
    ] as [$route, $icon, $label])
        <li class="nav-item {{ request()->routeIs($route) ? 'active' : '' }}">
            <a class="nav-link" href="{{ route($route) }}">
                <i class="fas fa-fw {{ $icon }}"></i> <span>{{ $label }}</span>
            </a>
        </li>
    @endforeach
    @endrole

    {{-- 🌱 Admin & Surveyor --}}
    @role('Admin|Surveyor')
    <hr class="sidebar-divider">
    <div class="sidebar-heading">Field Data</div>

    @foreach ([
        ['measurement-sessions.index', 'fa-map-marked-alt', 'Measurement Sessions'],
        ['plots.index', 'fa-tree', 'Plots'],
        ['plot-points.index', 'fa-th-large', 'Plot Points'],
        ['reference-points.index', 'fa-thumbtack', 'Reference Points'],
    ] as [$route, $icon, $label])
        <li class="nav-item {{ request()->routeIs($route) ? 'active' : '' }}">
            <a class="nav-link" href="{{ route($route) }}">
                <i class="fas fa-fw {{ $icon }}"></i> <span>{{ $label }}</span>
            </a>
        </li>
    @endforeach
    @endrole

    {{-- 🧪 Surveyor Only --}}
    @role('Surveyor')
    <hr class="sidebar-divider">
    <div class="sidebar-heading">Observations</div>

    @foreach ([
        ['growth-observations.index', 'fa-ruler-vertical', 'Growth Observation'],
        ['tajuk.index', 'fa-cloud-sun', 'Crown Condition'],
        ['kerusakan.index', 'fa-exclamation-triangle', 'Damage'],
        ['site-qualities.index', 'fa-mountain', 'Site Quality'],
        ['regeneration-records.index', 'fa-seedling', 'Regeneration'],
        ['mortalities.index', 'fa-skull-crossbones', 'Mortalities'],
        ['fauna-observations.index', 'fa-dna', 'Fauna Observation'],
        ['plot-documents.index', 'fa-file-image', 'Documentation'],
        ['point-assessments.index', 'fa-tasks', 'Point Assessments'],
    ] as [$route, $icon, $label])
        <li class="nav-item {{ request()->routeIs($route) ? 'active' : '' }}">
            <a class="nav-link" href="{{ route($route) }}">
                <i class="fas fa-fw {{ $icon }}"></i> <span>{{ $label }}</span>
            </a>
        </li>
    @endforeach
    @endrole

    {{-- 🧾 Admin & Pengelola --}}
    @role('Admin|Pengelola')
    <hr class="sidebar-divider">
    <div class="sidebar-heading">Management</div>

    @foreach ([
        ['review.index', 'fa-search', 'Review'],
        ['verification.index', 'fa-check-double', 'Verification'],
        ['health-assessments.index', 'fa-heartbeat', 'Health Assessment'],
        ['visualization.index', 'fa-chart-area', 'Visualization'],
    ] as [$route, $icon, $label])
        <li class="nav-item {{ request()->routeIs($route) ? 'active' : '' }}">
            <a class="nav-link" href="{{ route($route) }}">
                <i class="fas fa-fw {{ $icon }}"></i> <span>{{ $label }}</span>
            </a>
        </li>
    @endforeach
    @endrole

    {{-- 📊 Reporting --}}
    @role('Admin|Pengelola')
    <hr class="sidebar-divider">
    <div class="sidebar-heading">Reporting</div>

    @foreach ([
        ['reports.index', 'fa-file-alt', 'Reports'],
        ['export.index', 'fa-file-export', 'Export'],
        ['recap.index', 'fa-table', 'Recap'],
    ] as [$route, $icon, $label])
        <li class="nav-item {{ request()->routeIs($route) ? 'active' : '' }}">
            <a class="nav-link" href="{{ route($route) }}">
                <i class="fas fa-fw {{ $icon }}"></i> <span>{{ $label }}</span>
            </a>
        </li>
    @endforeach
    @endrole

    <hr class="sidebar-divider d-none d-md-block">
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
