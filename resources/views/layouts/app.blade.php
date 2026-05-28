<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Dashboard Petugas - Kelurahan Dunguscariang</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/css/main/app.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/main/app-dark.css') }}">
    <link rel="shortcut icon" href="{{ asset('assets/images/logo/favicon.svg') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('assets/images/logo/favicon.png') }}" type="image/png">

    <link rel="stylesheet" href="{{ asset('assets/css/shared/iconly.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/pages/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/extensions/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/pages/datatables.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/custom/admin-modern.css') }}">

    <script src="https://unpkg.com/feather-icons"></script>
    <script src="https://unpkg.com/lucide@latest"></script>

    {{-- leaflet js --}}
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
        integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
        crossorigin="" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-geosearch@3.0.0/dist/geosearch.css" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
        integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448qOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
        crossorigin=""></script>
    <script src="https://unpkg.com/leaflet-geosearch@3.1.0/dist/geosearch.umd.js"></script>
</head>

<body class="admin-modern">
    <div id="app">
        @include('layouts.sidebar')
        <div id="main">
            <header class="admin-topbar">
                <div class="d-flex align-items-center gap-3">
                    <a href="#" class="burger-btn d-block d-xl-none text-white p-2 rounded bg-dark">
                        <i class="bi bi-justify fs-4"></i>
                    </a>
                    <div>
                        <div class="d-flex align-items-center gap-2">
                            <span class="admin-status-dot"></span>
                            <h2 class="mb-0 fs-6 fw-bolder text-white">Sistem Pelayanan Dunguscariang</h2>
                        </div>
                        <small class="text-muted d-none d-sm-block">Akses internal RT, RW, dan Kelurahan</small>
                    </div>
                </div>

                <div class="d-flex align-items-center gap-3">
                    <div class="text-end d-none d-md-block">
                        <div id="live-time" class="fw-bolder text-success font-monospace">{{ now()->format('H:i:s') }}</div>
                        <small id="live-date" class="text-muted text-uppercase">{{ now()->translatedFormat('l, d F Y') }}</small>
                    </div>
                    <div class="d-none d-lg-block" style="width:1px;height:2rem;background:rgba(34,34,64,.85)"></div>
                    <span class="badge bg-dark border border-secondary text-light px-3 py-2">
                        <i data-lucide="award" style="width:14px;height:14px" class="me-1 text-warning"></i>
                        {{ strtoupper(auth()->user()->role ?? 'PETUGAS') }}
                    </span>
                </div>
            </header>

            <div class="admin-shell">
                @yield('content')
            </div>
        </div>
    </div>

    @include('sweetalert::alert')

    <script src="{{ asset('assets/extensions/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/dashboard.js') }}"></script>

    <script src="{{ asset('assets/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/js/app.js') }}"></script>

    <script src="{{ asset('assets/extensions/jquery/jquery.min.js') }}"></script>
    <script src="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.js"></script>
    <script src="{{ asset('assets/js/pages/datatables.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
        integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"
        integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function updateAdminClock() {
            const now = new Date();
            const time = document.getElementById('live-time');
            const date = document.getElementById('live-date');
            if (time) {
                time.textContent = now.toLocaleTimeString('id-ID', { hour12: false });
            }
            if (date) {
                date.textContent = now.toLocaleDateString('id-ID', {
                    weekday: 'long', day: '2-digit', month: 'long', year: 'numeric'
                });
            }
        }
        updateAdminClock();
        setInterval(updateAdminClock, 1000);

        if (window.feather) {
            feather.replace();
        }
        if (window.lucide) {
            lucide.createIcons();
        }
    </script>
    @stack('scripts')
</body>

</html>
