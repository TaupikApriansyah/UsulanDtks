@extends('layouts.app')

@section('content')
@php
    $role = auth()->user()->role ?? 'petugas';
    $roleLabel = strtoupper($role);
    $pendingLabel = auth()->user()->isRt() ? 'Draft & Usulan Saya' : (auth()->user()->isRw() ? 'Menunggu Validasi RW' : 'Menunggu Kelurahan');
@endphp

<div class="modern-banner">
    <div class="d-flex flex-column flex-lg-row justify-content-between align-items-start align-items-lg-center gap-3">
        <div>
            <div class="d-flex align-items-center gap-2 text-success small fw-bolder text-uppercase mb-2" style="letter-spacing:.12em">
                <span>Sistem Digital</span>
                <span>&bull;</span>
                <span>Dashboard</span>
            </div>
            <h1 class="mb-1 fw-black">Dashboard Overview</h1>
            <p class="mb-0 text-muted">Kelola usulan DTKS dengan alur RT, validasi RW, validasi Kelurahan, lalu informasi ke warga.</p>
        </div>
        <div class="d-flex gap-2 flex-wrap">
            <a href="/survei" class="btn btn-primary">
                <i data-feather="table" class="me-1"></i> Lihat Usulan
            </a>
            @if(auth()->user()->isRt())
                <a href="/plus" class="btn btn-outline-primary">
                    <i data-feather="plus" class="me-1"></i> Input Usulan
                </a>
            @endif
        </div>
    </div>
</div>

<div class="row g-4 mb-4">
    <div class="col-12 col-sm-6 col-xl-3">
        <div class="admin-metric-card">
            <div class="admin-metric-icon" style="background:rgba(96,165,250,.10); color:#60a5fa; border:1px solid rgba(96,165,250,.20)">
                <i data-lucide="users" style="width:26px;height:26px"></i>
            </div>
            <div>
                <span class="admin-metric-label">Petugas Aktif</span>
                <h3>{{ $admin }} User</h3>
                <span class="admin-pill" style="background:rgba(16,185,129,.10); color:#34d399; border:1px solid rgba(16,185,129,.18)">Role {{ $roleLabel }}</span>
            </div>
        </div>
    </div>

    <div class="col-12 col-sm-6 col-xl-3">
        <div class="admin-metric-card">
            <div class="admin-metric-icon" style="background:rgba(251,191,36,.10); color:#fbbf24; border:1px solid rgba(251,191,36,.20)">
                <i data-lucide="clipboard-list" style="width:26px;height:26px"></i>
            </div>
            <div>
                <span class="admin-metric-label">Data Usulan</span>
                <h3>{{ $survei }} Berkas</h3>
                <span class="admin-pill" style="background:rgba(251,191,36,.10); color:#fbbf24; border:1px solid rgba(251,191,36,.18)">{{ $pendingLabel }}</span>
            </div>
        </div>
    </div>

    <div class="col-12 col-sm-6 col-xl-3">
        <div class="admin-metric-card">
            <div class="admin-metric-icon" style="background:rgba(16,185,129,.10); color:#34d399; border:1px solid rgba(16,185,129,.20)">
                <i data-lucide="database" style="width:26px;height:26px"></i>
            </div>
            <div>
                <span class="admin-metric-label">Data DTKS</span>
                <h3>{{ $dtks }} Data</h3>
                <span class="admin-pill" style="background:rgba(16,185,129,.10); color:#34d399; border:1px solid rgba(16,185,129,.18)">Referensi warga</span>
            </div>
        </div>
    </div>

    <div class="col-12 col-sm-6 col-xl-3">
        <div class="admin-metric-card">
            <div class="admin-metric-icon" style="background:rgba(192,132,252,.10); color:#c084fc; border:1px solid rgba(192,132,252,.20)">
                <i data-lucide="newspaper" style="width:26px;height:26px"></i>
            </div>
            <div>
                <span class="admin-metric-label">Informasi Aktif</span>
                <h3>{{ $informasi }} Berita</h3>
                <span class="admin-pill" style="background:rgba(192,132,252,.10); color:#c084fc; border:1px solid rgba(192,132,252,.18)">Tayang portal</span>
            </div>
        </div>
    </div>
