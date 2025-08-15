<!-- Horizontal Menu Start -->
<header class="topnav">
    <nav class="navbar navbar-expand-lg">
        <nav class="page-container">
            <div class="collapse navbar-collapse" id="topnav-menu-content">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown hover-dropdown">
                        <a class="nav-link dropdown-toggle drop-arrow-none" href="/">
                            <span class="menu-icon"><i class="ti ti-dashboard"></i></span>
                            <span class="menu-text"> Dashboard </span>
                        </a>
                    </li>

                    <li class="nav-item dropdown hover-dropdown">
                        <a class="nav-link dropdown-toggle drop-arrow-none" href="#" id="topnav-apps" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="menu-icon"><i class="ti ti-apps"></i></span>
                            <span class="menu-text">Menu</span>
                            <div class="menu-arrow"></div>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="topnav-apps">
                           <a href="{{ route('laporan-renaksi.index') }}" class="dropdown-item">Laporan Renaksi</a>
                           <a href="{{ route('units.index') }}" class="dropdown-item">Manage Units</a>
                           <a href="{{ route('categories.index') }}" class="dropdown-item">Manage Categories</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </nav>
</header>
<!-- Horizontal Menu End -->
