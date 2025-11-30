<ul class="navbar-nav" id="navbar-nav">
    <li class="menu-title"><span data-key="t-menu">Menu</span></li>
    <li class="nav-item">
        <a class="nav-link menu-link" href="#sidebarDashboards" data-bs-toggle="collapse" role="button"
            aria-expanded="false" aria-controls="sidebarDashboards">
            <i class="ri-home-2-line"></i> <span data-key="t-dashboards">Home</span>
        </a>
        <div class="collapse menu-dropdown" id="sidebarDashboards">
            <ul class="nav nav-sm flex-column">
                <li class="nav-item">
                    <a href="{{ route('opd') }}" class="nav-link" data-key="t-analytics">
                        OPD </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('jabatan') }}" class="nav-link" data-key="t-crm"> Jabatan </a>
                </li>

            </ul>
        </div>
    </li> <!-- end Dashboard Menu -->


























</ul>