</div>

<div class="row g-4">
    <div class="col-12 col-xl-8">
        <div class="admin-panel h-100">
            <div class="d-flex justify-content-between align-items-center pb-3 mb-3" style="border-bottom:1px solid rgba(34,34,64,.55)">
                <div>
                    <h3 class="admin-section-title"><i data-lucide="route" class="text-success"></i> Alur Validasi Usulan</h3>
                    <p class="text-muted small mb-0 mt-1">Alur operasional sistem saat ini.</p>
                </div>
                <span class="admin-pill" style="background:rgba(16,185,129,.10); color:#34d399; border:1px solid rgba(16,185,129,.18)">Live</span>
            </div>

            <div class="row g-3">
                <div class="col-12 col-md-3">
                    <div class="p-3 rounded-4 h-100" style="background:#09090e;border:1px solid rgba(34,34,64,.75)">
                        <div class="text-success mb-2"><i data-lucide="edit-3"></i></div>
                        <h6 class="fw-bolder mb-1">RT Input</h6>
                        <p class="text-muted small mb-0">RT mengisi data warga dan mengirim ke RW.</p>
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <div class="p-3 rounded-4 h-100" style="background:#09090e;border:1px solid rgba(34,34,64,.75)">
                        <div class="text-warning mb-2"><i data-lucide="badge-check"></i></div>
                        <h6 class="fw-bolder mb-1">RW Validasi</h6>
                        <p class="text-muted small mb-0">RW menyetujui atau mengembalikan usulan ke RT.</p>
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <div class="p-3 rounded-4 h-100" style="background:#09090e;border:1px solid rgba(34,34,64,.75)">
                        <div class="text-info mb-2"><i data-lucide="landmark"></i></div>
                        <h6 class="fw-bolder mb-1">Kelurahan</h6>
                        <p class="text-muted small mb-0">Kelurahan validasi ulang dan menetapkan hasil final.</p>
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <div class="p-3 rounded-4 h-100" style="background:#09090e;border:1px solid rgba(34,34,64,.75)">
                        <div class="text-primary mb-2"><i data-lucide="send"></i></div>
                        <h6 class="fw-bolder mb-1">Warga Cek</h6>
                        <p class="text-muted small mb-0">Warga melihat hasil setelah informasi dikirim.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 col-xl-4">
        <div class="admin-panel h-100">
            <h3 class="admin-section-title mb-3"><i data-lucide="activity" class="text-success"></i> Ringkasan Sistem</h3>
            <div class="mb-3">
                <div class="d-flex justify-content-between small fw-bold mb-2">
                    <span>Validasi RT ke RW</span><span class="text-success">75%</span>
                </div>
                <div class="admin-progress"><span style="width:75%"></span></div>
            </div>
            <div class="mb-3">
                <div class="d-flex justify-content-between small fw-bold mb-2">
                    <span>Validasi RW ke Kelurahan</span><span class="text-info">65%</span>
                </div>
                <div class="admin-progress"><span style="width:65%;background:linear-gradient(90deg,#2563eb,#60a5fa)"></span></div>
            </div>
            <div>
                <div class="d-flex justify-content-between small fw-bold mb-2">
                    <span>Informasi ke Warga</span><span class="text-warning">50%</span>
                </div>
                <div class="admin-progress"><span style="width:50%;background:linear-gradient(90deg,#d97706,#fbbf24)"></span></div>
            </div>

            <div class="mt-4 p-3 rounded-4" style="background:#09090e;border:1px solid rgba(34,34,64,.75)">
                <div class="d-flex gap-2">
                    <i data-lucide="bell" class="text-warning flex-shrink-0" style="width:20px;height:20px"></i>
                    <p class="small text-muted mb-0"><strong class="text-white">Catatan:</strong> warga hanya bisa melihat hasil akhir setelah Kelurahan klik tombol Kirim Informasi.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
