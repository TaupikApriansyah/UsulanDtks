<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelurahan Dunguscariang - Portal Pelayanan Publik</title>
    <meta name="description" content="Portal informasi dan layanan warga Kelurahan Dunguscariang, Kecamatan Andir, Kota Bandung.">
    <link rel="icon" type="image/x-icon" href="<?php echo e(asset('favicon.ico')); ?>">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brand: {
                            50: '#f2f8f5',
                            100: '#e1efe7',
                            200: '#c5dfd1',
                            500: '#10b981',
                            600: '#059669',
                            700: '#047857',
                            800: '#065f46',
                            900: '#064e3b',
                        }
                    },
                    fontFamily: {
                        sans: ['Plus Jakarta Sans', 'Inter', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .hero-overlay { background: linear-gradient(90deg, rgba(6, 78, 59, .88), rgba(15, 23, 42, .76)); }
    </style>
</head>
<body class="bg-slate-50 text-slate-800 antialiased min-h-screen flex flex-col">
    <?php echo $__env->make('sweetalert::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <header class="fixed top-0 left-0 w-full z-50 bg-brand-700/95 backdrop-blur-md shadow-md transition-all duration-300" id="main-header">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                <a href="<?php echo e(route('home')); ?>" class="flex items-center space-x-3">
                    <div class="bg-white p-2 rounded-lg shadow-md flex items-center justify-center">
                        <svg class="w-8 h-8 text-brand-700" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                            <path d="M12 2L2 22h20L12 2zm0 3.99L18.53 19H5.47L12 5.99zM11 10h2v4h-2zm0 5h2v2h-2z"/>
                        </svg>
                    </div>
                    <div>
                        <span class="text-xs font-bold text-emerald-300 tracking-wider uppercase block">Pemerintah Kota Bandung</span>
                        <h1 class="text-base sm:text-lg font-extrabold text-white tracking-tight leading-none uppercase">Dunguscariang</h1>
                    </div>
                </a>

                <nav class="hidden md:flex items-center space-x-1">
                    <a href="#beranda" class="px-4 py-2 text-sm font-semibold text-white hover:text-emerald-200 transition-colors rounded-lg">Home</a>
                    <a href="#informasi" class="px-4 py-2 text-sm font-semibold text-white/90 hover:text-white hover:bg-brand-800/50 transition-all rounded-lg">Informasi</a>
                    <a href="#layanan" class="px-4 py-2 text-sm font-semibold text-white/90 hover:text-white hover:bg-brand-800/50 transition-all rounded-lg">Layanan Publik</a>
                    <a href="#kontak" class="px-4 py-2 text-sm font-semibold text-white/90 hover:text-white hover:bg-brand-800/50 transition-all rounded-lg">Contact</a>
                </nav>

                <button id="mobile-menu-btn" type="button" class="md:hidden p-2 rounded-lg text-white hover:bg-brand-800/50 focus:outline-none transition-colors" aria-label="Buka menu">
                    <i data-lucide="menu" id="menu-icon-open" class="w-6 h-6"></i>
                    <i data-lucide="x" id="menu-icon-close" class="w-6 h-6 hidden"></i>
                </button>
            </div>
        </div>

        <div id="mobile-menu" class="hidden md:hidden bg-brand-800 border-t border-brand-900/30">
            <div class="px-4 pt-2 pb-6 space-y-2">
                <a href="#beranda" class="block px-4 py-3 text-base font-semibold text-white hover:bg-brand-700 rounded-lg transition-colors">Home</a>
                <a href="#informasi" class="block px-4 py-3 text-base font-semibold text-white hover:bg-brand-700 rounded-lg transition-colors">Informasi</a>
                <a href="#layanan" class="block px-4 py-3 text-base font-semibold text-white hover:bg-brand-700 rounded-lg transition-colors">Layanan Publik</a>
                <a href="#kontak" class="block px-4 py-3 text-base font-semibold text-white hover:bg-brand-700 rounded-lg transition-colors">Contact</a>
            </div>
        </div>
    </header>

    <main class="flex-grow pt-20">
        <section id="beranda" class="relative min-h-[85vh] flex items-center justify-center overflow-hidden bg-slate-900">
            <div class="absolute inset-0 z-0">
                <div class="absolute inset-0 hero-overlay z-10"></div>
                <img src="<?php echo e(asset('img/DcAsli.jpg')); ?>" alt="Kantor Kelurahan Dunguscariang" class="w-full h-full object-cover object-center scale-105">
            </div>

            <div class="relative z-20 max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-white py-16">
                <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-emerald-500/20 border border-emerald-400/30 text-emerald-300 text-xs sm:text-sm font-semibold tracking-wider uppercase mb-6">
                    <span class="w-2 h-2 rounded-full bg-emerald-400"></span>
                    Portal Informasi Resmi Warga
                </div>

                <h2 class="text-4xl sm:text-6xl font-extrabold tracking-tight mb-4 leading-tight">
                    Kelurahan <span class="text-transparent bg-clip-text bg-gradient-to-r from-emerald-400 via-green-300 to-emerald-200">Dunguscariang</span>
                </h2>

                <p class="text-base sm:text-xl text-slate-200 font-medium max-w-2xl mx-auto mb-10 leading-relaxed">
                    Kecamatan Andir, Kota Bandung. Warga dapat memantau pengumuman dan informasi resmi yang sudah diterbitkan oleh Kelurahan.
                </p>

            </div>

            <div class="absolute bottom-0 left-0 w-full overflow-hidden leading-none z-10">
                <svg class="relative block w-full h-12 text-slate-50" viewBox="0 0 1200 120" preserveAspectRatio="none" fill="currentColor">
                    <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V120H0V0C26.9,8.75,57.05,18.3,90.22,26.85,150.64,42.4,213.11,62.24,321.39,56.44Z"></path>
                </svg>
            </div>
        </section>

        <section id="informasi" class="py-20 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center max-w-2xl mx-auto mb-16">
                    <span class="text-brand-600 text-sm font-bold tracking-widest uppercase">Warta Dunguscariang</span>
                    <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 mt-2">Informasi dan Kegiatan Terbaru</h2>
                    <div class="w-16 h-1.5 bg-brand-600 mx-auto mt-4 rounded-full"></div>
                    <p class="text-slate-600 mt-4">Pengumuman, kegiatan, dan informasi layanan yang dipublikasikan oleh Kelurahan Dunguscariang.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <?php $__empty_1 = true; $__currentLoopData = $konfirmasi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <article class="bg-slate-50 rounded-2xl overflow-hidden border border-slate-100 hover:shadow-xl transition-all duration-300 group flex flex-col h-full">
                            <div class="relative overflow-hidden h-56 bg-slate-200">
                                <span class="absolute top-4 left-4 z-10 bg-brand-700 text-white text-xs font-bold px-3 py-1.5 rounded-full shadow-sm">Informasi</span>
                                <img src="<?php echo e(asset('img/konfirmasi/' . $data->foto)); ?>" alt="Informasi Kelurahan Dunguscariang" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            </div>
                            <div class="p-6 flex-grow flex flex-col justify-between">
                                <div>
                                    <span class="text-xs font-semibold text-slate-500 flex items-center gap-1.5 mb-2">
                                        <i data-lucide="calendar" class="w-3.5 h-3.5"></i> <?php echo e(optional($data->created_at)->format('d M Y') ?? 'Tanggal belum tersedia'); ?>

                                    </span>
                                    <h3 class="font-bold text-xl text-slate-900 group-hover:text-brand-700 transition-colors">Informasi Kelurahan Dunguscariang</h3>
                                    <p class="text-sm text-slate-600 mt-2">Silakan cek pengumuman visual dari Kelurahan untuk mengetahui agenda dan informasi terbaru.</p>
                                </div>
                            </div>
                        </article>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <div class="md:col-span-3 rounded-3xl border border-dashed border-slate-300 bg-slate-50 p-10 text-center">
                            <div class="w-14 h-14 rounded-2xl bg-emerald-50 text-brand-700 flex items-center justify-center mx-auto mb-4">
                                <i data-lucide="info" class="w-7 h-7"></i>
                            </div>
                            <h3 class="text-lg font-bold text-slate-900">Belum Ada Informasi</h3>
                            <p class="text-sm text-slate-500 mt-1">Informasi terbaru akan tampil setelah petugas Kelurahan menambahkan pengumuman.</p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </section>

        <section id="layanan" class="py-20 bg-slate-100">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center max-w-2xl mx-auto mb-16">
                    <span class="text-brand-600 text-sm font-bold tracking-widest uppercase">Pelayanan Publik</span>
                    <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 mt-2">Urus Dokumen Lebih Mudah</h2>
                    <div class="w-16 h-1.5 bg-brand-600 mx-auto mt-4 rounded-full"></div>
                    <p class="text-slate-600 mt-4">Siapkan dokumen dasar sebelum datang ke kantor kelurahan agar proses administrasi lebih cepat.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <?php
                        $layanan = [
                            ['key' => 'domisili', 'icon' => 'user-check', 'title' => 'Surat Keterangan Domisili', 'desc' => 'Untuk keperluan administrasi kerja, usaha, atau kebutuhan domisili.'],
                            ['key' => 'sktm', 'icon' => 'award', 'title' => 'Surat Keterangan Tidak Mampu', 'desc' => 'Untuk permohonan keringanan biaya, beasiswa, atau kebutuhan sosial.'],
                            ['key' => 'kk-ktp', 'icon' => 'users', 'title' => 'Pengantar KK dan KTP', 'desc' => 'Untuk pembaruan data keluarga, KTP rusak, hilang, atau perubahan elemen data.'],
                            ['key' => 'sku', 'icon' => 'briefcase', 'title' => 'Surat Keterangan Usaha', 'desc' => 'Untuk warga yang membutuhkan keterangan usaha mikro atau kecil.'],
                        ];
                    ?>

                    <?php $__currentLoopData = $layanan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-200/50 flex flex-col justify-between">
                            <div>
                                <div class="w-12 h-12 bg-emerald-50 text-brand-700 rounded-xl flex items-center justify-center mb-6">
                                    <i data-lucide="<?php echo e($item['icon']); ?>" class="w-6 h-6"></i>
                                </div>
                                <h3 class="font-bold text-lg text-slate-900 mb-2"><?php echo e($item['title']); ?></h3>
                                <p class="text-sm text-slate-500 leading-relaxed"><?php echo e($item['desc']); ?></p>
                            </div>
                            <button type="button" onclick="openModal('<?php echo e($item['key']); ?>')" class="mt-6 w-full py-2 bg-slate-50 hover:bg-brand-50 hover:text-brand-700 text-slate-700 font-bold text-xs uppercase tracking-wider rounded-lg transition-colors border border-slate-200">
                                Lihat Berkas Syarat
                            </button>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </section>
    </main>

    <footer id="kontak" class="bg-slate-950 text-white border-t border-slate-900 pt-16 pb-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-12 mb-12">
                <div class="md:col-span-2">
                    <div class="flex items-center space-x-3 mb-6">
                        <div class="bg-white p-2 rounded-lg shadow-md flex items-center justify-center">
                            <svg class="w-8 h-8 text-brand-700" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                <path d="M12 2L2 22h20L12 2zm0 3.99L18.53 19H5.47L12 5.99zM11 10h2v4h-2zm0 5h2v2h-2z"/>
                            </svg>
                        </div>
                        <div>
                            <span class="text-xs font-bold text-emerald-400 tracking-wider uppercase block">Pemerintah Kota Bandung</span>
                            <h2 class="text-xl font-extrabold tracking-tight leading-none uppercase">Dunguscariang</h2>
                        </div>
                    </div>
                    <p class="text-sm text-slate-400 leading-relaxed mb-6 max-w-md">
                        Portal informasi warga Kelurahan Dunguscariang untuk membantu akses informasi layanan, pengumuman, dan pemberitahuan resmi dari Kelurahan.
                    </p>
                </div>

                <div>
                    <h3 class="text-base font-bold text-white mb-6 uppercase tracking-wider">Navigasi Cepat</h3>
                    <ul class="space-y-3.5 text-sm text-slate-400">
                        <li><a href="#beranda" class="hover:text-emerald-400 transition-colors">Beranda</a></li>
                        <li><a href="#informasi" class="hover:text-emerald-400 transition-colors">Informasi</a></li>
                        <li><a href="#layanan" class="hover:text-emerald-400 transition-colors">Layanan Publik</a></li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-base font-bold text-white mb-6 uppercase tracking-wider">Kontak dan Alamat</h3>
                    <ul class="space-y-3.5 text-sm text-slate-400">
                        <li class="flex items-start gap-2.5">
                            <i data-lucide="map-pin" class="w-5 h-5 text-emerald-400 shrink-0"></i>
                            <span>Jl. Rajawali Sakti No. 27, Dunguscariang, Kec. Andir, Kota Bandung, Jawa Barat.</span>
                        </li>
                        <li class="flex items-center gap-2.5">
                            <i data-lucide="phone" class="w-5 h-5 text-emerald-400 shrink-0"></i>
                            <span>(022) 1234567</span>
                        </li>
                        <li class="flex items-center gap-2.5">
                            <i data-lucide="mail" class="w-5 h-5 text-emerald-400 shrink-0"></i>
                            <span>kel.dunguscariang@bandung.go.id</span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="border-t border-slate-900 pt-8 flex flex-col sm:flex-row items-center justify-between gap-4 text-xs text-slate-500">
                <p>&copy; <?php echo e(date('Y')); ?> Pemerintah Kelurahan Dunguscariang. Hak Cipta Dilindungi.</p>
                <p>Login petugas hanya melalui alamat khusus <span class="font-semibold text-slate-400">/admin</span>.</p>
            </div>
        </div>
    </footer>

    <div id="service-modal" class="fixed inset-0 bg-slate-950/80 backdrop-blur-sm z-50 flex items-center justify-center p-4 hidden">
        <div class="bg-white rounded-3xl max-w-lg w-full overflow-hidden shadow-2xl border border-slate-100">
            <div class="p-6 sm:p-8 bg-brand-700 text-white flex justify-between items-start">
                <div>
                    <span class="text-xs font-bold text-emerald-300 uppercase tracking-widest block mb-1">Persyaratan Dokumen</span>
                    <h3 id="modal-title" class="text-xl sm:text-2xl font-extrabold leading-tight">Nama Layanan</h3>
                </div>
                <button type="button" onclick="closeModal()" class="p-2 rounded-lg bg-white/10 hover:bg-white/20 transition-colors text-white" aria-label="Tutup">
                    <i data-lucide="x" class="w-5 h-5"></i>
                </button>
            </div>
            <div class="p-6 sm:p-8 space-y-4">
                <p class="text-sm text-slate-500 leading-relaxed">Berikut berkas utama yang perlu disiapkan sebelum datang ke kantor kelurahan.</p>
                <ul id="modal-requirements" class="space-y-3"></ul>
                <div class="p-4 bg-amber-50 rounded-2xl border border-amber-200/50 flex gap-3 mt-4">
                    <i data-lucide="alert-circle" class="w-5 h-5 text-amber-600 shrink-0 mt-0.5"></i>
                    <p class="text-xs text-amber-800 leading-relaxed"><strong>Catatan:</strong> Bawa dokumen asli saat verifikasi di loket pelayanan.</p>
                </div>
            </div>
            <div class="p-6 bg-slate-50 border-t border-slate-100 flex justify-end">
                <button type="button" onclick="closeModal()" class="px-5 py-2.5 bg-slate-200 hover:bg-slate-300 text-slate-800 font-bold rounded-xl text-sm transition-colors">Tutup Panduan</button>
            </div>
        </div>
    </div>

    <script>
        if (window.lucide) {
            lucide.createIcons();
        }

        const mobileMenuBtn = document.getElementById('mobile-menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');
        const iconOpen = document.getElementById('menu-icon-open');
        const iconClose = document.getElementById('menu-icon-close');

        if (mobileMenuBtn) {
            mobileMenuBtn.addEventListener('click', () => {
                mobileMenu.classList.toggle('hidden');
                iconOpen.classList.toggle('hidden');
                iconClose.classList.toggle('hidden');
            });
        }

        window.addEventListener('scroll', () => {
            const header = document.getElementById('main-header');
            if (!header) return;
            if (window.scrollY > 50) {
                header.classList.remove('bg-brand-700/95');
                header.classList.add('bg-brand-800', 'shadow-lg');
            } else {
                header.classList.add('bg-brand-700/95');
                header.classList.remove('bg-brand-800', 'shadow-lg');
            }
        });

        const serviceRequirements = {
            'domisili': {
                title: 'Surat Keterangan Domisili',
                items: ['Surat pengantar RT dan RW.', 'Fotokopi KTP pemohon.', 'Fotokopi Kartu Keluarga.', 'Materai Rp10.000 jika diperlukan.']
            },
            'sktm': {
                title: 'Surat Keterangan Tidak Mampu',
                items: ['Surat pengantar RT dan RW.', 'Fotokopi Kartu Keluarga terbaru.', 'Fotokopi KTP kepala keluarga dan pemohon.', 'Dokumen pendukung sesuai kebutuhan layanan.']
            },
            'kk-ktp': {
                title: 'Pengantar KK dan KTP',
                items: ['Pengantar RT dan RW.', 'KTP asli atau surat kehilangan jika hilang.', 'Kartu Keluarga asli.', 'Dokumen pendukung perubahan data.']
            },
            'sku': {
                title: 'Surat Keterangan Usaha',
                items: ['Surat pengantar RT dan RW.', 'Fotokopi KTP pemohon.', 'Fotokopi Kartu Keluarga.', 'Foto tempat usaha atau pernyataan kepemilikan usaha.']
            }
        };

        function openModal(serviceKey) {
            const modal = document.getElementById('service-modal');
            const title = document.getElementById('modal-title');
            const list = document.getElementById('modal-requirements');
            const data = serviceRequirements[serviceKey];
            if (!modal || !title || !list || !data) return;

            title.textContent = data.title;
            list.innerHTML = '';
            data.items.forEach(item => {
                const li = document.createElement('li');
                li.className = 'flex items-start gap-2 text-sm text-slate-700';
                li.innerHTML = `<i data-lucide="check-square" class="w-5 h-5 text-brand-600 shrink-0 mt-0.5"></i><span>${item}</span>`;
                list.appendChild(li);
            });
            modal.classList.remove('hidden');
            if (window.lucide) lucide.createIcons();
        }

        function closeModal() {
            const modal = document.getElementById('service-modal');
            if (modal) modal.classList.add('hidden');
        }
    </script>
</body>
</html>
<?php /**PATH E:\punya_taupik\usulan_dtks\resources\views/pengguna/index.blade.php ENDPATH**/ ?>