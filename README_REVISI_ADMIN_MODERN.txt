REVISI ADMIN MODERN - KELURAHAN DUNGUSCARIANG

Perubahan utama:
1. Tampilan dashboard admin diubah menjadi tema dark modern seperti referensi admin yang diberikan.
2. Layout admin memakai sidebar gelap, topbar status, card statistik, dan panel alur validasi.
3. Halaman login /admin diubah menjadi tampilan dark modern.
4. Navbar warga tetap tidak menampilkan Login Petugas.
5. Login petugas tetap lewat /admin.
6. Role tetap 3: kelurahan, rw, rt.
7. Alur RT -> RW -> Kelurahan -> Warga tidak diubah.
8. CSS admin baru disimpan di public/assets/css/custom/admin-modern.css.
9. File layout yang direvisi: resources/views/layouts/app.blade.php dan resources/views/layouts/sidebar.blade.php.
10. Dashboard yang direvisi: resources/views/dashboard.blade.php.

Akun default:
Kelurahan: kelurahan@dunguscariang.id / Kelurahan123
RW 01: rw01@dunguscariang.id / Rw01pass123
RT 01 RW 01: rt01rw01@dunguscariang.id / Rt01pass123

Cara menjalankan setelah extract:
composer install
cp .env.example .env
php artisan key:generate
php artisan optimize:clear
php artisan migrate:fresh --seed
php artisan serve

Catatan:
Project ZIP tidak menyertakan vendor, node_modules, .env, cache, dan log agar lebih aman dan bersih.
