REVISI TAMPILAN WARGA

Perubahan:
1. Tampilan warga/beranda diganti ke desain modern hijau-putih seperti referensi kode HTML yang diberikan.
2. Navbar warga dibuat bersih tanpa menu Login Petugas.
3. Login petugas RT, RW, dan Kelurahan tetap melalui /admin.
4. Form Cek DTKS di halaman warga memakai route asli Laravel, bukan data mock JavaScript.
5. Fitur cek status warga dinonaktifkan. Warga diarahkan ke informasi resmi Kelurahan.
6. Informasi warga tetap memakai data dari tabel konfirmasis melalui foto yang diunggah Kelurahan.
7. Backend alur RT -> RW -> Kelurahan -> Warga tidak diubah.

Route penting:
- / = halaman warga
- /#informasi = warga melihat informasi resmi Kelurahan
- /admin = login petugas

Setelah extract ZIP:
composer install
cp .env.example .env
php artisan key:generate
php artisan optimize:clear
php artisan migrate:fresh --seed
php artisan serve

Akun default:
- Kelurahan: kelurahan@dunguscariang.id / Kelurahan123
- RW 01: rw01@dunguscariang.id / Rw01pass123
- RT 01 RW 01: rt01rw01@dunguscariang.id / Rt01pass123
