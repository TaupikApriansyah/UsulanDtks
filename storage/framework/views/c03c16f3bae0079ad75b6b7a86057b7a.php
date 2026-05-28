<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title>Login Petugas - Kelurahan Dunguscariang</title>
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
                            900: '#064e3b'
                        }
                    },
                    fontFamily: {
                        sans: ['Plus Jakarta Sans', 'Inter', 'sans-serif']
                    }
                }
            }
        }
    </script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="<?php echo e(asset('assets/images/logo/favicon.svg')); ?>" type="image/x-icon">
    <link rel="shortcut icon" href="<?php echo e(asset('assets/images/logo/favicon.png')); ?>" type="image/png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
    </style>
</head>
<body class="min-h-screen bg-gradient-to-tr from-[#f3f7fc] via-[#eef3f9] to-[#e4eef6] text-slate-800 antialiased">
    <?php echo $__env->make('sweetalert::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <main class="min-h-screen flex items-center justify-center px-4 py-10 relative overflow-hidden">
        <div class="absolute -top-40 -right-40 w-96 h-96 bg-indigo-200/30 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute -bottom-40 -left-40 w-96 h-96 bg-emerald-200/20 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute top-24 left-1/2 -translate-x-1/2 w-[32rem] h-[32rem] bg-white/35 rounded-full blur-3xl pointer-events-none"></div>

        <section class="max-w-md w-full relative z-10">
            <div class="text-center mb-10">
                <a href="/" class="inline-flex items-center justify-center p-3 bg-white rounded-2xl shadow-md border border-slate-100/60 mb-4 hover:scale-105 transition-transform" aria-label="Kembali ke portal warga">
                    <i data-lucide="lock" class="w-6 h-6 text-[#4f46e5]"></i>
                </a>
                <p class="text-xs font-extrabold text-brand-700 tracking-[0.2em] uppercase mb-2">Portal Internal Kelurahan</p>
                <h1 class="text-3xl font-extrabold text-[#0f172a] tracking-tight">Admin DTKS</h1>
                <p class="text-sm text-slate-500 mt-2 font-medium">Masuk dengan akun RT, RW, atau Kelurahan untuk mengelola pelayanan publik.</p>
            </div>

            <div class="bg-white/80 backdrop-blur-xl rounded-[32px] p-8 sm:p-10 shadow-2xl shadow-slate-300/60 border border-white/60 relative overflow-hidden">
                <div class="absolute inset-x-0 top-0 h-1.5 bg-gradient-to-r from-[#4f46e5] via-[#6366f1] to-brand-500"></div>

                <div class="mb-8 p-4 bg-indigo-50/70 backdrop-blur-sm rounded-2xl border border-indigo-100/80 text-[11px] text-[#312e81] leading-relaxed">
                    <p class="font-bold flex items-center gap-1.5">
                        <i data-lucide="info" class="w-4 h-4 text-[#4f46e5]"></i>
                        Akses akun petugas
                    </p>
                    <p class="mt-2 text-indigo-900/80">Gunakan email dan kata sandi resmi untuk role Kelurahan, RW, atau RT. Halaman ini hanya dapat diakses lewat URL <span class="font-mono font-bold bg-[#e0e7ff] text-[#4f46e5] px-1.5 py-0.5 rounded">/admin</span>.</p>
                </div>

                <?php if($errors->any()): ?>
                    <div class="mb-6 p-4 rounded-2xl bg-rose-50 border border-rose-100 text-rose-700 text-xs font-semibold flex gap-2">
                        <i data-lucide="alert-triangle" class="w-4 h-4 shrink-0 mt-0.5"></i>
                        <div>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <p><?php echo e($error); ?></p>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                <?php endif; ?>

                <form action="/postlogin" method="post" class="space-y-6">
                    <?php echo csrf_field(); ?>
                    <div class="space-y-1.5">
                        <label for="email" class="block text-xs font-bold text-slate-600 uppercase tracking-wider ml-1">Email Petugas</label>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400 group-focus-within:text-[#4f46e5] transition-colors">
                                <i data-lucide="user" class="w-4 h-4"></i>
                            </div>
                            <input
                                type="email"
                                id="email"
                                name="email"
                                value="<?php echo e(old('email')); ?>"
                                placeholder="Masukkan email petugas..."
                                required
                                autocomplete="email"
                                class="block w-full pl-11 pr-4 py-3.5 bg-slate-50/50 border border-slate-200/80 rounded-2xl focus:outline-none focus:bg-white focus:border-[#4f46e5] focus:ring-4 focus:ring-[#4f46e5]/10 text-slate-800 font-medium placeholder-slate-400 text-sm transition-all shadow-inner"
                            >
                        </div>
                    </div>

                    <div class="space-y-1.5">
                        <label for="password" class="block text-xs font-bold text-slate-600 uppercase tracking-wider ml-1">Kata Sandi</label>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400 group-focus-within:text-[#4f46e5] transition-colors">
                                <i data-lucide="key-round" class="w-4 h-4"></i>
                            </div>
                            <input
                                type="password"
                                id="password"
                                name="password"
                                placeholder="••••••••"
                                required
                                autocomplete="current-password"
                                class="block w-full pl-11 pr-12 py-3.5 bg-slate-50/50 border border-slate-200/80 rounded-2xl focus:outline-none focus:bg-white focus:border-[#4f46e5] focus:ring-4 focus:ring-[#4f46e5]/10 text-slate-800 font-medium placeholder-slate-400 text-sm transition-all shadow-inner"
                            >
                            <button type="button" id="toggle-password" class="absolute inset-y-0 right-0 pr-4 flex items-center text-slate-400 hover:text-[#4f46e5] transition-colors" aria-label="Tampilkan atau sembunyikan password">
                                <i data-lucide="eye" class="w-4 h-4" id="password-eye"></i>
                            </button>
                        </div>
                    </div>

                    <div class="flex items-center justify-between pt-1">
                        <label class="flex items-center cursor-pointer select-none">
                            <input type="checkbox" name="remember" value="1" class="w-4 h-4 text-[#4f46e5] border-slate-300 rounded focus:ring-[#4f46e5]/20 cursor-pointer">
                            <span class="ml-2.5 text-xs text-slate-500 font-semibold">Ingat saya di perangkat ini</span>
                        </label>
                    </div>

                    <button type="submit" class="w-full bg-gradient-to-r from-[#4f46e5] to-[#6366f1] hover:from-[#4338ca] hover:to-[#4f46e5] text-white font-bold py-4 rounded-2xl transition-all shadow-lg shadow-indigo-600/25 hover:shadow-indigo-600/35 active:scale-[0.98] flex items-center justify-center gap-2 text-sm tracking-wide">
                        <i data-lucide="log-in" class="w-4 h-4"></i>
                        Masuk Sekarang
                    </button>
                </form>
            </div>

            <div class="text-center mt-8 space-y-3">
                <p class="text-xs text-slate-500 font-semibold flex items-center justify-center gap-1.5">
                    <i data-lucide="help-circle" class="w-4 h-4 text-slate-400"></i>
                    Butuh bantuan akses? <a href="/#kontak" class="text-[#4f46e5] hover:underline font-bold">Hubungi Administrator</a>
                </p>
                <a href="/" class="inline-flex items-center gap-1.5 text-xs text-brand-700 hover:text-brand-800 font-extrabold">
                    <i data-lucide="arrow-left" class="w-4 h-4"></i>
                    Kembali ke portal warga
                </a>
            </div>
        </section>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        const togglePassword = document.getElementById('toggle-password');
        const passwordInput = document.getElementById('password');

        togglePassword?.addEventListener('click', function () {
            const isPassword = passwordInput.type === 'password';
            passwordInput.type = isPassword ? 'text' : 'password';
            this.innerHTML = isPassword
                ? '<i data-lucide="eye-off" class="w-4 h-4"></i>'
                : '<i data-lucide="eye" class="w-4 h-4"></i>';
            if (window.lucide) {
                lucide.createIcons();
            }
        });

        if (window.lucide) {
            lucide.createIcons();
        }
    </script>
</body>
</html>
<?php /**PATH E:\punya_taupik\usulan_dtks\resources\views/login.blade.php ENDPATH**/ ?>