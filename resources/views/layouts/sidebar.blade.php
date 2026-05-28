<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header position-relative">
            <div class="d-flex justify-content-between align-items-center">
                <a href="/dashboard" class="sidebar-brand-box text-decoration-none">
                    <span class="sidebar-brand-icon">
                        <i data-lucide="shield-check" style="width:22px;height:22px"></i>
                    </span>
                    <span>
                        <p class="sidebar-brand-title">Admin DTKS</p>
                        <span class="sidebar-brand-subtitle">Dunguscariang</span>
                    </span>
                </a>
                <div class="sidebar-toggler x">
                    <a href="#" class="sidebar-hide d-xl-none d-block text-white"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>

        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title">Menu Utama</li>

                <li class="sidebar-item {{ Request::path() == 'dashboard' ? 'active' : '' }}">
                    <a href="/dashboard" class="sidebar-link">
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="sidebar-item {{ Request::path() == 'survei' || Request::is('show/*') || Request::is('survei/*') || Request::path() == 'plus' ? 'active' : '' }}">
                    <a href="/survei" class="sidebar-link">
                        <i class="bi bi-table"></i>
                        <span>Usulan DTKS</span>
                    </a>
                </li>

                @if(auth()->user()->isRw())
                <li class="sidebar-item {{ Request::path() == 'validasi/rw' ? 'active' : '' }}">
                    <a href="/validasi/rw" class="sidebar-link">
                        <i class="bi bi-check2-square"></i>
                        <span>Validasi RW</span>
                    </a>
                </li>
                @endif

                @if(auth()->user()->isKelurahan())
                <li class="sidebar-item {{ Request::path() == 'validasi/kelurahan' ? 'active' : '' }}">
                    <a href="/validasi/kelurahan" class="sidebar-link">
                        <i class="bi bi-patch-check"></i>
                        <span>Validasi Kelurahan</span>
                    </a>
                </li>
                @endif

                @if(auth()->user()->isKelurahan())
                <li class="sidebar-title">Kelurahan</li>

                <li class="sidebar-item {{ Request::path() == 'dtks' || Request::is('dtks/*') ? 'active' : '' }}">
                    <a href="/dtks" class="sidebar-link">
                        <i class="bi bi-search"></i>
                        <span>Cek DTKS</span>
                    </a>
                </li>
                <li class="sidebar-item {{ Request::path() == 'konfirmasi' || Request::is('konfirmasi/*') ? 'active' : '' }}">
                    <a href="/konfirmasi" class="sidebar-link">
                        <i class="bi bi-info-circle"></i>
                        <span>Informasi</span>
                    </a>
                </li>
                <li class="sidebar-item {{ Request::path() == 'admincontrol' || Request::is('admin/*') ? 'active' : '' }}">
                    <a href="/admincontrol" class="sidebar-link">
                        <i class="bi bi-people"></i>
                        <span>Kelola User</span>
                    </a>
                </li>
                @endif

                <li class="sidebar-title">Sistem Akses</li>
                <form action="/logout" method="post">
                    @csrf
                    <li class="sidebar-item">
                        <button type="submit" class="logout-button-modern">
                            <i data-feather="log-out" style="width:18px;height:18px"></i>
                            <span>Logout</span>
                        </button>
                    </li>
                </form>
            </ul>
        </div>

        <div class="sidebar-user-card">
            <div class="sidebar-user-avatar">
                <i data-lucide="user-cog" style="width:20px;height:20px"></i>
            </div>
            <div class="min-width-0">
                <div class="text-white fw-bolder small text-truncate">{{ auth()->user()->name ?? 'Petugas' }}</div>
                <div class="text-muted small text-uppercase">{{ auth()->user()->role ?? '-' }}</div>
            </div>
        </div>
    </div>
</div>
