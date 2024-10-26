<nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav">
            <a class="nav-link" href="{{ route('dashboard') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                Dashboard
            </a>
            <a class="nav-link" href="{{ route('employees.index') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-user-alt"></i></div>
                Semua Pegawai
            </a>
        </div>
    </div>
    <div class="sb-sidenav-footer">
        <div class="small">Login Sebagai:</div>
        {{ Auth::user()->nama }}
    </div>
</nav>